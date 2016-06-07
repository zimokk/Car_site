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

$car->idCars = $data->idCars;
// query products
$stmt = $car->readOne();
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
            $data .= '"creation_time":"'  . $creation_time . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

// json format output
echo '{"cars":[' . $data . ']}';
?>