<?php
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/antitheft.php';

$database = new Database();
$db = $database->getConnection();

$antitheft = new Antitheft($db);

$data = json_decode(file_get_contents("php://input"));

$antitheft->immobilizer = $data->immobilizer;
$antitheft->signaling = $data->signaling;

if($antitheft->create()){
    $stmt = $antitheft->readByParams();
    $num = $stmt->rowCount();
    $data="";

    if($num>0){
        $x=1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            $data .= '{';
                $data .= '"id":"'  . $id . '",';
                $data .= '"immobilizer":"'  . $immobilizer . '",';
                $data .= '"signaling":"' . $signaling . '"';
            $data .= '}';

            $data .= $x<$num ? ',' : ''; $x++; }
    }
    echo '{"antithefts":[' . $data . ']}';
}

else{
    echo "Unable to create antitheft.";
}
?>