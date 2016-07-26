<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/audio.php';

$database = new Database();
$db = $database->getConnection();

$audio = new Audio($db);

$stmt = $audio->readAll();
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"cd_changer":"'  . $cd_changer . '",';
            $data .= '"cd_player":"'  . $cd_player . '",';
            $data .= '"mp3_player":"'  . $mp3_player . '",';
            $data .= '"tv":"'  . $tv . '",';
            $data .= '"cassette_player":"'  . $cassette_player . '",';
            $data .= '"subwoofer":"' . $subwoofer . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"audios":[' . $data . ']}';
?>