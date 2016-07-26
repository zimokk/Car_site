<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/mark.php';

$database = new Database();
$db = $database->getConnection();

$mark = new Mark($db);

$stmt = $mark->readAll();
$num = $stmt->rowCount();

if($num>0){
    $data="";
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"name":"' . $name . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"marks":[' . $data . ']}';
?>