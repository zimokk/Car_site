<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/interior.php';

$database = new Database();
$db = $database->getConnection();

$interior = new Interior($db);

// query products
$stmt = $interior->readAll();
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
            $data .= '"velour":"'  . $velour . '",';
            $data .= '"leather":"'  . $leather . '",';
            $data .= '"alloy_wheels":"'  . $alloy_wheels . '",';
            $data .= '"wood":"' . $wood . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

echo '{"interiors":[' . $data . ']}';
?>