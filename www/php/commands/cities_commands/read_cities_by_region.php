<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/city.php';

$database = new Database();
$db = $database->getConnection();

$city = new City($db);

$data = json_decode(file_get_contents("php://input"));
$city->region_id = $data->region_id;

$stmt = $city->readByRegion();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"region_id":"'  . $region_id . '",';
            $data .= '"name":"' . $name . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"cities":[' . $data . ']}';
?>