<?php
$dir = $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"];
if (file_exists($dir) && is_dir($dir)) {
	//Denied index
	echo "<p>Redirecting to homepage...</p>\n";
	echo "<script>\nfwRedirectTimer = setTimeout(function(){location.href = '//" . $_SERVER["SERVER_NAME"] . "';}, 500);\n</script>\n";
} else {
	//404 Not Found
	require_once "error/include.php";
	fw_error_page(4, 4);
}
?>
