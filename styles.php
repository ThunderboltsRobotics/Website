main {
	font-family: 'Audiowide';
}
a {
	text-decoration: inherit;
}
<?php
if (stripos($_SERVER["HTTP_USER_AGENT"], "mobile")) {
	require_once "home-styles-mobile.css";
} else {
	require_once "home-styles-desktop.css";
}
?>
