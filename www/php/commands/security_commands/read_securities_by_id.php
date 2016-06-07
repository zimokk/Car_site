<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/security.php';

$database = new Database();
$db = $database->getConnection();

$security = new Security($db);

$data = json_decode(file_get_contents("php://input"));
$security->id = $data->id;
// query products
$stmt = $security->readById();
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
            $data .= '"abs":"'  . $abs . '",';
            $data .= '"ebd":"'  . $ebd . '",';
            $data .= '"ebs":"'  . $ebs . '",';
            $data .= '"esp":"'  . $esp . '",';
            $data .= '"has":"'  . $has . '",';
            $data .= '"hdc":"'  . $hdc . '",';
            $data .= '"traction":"'  . $traction . '",';
            $data .= '"parktronic":"'  . $parktronic . '",';
            $data .= '"airbag":"' . $airbag . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

echo '{"securities":[' . $data . ']}';
?>