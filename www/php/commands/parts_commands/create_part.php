<?php
include_once '../../config/database.php';
include_once '../../objects/part.php';

$database = new Database();
$db = $database->getConnection();
$part = new Part($db);

$data = json_decode(file_get_contents("php://input"));

$part->mark_id = $data->mark_id;
$part->model_id = $data->model_id;
$part->year_begin = $data->year_begin;
$part->year_end = $data->year_end;
$part->city_id = $data->city_id;
$part->region_id = $data->region_id;
$part->country_id = $data->country_id;
$part->description = $data->description;
$part->phone = $data->phone;
$part->skype = $data->skype;
$part->email = $data->email;
$part->user_id = $data->user_id;

if($part->create()){
    echo "success";
}
else{
    echo "Unable to create part.";
}
?>