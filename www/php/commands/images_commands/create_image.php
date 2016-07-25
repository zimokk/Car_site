<?php
include_once '../../config/database.php';
include_once '../../objects/image.php';

$database = new Database();
$db = $database->getConnection();
$image = new Image($db);

$data = json_decode(file_get_contents("php://input"));
$image->car_id = $data->car_id;
$image->url = $data->url;

if($image->create()){
    echo "Product was created.";
}
else{
    echo "Unable to create product.";
}
?>