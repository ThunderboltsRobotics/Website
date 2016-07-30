<?php
function fw_ganalytics($key) {
	if (!is_string($key)) {
		return false;
	}
	if (isset($_SERVER["HTTP_DNT"]) && $_SERVER["HTTP_DNT"]) {
		return false;
	}
	//TODO
	// return "$key";
}
function fw_get_header_title($dir) {
	if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/$dir/page-name.txt")) {
		return file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/$dir/page-name.txt");
	} else if ($dir === ".") {
		$temp = explode("/", $_SERVER["REQUEST_URI"]);
		return ucwords(implode(" ", explode("-", $temp[count($temp) - 2])));
	} else {
		return ucwords(implode(" ", explode("-", $dir)));
	}
}
function fw_js_prereqs($script, $recurse = []) {
	if ($script === ".") { //If top-level
		$temp = [];
		foreach (json_decode(file_get_contents("js.incl.json")) as $req) {
			$temp1 = fw_js_prereqs($req);
			//$temp1 includes $req
			if ($temp1 !== false) {
				foreach ($temp1 as $s) {
					$temp[] = $s;
				}
			}
		}
		return $temp;
	} else { //If script
		if (is_array($recurse) && in_array($script, $recurse)) {
			//TODO circular dependency error
			return false;
		}
		$scriptdir = $_SERVER["DOCUMENT_ROOT"] . "/static/js";
		if (!file_exists("$scriptdir/$script.js")) {
			//TODO not a script error
			return false;
		}
		if (!file_exists("$scriptdir/$script.json")) {
			//No dependencies
			return [$script];
		}
		$newRecurse = $recurse;
		$newRecurse[] = $script;
		$temp = [];
		foreach (json_decode(file_get_contents("$scriptdir/$script.json")) as $req) {
			$temp1 = fw_js_prereqs($req, $newRecurse);
			if ($temp1 !== false && $temp1 !== []) {
				foreach ($temp1 as $s) {
					$temp[] = $s;
				}
			}
		}
		$temp[] = $script;
		return $temp;
	}
}
function fw_parse_markdown($text) {

}
?>
