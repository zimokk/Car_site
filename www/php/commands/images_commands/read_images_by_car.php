<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/image.php';

$database = new Database();
$db = $database->getConnection();

$image = new Image($db);

$data = json_decode(file_get_contents("php://input"));
$image->car_id = $data->car_id;

$stmt = $image->readByCar();
$num = $stmt->rowCount();

$data="";
if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"car_id":"'  . $car_id . '",';
            $data .= '"url":"' . $url . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++;
    }
}
echo '{"images":[' . $data . ']}';
?>