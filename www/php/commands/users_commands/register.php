<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/database.php';
include_once '../../objects/user.php';

$data = json_decode(file_get_contents("php://input"));

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$user->login = $data->login;
$user->email = $data->email;
$user->password = $data->password;
$user->phone = $data->phone;
$user->first_name = $data->first_name;
$user->last_name = $data->last_name;

if($user->register()){
    echo '{"result":"success"}';
} else{
    echo '{"result":"error"}';
}
?>
