<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/region.php';

$database = new Database();
$db = $database->getConnection();

$region = new Region($db);

$data = json_decode(file_get_contents("php://input"));
$region->country_id = $data->country_id;
$stmt = $region->readByCountry();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"country_id":"'  . $country_id . '",';
            $data .= '"name":"' . $name . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

echo '{"regions":[' . $data . ']}';
?>