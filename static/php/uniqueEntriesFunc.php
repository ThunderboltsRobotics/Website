<?php
function uniqueEntries($a) {
	$r = [];
	foreach ($a as $v) {
		if (!in_array($v, $r)) {
			$r[] = $v;
		}
	}
	return $r;
}
?>
