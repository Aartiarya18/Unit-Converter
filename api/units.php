<?php
header('Content-Type: application/json');

$quantity = $_GET['quantity'] ?? '';
$filename = "../data/units_{$quantity}.json";

if (file_exists($filename)) {
    echo file_get_contents($filename);
} else {
    echo json_encode(["error" => "Units not found for this quantity kind"]);
}
?>

