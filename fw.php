<?php //v2016-07-23/00
ini_set("include_path",".:".$_SERVER["DOCUMENT_ROOT"]."/static");
require_once "php/framework_arrays.php";
require_once "php/framework_functions.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<?php
		if (file_exists("js.incl.json")) {
			require_once "php/uniqueEntriesFunc.php";
			$prereqs = fw_js_prereqs(".");
			foreach (uniqueEntries($prereqs) as $script) {
				echo "<script src='/static/js/$script.js'></script>\n";
			}
		}
		if (!file_exists("nostyles.txt")) {
			echo "<link href='/static/css/default.css' rel='stylesheet' type='text/css'>\n";
			echo "<link href='/static/css/site.css' rel='stylesheet' type='text/css'>\n";
			echo "<link href='/static/favicon/16x16.png' rel='icon' type='image/png'>\n";
		}
		if (file_exists("styles.css")) {
			echo "<link href='/styles.css' rel='stylesheet' type='text/css'>\n";
		}
		if (file_exists("styles.php")) {
			echo "<style>\n";
			require_once "styles.php";
			echo "</style>\n";
		}
		if (file_exists("folderlabel.txt")) {
			echo "<title>" . file_get_contents("folderlabel.txt") . "</title>";
		}
		?>
	</head>
	<body>
		<?php
		foreach (["php", "md", "html", "htm"] as $e) {
			if (file_exists("body.$e")) {
				if ($e === "md") {
					echo fw_parse_markdown(file_get_contents("$body.md"));
				} else {
					require_once "body.$e";
				}
				break;
			}
		}
		?>
	</body>
</html>
