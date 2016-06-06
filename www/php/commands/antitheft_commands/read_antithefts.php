<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/antitheft.php';

$database = new Database();
$db = $database->getConnection();

$antitheft = new Antitheft($db);

// query products
$stmt = $antitheft->readAll();
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
            $data .= '"immobilizer":"'  . $immobilizer . '",';
            $data .= '"signaling":"' . $signaling . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

echo '{"antithefts":[' . $data . ']}';
?>