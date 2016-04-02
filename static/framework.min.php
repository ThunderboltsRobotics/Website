<?php set_include_path(get_include_path().PATH_SEPARATOR.$_SERVER["DOCUMENT_ROOT"]."/static");
function framework_genpage($m){
	echo "<!DOCTYPE html>\n<html>\n<head>\n";

	if(isset($m["js-path"])){foreach(explode(";",$m["js-path"]) as $s){echo "<script src='$s'></script>\n";}}

	if(!(isset($m["styles"])&&!$m["styles"])){echo "<link href='/static/styles/desktop.css' rel='stylesheet' type='text/css'>\n";}
	echo "<link href='/static/styles/minimal.css' rel='stylesheet' type='text/css'>\n";

	echo "<title>".(isset($m["title"])?$m["title"]:"NAMEME")." - Thunderbolts Robotics</title>\n";

	echo "</head>\n<body>\n";
	if(isset($m["body-prepend"])&&$m["body-prepend"]){isset($m["body-prepend-location"])?require_once $m["body-prepend-location"]:require_once "body_prepend.php";}
	include_once $m["body-location"];
	if(isset($m["body-append"])&&$m["body-append"]){isset($m["body-append-location"])?require_once $m["body-append-location"]:require_once "body_append.php";}
	echo "</body>\n</html>\n";
}//v2016-04-01/00?>
