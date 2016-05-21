<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/car.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
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

// query products
$stmt = $car->readWithFilter($max_price,$min_price,$year_begin,$year_end);
$num = $stmt->rowCount();

$data="";
// check if more than 0 record found
if($num>0){

    $x=1;

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
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
            $data .= '"country_id":"'  . $country_id . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

// json format output
echo '{"cars":[' . $data . ']}';
?>