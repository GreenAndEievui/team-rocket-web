<?php

$raw = file_get_contents("php://input");
error_log($raw);

$data = json_decode($raw, true);

error_log($data["name"]);

$file = fopen("../accounts/".$data["name"].".json", "w");
fwrite($file, $raw);
fclose($file);

?>