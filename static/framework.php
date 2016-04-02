<?php //Global page generation for normorobo.tk v2016-04-01/01 (.min available for production)
//TODO: Replace framework_*() and $framework_* with methods and properties of one global object.

set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"] . "/static");

function framework_genpage($meta_list) {
	echo "<!DOCTYPE html>\n<html>\n<head>\n";

	//Additional scripts (JavaScript); default none
	if (isset($meta_list["js-path"])) {
		foreach (explode(";", $meta_list["js-path"]) as $script) {
			echo "<script src='$script'></script>\n";
		}
	}

	//Favicon; default "/static/images/favicons/thunderbolt.<size>.<ico|png>"
	if (isset($meta_list["favicon"])) {
		echo "<link href='/static/images/favicons/" . $meta_list["favicon"] . ".16px.ico' rel='shortcut icon'>";
		//TODO check files exist
		echo "<link href='/static/images/favicons/" . $meta_list["favicon"] . ".32px.png' rel='apple-touch-icon' type='image/png' sizes='32x32'>";
		echo "<link href='/static/images/favicons/" . $meta_list["favicon"] . ".128px.png' rel='apple-touch-icon' type='image/png' sizes='128x128'>";
	} else {
		echo "<link href='/static/images/favicons/thunderbolt.16px.ico' rel='shortcut icon'>";
		//TODO try to package these into less files
		foreach ([16, 24, 32, 48, 64, 128] as $v) {
			echo "<link href='/static/images/favicons/thunderbolt.$v" . "px.png' rel='apple-touch-icon' type='image/png' sizes='$v" . "x$v'>";
		}
	}

	//Styles; default all
	if (!(isset($meta_list["styles"]) && !$meta_list["styles"])) {
		//TODO desktop/mobile
		echo "<link href='/static/styles/desktop.css' rel='stylesheet' type='text/css'>\n";
	}
	echo "<link href='/static/styles/minimal.css' rel='stylesheet' type='text/css'>\n";

	//Charset and viewport
	echo "<meta charset='UTF-8' content='initial-scale=1' name='viewport'>\n";

	//Page colour; default #FF003F
	if (isset($meta_list["colour"])) {
		echo "<meta content='" . $meta_list["colour"] . "' name='theme-color'>";
	} else {
		echo "<meta content='#FF003F' name='theme-color'>";
	}

	//Page title; default "NAMEME"
	echo "<title>";
	if (isset($meta_list["title"]) {
		echo $meta_list["title"];
	} else {
		echo "NAMEME";
	}
	echo " - Thunderbolts Robotics</title>\n";

	//Visible content
	echo "</head>\n<body>\n";
	if (isset($meta_list["body-prepend"]) && $meta_list["body-prepend"]) {
		if (isset($meta_list["body-prepend-location"])) {
			require_once $meta_list["body-prepend-location"];
		} else {
			require_once "body_prepend.php";
		}
	}
	include_once $meta_list["body-location"];
	if (isset($meta_list["body-append"]) && $meta_list["body-append"]) {
		if (isset($meta_list["body-append-location"])) {
			require_once $meta_list["body-append-location"];
		} else {
			require_once "body_append.php";
		}
	}
	echo "</body>\n</html>\n";
}
?>
