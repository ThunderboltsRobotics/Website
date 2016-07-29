<section>
	<table border="1">
		<tr>
			<th colspan="3">Competition History</th>
		</tr>
		<tr>
			<th>Season (FRC)</th>
			<td><img alt="FIRST Robotics Competition" src="/static/images/FRC-banner.png" width="201"></td>
			<td><img alt="FIRST Tech Challenge" src="/static/images/FTC-banner.png" width="186"></td>
			<th>Season (FTC)</th>
		</tr>
		<?php
		$data = json_decode(file_get_contents("history.json"), true);
		for ($y = 16; $y >= 12; $y--) {
			echo "<tr>\n";
			echo "<td>20$y</td>\n";
			echo "<td>" . (isset($data["FRC"]["20$y"]) ? $data["FRC"]["20$y"] : "N/A") . "</td>\n";
			echo "<td>" . (isset($data["FTC"]["20$y"]) ? $data["FTC"]["20$y"] : "N/A") . "</td>\n";
			echo "<td>20$y/" . ($y + 1) . "</td>\n";
			echo "</tr>\n";
		}
		?>
	</table>
</section>
