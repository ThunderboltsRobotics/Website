<ul><?php
foreach (scandir(".") as $v) {
	if (!in_array($v, [".", "..", "indexdir.php", "body.php", "folderlabel.txt"])) {
		echo "<li><a href='$v'>$v</a></li>";
	}
}
?></ul>
<p>Placeholder text is a lazy dev's best friend!</p>
