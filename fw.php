<?php //v2016-08-03/00
ini_set("include_path", ".:" . $_SERVER["DOCUMENT_ROOT"] . "/static");
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
			echo "<link href='styles.css' rel='stylesheet' type='text/css'>\n";
		}
		if (file_exists("styles.php")) {
			echo "<style>\n";
			require_once "styles.php";
			echo "</style>\n";
		}
		$fw_pageTitle = (file_exists("page-name.txt") ? file_get_contents("page-name.txt") : fw_dir_to_name());
		echo "<title>" . $fw_pageTitle . "</title>\n";
		?>
	</head>
	<body>
		<header>
			<div id="header-icon" style="flex: 0.05; position: relative; top: 0.25em;"><a href="/" target="_top" title="Home"><?php require_once "images/header-icon.svg"; ?></a></div>
			<div>&rang; <?php
				if ($_SERVER["REQUEST_URI"] === "/" || $_SERVER["REQUEST_URI"] === "/index.php") {
					echo $fw_pageTitle;
				} else {
					$toReturn = [];
					$uriList = explode("/", $_SERVER["REQUEST_URI"]);
					array_shift($uriList);
					array_pop($uriList);
					for ($i = 0; $i < count($uriList); $i++) {
						if ($i == count($uriList) - 1) {
							//Last segment should have no link
							$nameFile = $_SERVER["DOCUMENT_ROOT"] . implode("", explode("/index.php", $_SERVER["REQUEST_URI"])) . "/page-name.txt";
							$name = file_exists($nameFile) ? file_get_contents($nameFile) : fw_dir_to_name($uriList[$i]);
							$toReturn[$i] = $name;
						} else {
							$temp = "";
							for ($j = 0; $j <= $i; $j++) {
								$temp .= "/" . $uriList[$i];
							}
							$nameFile = $_SERVER["DOCUMENT_ROOT"] . $temp . "/page-name.txt";
							$name = file_exists($nameFile) ? file_get_contents($nameFile) : fw_dir_to_name($uriList[$i]);
							$toReturn[$i] = "<a href='/" . $uriList[$i] . "' target='_top' title='$name'>$name</a>";
						}
					}
					echo implode(" &rang; ", $toReturn);
				}
			?></div>
			<div style="text-align: right;">Thunderbolts Robotics</div>
		</header>
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
		if (isset($_GET["autorefresh"])) {
			echo "<script>(function(){setTimeout(function(){location.reload();}, 10000);})()</script>";
		}
		?>
	</body>
</html>
