<?php //Site-wide index for normorobo.tk v2016-04-01/00
require_once $_SERVER["DOCUMENT_ROOT"] . "/static/framework.min.php";
$page_meta = [
	"body-append" => true,
	"body-location" => "content/team.php",
	"body-prepend" => true,
	"title" => "Nerd Zone"
];
framework_genpage($page_meta);
?>
