<section>
	<table border="1" style="margin: auto;">
		<tr>
			<th>Season</th>
			<td>4739's Record</td>
		</tr>
		<?php
		$data = json_decode(file_get_contents("../history.json"), true)["FRC"];
		for ($y = date("Y"); $y >= $data["rookie-year"]; $y--) {
			echo "<tr>\n";
			echo "<td>$y</td>\n";
			echo "<td>" . (isset($data["$y"]) ? $data["$y"] : "N/A") . "</td>\n";
			echo "</tr>\n";
		}
		?>
	</table>
</section>
