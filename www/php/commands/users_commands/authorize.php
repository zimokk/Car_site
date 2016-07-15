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

$login = $data->login;
$password = $data->password;

// query products
$stmt = $user->authorize($login, $password);
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
            $data .= '"idUsers":"'  . $idUsers . '",';
            $data .= '"login":"'  . $login . '",';
            $data .= '"first_name":"'  . $first_name . '",';
            $data .= '"last_name":"'  . $last_name . '",';
            $data .= '"phone":"'  . $phone . '",';
            $data .= '"mail":"'  . $mail . '"';
        $data .= '}';

        $data .= $x<$num ? ',' : ''; $x++; }
}

// json format output
echo '{"users":[' . $data . ']}';
?>
