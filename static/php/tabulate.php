<?php //Tabulate function v2016-04-01/00 (.min available for production)
//tabluate($array) - Echoes (not returns) a simple recursive table outlining $array.
function tabulate($array) {
    echo "<table border='1'>";
    foreach ($array as $key => $value) {
        echo "<tr><td>" . htmlentities($key) . "</td><td>";
        if (is_array($value)) {
            tabulate($value);
        } else {
            echo htmlentities($value);
        }
        echo "</td></tr>";
	}
    echo "</table>";
}
?>
