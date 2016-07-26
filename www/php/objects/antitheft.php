<?php
class Antitheft{
    private $conn;
    private $table_name = "antitheft";

    public $id;
    public $immobilizer;
    public $signaling;

    public function __construct($db){
        $this->conn = $db;
    }
    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readById(){
         $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }
    function readByParams(){
         $query = "SELECT * FROM " . $this->table_name . " WHERE immobilizer=:immobilizer AND signaling=:signaling
            ORDER BY id DESC LIMIT 1; ";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":immobilizer", $this->immobilizer);
        $stmt->bindParam(":signaling", $this->signaling);
        $stmt->execute();
        return $stmt;
    }
    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET  immobilizer=:immobilizer, signaling=:signaling";
        $stmt = $this->conn->prepare($query);
        $this->immobilizer=htmlspecialchars(strip_tags($this->immobilizer));
        $this->signaling=htmlspecialchars(strip_tags($this->signaling));
        $stmt->bindParam(":immobilizer", $this->immobilizer);
        $stmt->bindParam(":signaling", $this->signaling);
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