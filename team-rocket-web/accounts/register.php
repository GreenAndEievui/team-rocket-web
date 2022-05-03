<?php
	$path = $_GET["account"]."/".$_GET["petname"];
	mkdir($path);
	$file = fopen($path."/data.json", "w");
	fputs($file, $_GET["json"]);
	fclose($file);
?>
