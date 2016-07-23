<?php
function gcf($n, $m) {
	if ($n < 0 || $m < 0) { return false; }
	if ($n == $m) {
		if ($n == 0) { return 1; }
		return $n;
	}
	return $m < $n ? gcf($n -$m, $n) : gcf($n, $m -$n);
}

function lcm($n, $m) {
	return $m * $n / gcf($n, $m);
}
?>
