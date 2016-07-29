html, body, main {
	height: 100%;
}
body {
	margin: 0;
}
a {
	text-decoration: inherit;
}
<?php if (stripos($_SERVER["HTTP_USER_AGENT"], "mobile")) { ?>
/* TODO */
<?php } else { ?>
main, #social-icons {
	display: flex;
	flex-flow: row nowrap;
}
.nav-col, .nav-col > nav {
	display: flex;
	flex-flow: column nowrap;
	justify-content: center;
}
.nav-col > nav {
	margin: 1em;
}
.nav-col > nav > a {
	font-family: Audiowide;
	font-size: 3em;
	font-style: italic;
}
#social-icons > a {
	margin: 0.25em;
}
<?php } ?>
