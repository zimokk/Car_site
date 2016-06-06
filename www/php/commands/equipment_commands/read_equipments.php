<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/equipment.php';

$database = new Database();
$db = $database->getConnection();

$equipment = new Equipment($db);

// query products
$stmt = $equipment->readAll();
$num = $stmt->rowCount();

$data="";

if($num>0){

    $x=1;

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only

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