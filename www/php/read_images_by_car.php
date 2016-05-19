<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once 'config/database.php';
include_once 'objects/image.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$image = new Image($db);

$data = json_decode(file_get_contents("php://input"));
$image->car_id = $data->car_id;

// query products
$stmt = $image->readByCar();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    $data="";
    $x=1;

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"car_id":"'  . $car_id . '",';
            $data .= '"url":"' . $url . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

// json format output
echo '{"images":[' . $data . ']}';
?>