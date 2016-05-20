<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../objects/country.php';

$database = new Database();
$db = $database->getConnection();

$country = new Country($db);

// query products
$stmt = $country->readAll();
$num = $stmt->rowCount();

if($num>0){

    $data="";
    $x=1;

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"name":"' . $name . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

echo '{"countries":[' . $data . ']}';
?>