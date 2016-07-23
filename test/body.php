<?php
foreach (scandir(".") as $v) {
	if (!in_array($v, [".", "..", "indexdir.php", "body.php"])) {
		echo "<a href='$v'>$v" . (file_exists("$v/folderlabel.txt") ? " &mdash; " . file_get_contents("$v/folderlabel.txt") : "") . "</a><br>\n";
	}
}
?>
