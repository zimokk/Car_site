<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/electric.php';

$database = new Database();
$db = $database->getConnection();

$electric = new Electric($db);

$data = json_decode(file_get_contents("php://input"));

$electric->id = $data->id;
$stmt = $electric->readById();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"computer":"'  . $computer . '",';
            $data .= '"rain":"'  . $rain . '",';
            $data .= '"light":"'  . $light . '",';
            $data .= '"mirrors_heating":"'  . $mirrors_heating . '",';
            $data .= '"seats_heating":"'  . $seats_heating . '",';
            $data .= '"locking":"'  . $locking . '",';
            $data .= '"seats":"'  . $seats . '",';
            $data .= '"winows_lift":"'  . $winows_lift . '",';
            $data .= '"mirrors_electric":"' . $mirrors_electric . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"electrics":[' . $data . ']}';
?>