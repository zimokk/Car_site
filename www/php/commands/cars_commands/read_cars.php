<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/car.php';

$database = new Database();
$db = $database->getConnection();

$car = new Car($db);

$stmt = $car->readAll();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"idCars":"'  . $idCars . '",';
            $data .= '"description":"'  . $description . '",';
            $data .= '"mark_id":"'  . $mark_id . '",';
            $data .= '"model_id":"'  . $model_id . '",';
            $data .= '"cost":"'  . $cost . '",';
            $data .= '"year":"'  . $year . '",';
            $data .= '"fuel_id":"'  . $fuel_id . '",';
            $data .= '"transmission":"'  . $transmission . '",';
            $data .= '"body_id":"' . $body_id . '",';
            $data .= '"user_id":"'  . $user_id . '",';
            $data .= '"city_id":"'  . $city_id . '",';
            $data .= '"creation_time":"'  . $creation_time . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"cars":[' . $data . ']}';
?>