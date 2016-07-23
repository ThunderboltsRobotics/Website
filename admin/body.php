<?php
foreach (scandir(".") as $v) {
	if (!in_array($v, [".", "..", "indexdir.php", "body.php", "folderlabel.txt"])) {
		echo "<a href='$v'>" . (file_exists("$v/folderlabel.txt") ? file_get_contents("$v/folderlabel.txt") : "$v") . "</a><br>\n";
	}
}
?>
