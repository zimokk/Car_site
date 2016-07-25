<?php
class Image{
    private $conn;
    private $table_name = "images";

    public $id;
    public $car_id;
    public $url;

    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readByCar(){
         $query = "SELECT * FROM " . $this->table_name . " WHERE car_id = ?;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->car_id);
        $stmt->execute();
        return $stmt;
    }
    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET car_id=:car_id, url=:url";
        $stmt = $this->conn->prepare($query);

        $this->car_id=htmlspecialchars(strip_tags($this->car_id));
        $this->url=htmlspecialchars(strip_tags($this->url));

        $stmt->bindParam(":car_id", $this->car_id);
        $stmt->bindParam(":url", $this->url);
        if($stmt->execute()){
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }
    }
}
?>