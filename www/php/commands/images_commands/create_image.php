<?php
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/image.php';

$database = new Database();
$db = $database->getConnection();

$image = new Image($db);

$data = json_decode(file_get_contents("php://input"));
$image->car_id = $data->car_id;
$image->url = $data->url;

// create the product
if($image->create()){
    echo "Product was created.";
}

// if unable to create the product, tell the user
else{
    echo "Unable to create product.";
}
?>