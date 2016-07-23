<p>$_SERVER:</p>
<table border="1" style="border-collapse: collapse;"><?php
foreach ($_SERVER as $k => $v) {
	echo "<tr><td>" . htmlentities($k) . "</td><td>";
	var_dump($v);
	echo "</td></tr>";
}
?></table>
