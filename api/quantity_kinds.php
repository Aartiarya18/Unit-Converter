<?php
header('Content-Type: application/json');
$data = file_get_contents('../data/quantity_kinds.json');
echo $data;
?>
