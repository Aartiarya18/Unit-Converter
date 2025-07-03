<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$quantity = $data['quantity'];
$value = floatval($data['value']);

$response = ["valid" => true];

if ($quantity === 'humidity' && $value < 0) {
    $response = ["valid" => false, "message" => "Humidity cannot be negative"];
} elseif ($quantity === 'temperature' && $value < -273.15) {
    $response = ["valid" => false, "message" => "Temperature cannot be below absolute zero (-273.15°C)"];
} else if($quantity==='length' && $value <0){
    $response =["valid"=>false, "message" => "Length can't be negative"];
}

echo json_encode($response);
?>


