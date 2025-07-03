 <?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$quantity = $data['quantity'];
$value = floatval($data['value']);
$from = $data['from_unit'];
$to = $data['to_unit'];
$result = null;

// Simple conversion logic for demonstration
if ($quantity === 'temperature') {
    if ($from === 'K' && $to === '°C') {
        $result = $value - 273.15;
    } elseif ($from === '°C' && $to === 'K') {
        $result = $value + 273.15;
    } elseif ($from === '°C' && $to === '°F') {
        $result = ($value * 9/5) + 32;
    } elseif ($from === '°F' && $to === '°C') {
        $result = ($value - 32) * 5/9;
    } else {
        $result = "Conversion not supported in demo.";
    }
}

echo json_encode(["result" => $result]);
?>

