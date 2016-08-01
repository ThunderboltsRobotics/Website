<section>
	<table border="1" style="margin: auto;">
		<tr>
			<th>Season</th>
			<td>10349's Record</td>
		</tr>
		<?php
		$data = json_decode(file_get_contents("../history.json"), true)["FTC"];
		for ($y = date("Y"); $y >= $data["rookie-year"]; $y--) {
			$f = "$y/" . (substr($y, -2) + 1);
			echo "<tr>\n";
			echo "<td>$f</td>\n";
			echo "<td>" . (isset($data[$f]) ? $data[$f] : "N/A") . "</td>\n";
			echo "</tr>\n";
		}
		?>
	</table>
</section>
