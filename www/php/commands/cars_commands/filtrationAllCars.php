<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/car.php';

$database = new Database();
$db = $database->getConnection();

$car = new Car($db);

$data = json_decode(file_get_contents("php://input"));

$car->mark_id = $data->mark_id;
$car->model_id = $data->model_id;
$car->fuel_id = $data->fuel_id;
$car->body_id = $data->body_id;
$car->city_id = $data->city_id;
$car->region_id = $data->region_id;
$car->country_id = $data->country_id;
$car->transmission = $data->transmission;
$max_price = $data->max_price;
$min_price = $data->min_price;
$year_end = $data->year_end;
$year_begin = $data->year_begin;

$stmt = $car->readWithFilter($max_price,$min_price,$year_begin,$year_end);
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
            $data .= '"region_id":"'  . $region_id . '",';
            $data .= '"country_id":"'  . $country_id . '",';
            $data .= '"creation_time":"'  . $creation_time . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"cars":[' . $data . ']}';
?>