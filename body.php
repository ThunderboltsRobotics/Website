<?php
if (stripos($_SERVER["HTTP_USER_AGENT"], "mobile")) {
	require_once "home-main-mobile.php";
} else {
	require_once "home-main-desktop.php";
}
?>
