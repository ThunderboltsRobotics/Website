html, body {
	height: 100%;
}
body {
	margin: 0;
}
main {
	font-family: 'Audiowide';
	height: 90%;
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
