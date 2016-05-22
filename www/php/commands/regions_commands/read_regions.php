<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/region.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$region = new Region($db);

// query products
$stmt = $region->readAll();
$num = $stmt->rowCount();

$data="";

// check if more than 0 record found
if($num>0){

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
            $data .= '"country_id":"'  . $country_id . '",';
            $data .= '"name":"' . $name . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

// json format output
echo '{"regions":[' . $data . ']}';
?>