<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/equipment.php';

$database = new Database();
$db = $database->getConnection();

$equipment = new Equipment($db);

$stmt = $equipment->readAll();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"power_steering":"'  . $car_id . '",';
            $data .= '"climate":"'  . $car_id . '",';
            $data .= '"conditioner":"'  . $car_id . '",';
            $data .= '"cruise":"'  . $car_id . '",';
            $data .= '"xenon":"'  . $car_id . '",';
            $data .= '"hatch":"'  . $car_id . '",';
            $data .= '"navigation":"'  . $car_id . '",';
            $data .= '"tow_hitch":"' . $url . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"equipments":[' . $data . ']}';
?>