<?php
function fw_error_page($g, $e) {
	$t = [
		3 => [-1 => "Redirection to resource"
		],
		4 => [-1 => "Error, client at fault",
			4 => "'index' page not found at the requested URI."
		],
		5 => [-1 => "Error, server at fault",
			3 => "I just don't know what went wrong!<br>\n<img src='/static/error/503derpy.gif'>"
		]
	];
	echo "<p style='font-size: 1.5em;'>HTTP error <abbr title='" . $t[$g][-1] . "'>$g" . "xx</abbr>/$g" . str_pad($e, 2, "0", STR_PAD_LEFT) . " &mdash; ";
	if (isset($t[$g][$e])) {
		echo $t[$g][$e];
	} else {
		echo "Unknown? (There's nothing written in that box!)";
	}
	echo "</p>\n";
}
?>
