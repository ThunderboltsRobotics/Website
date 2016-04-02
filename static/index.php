<?php //Site-wide index denial template for normorobo.tk v2016-04-01/00
require_once $_SERVER["DOCUMENT_ROOT"] . "/static/framework.min.php";
$page_meta = [
	"body-location" => "content/denied_page.php",
	"js-path" => "/static/js/return_to_sender.js",
	"title" => "Access Denied"
];
framework_genpage($page_meta);
?>
