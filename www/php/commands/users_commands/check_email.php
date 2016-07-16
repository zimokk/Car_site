<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");



// include database and object files

include_once '../../config/database.php';

include_once '../../objects/user.php';

$data = json_decode(file_get_contents("php://input"));


// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$user = new User($db);

$email = $data->email;

// query products
$stmt = $user->check_email($email);
$num = $stmt->rowCount();

$data="";

if($num>0){
    $x=1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data .= '{';
            $data .= '"idUsers":"'  . $idUsers . '",';
            $data .= '"login":"'  . $login . '",';
            $data .= '"first_name":"'  . $first_name . '",';
            $data .= '"last_name":"'  . $last_name . '",';
            $data .= '"phone":"'  . $phone . '",';
            $data .= '"email":"'  . $email . '"';
        $data .= '}';
        $data .= $x<$num ? ',' : ''; $x++; }
}
echo '{"users":[' . $data . ']}';
?>
