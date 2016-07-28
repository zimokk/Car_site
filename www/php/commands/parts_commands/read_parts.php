<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/part.php';

$database = new Database();
$db = $database->getConnection();

$part = new Part($db);

$stmt = $part->readAll();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"mark_id":"'  . $mark_id . '",';
            $data .= '"model_id":"'  . $model_id . '",';
            $data .= '"year_begin":"'  . $year_begin . '",';
            $data .= '"year_end":"'  . $year_end . '",';
            $data .= '"city_id":"'  . $city_id . '",';
            $data .= '"region_id":"'  . $region_id . '",';
            $data .= '"country_id":"'  . $country_id . '",';
            $data .= '"description":"'  . $description . '",';
            $data .= '"phone":"'  . $phone . '",';
            $data .= '"skype":"'  . $skype . '",';
            $data .= '"email":"' . $email . '",';
            $data .= '"city_name":"' . $city_name . '",';
            $data .= '"user_id":"'  . $user_id . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"parts":[' . $data . ']}';
?>