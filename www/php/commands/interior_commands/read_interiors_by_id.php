<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/interior.php';

$database = new Database();
$db = $database->getConnection();

$interior = new Interior($db);

$data = json_decode(file_get_contents("php://input"));
$interior->id = $data->id;

$stmt = $interior->readById();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"velour":"'  . $velour . '",';
            $data .= '"leather":"'  . $leather . '",';
            $data .= '"alloy_wheels":"'  . $alloy_wheels . '",';
            $data .= '"wood":"' . $wood . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"interiors":[' . $data . ']}';
?>