<?php
class Antitheft{
    // database connection and table name
    private $conn;
    private $table_name = "antitheft";

    // object properties
    public $id;
    public $immobilizer;
    public $signaling;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read marks
    function readAll(){

        // select all query
        $query = "SELECT * FROM " . $this->table_name . ";";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function readById(){
        // select all query
         $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?;";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
        // execute query
        $stmt->execute();

        return $stmt;
    }
    function readByParams(){
        // select all query
         $query = "SELECT * FROM " . $this->table_name . " WHERE immobilizer=:immobilizer AND signaling=:signaling
            ORDER BY id DESC LIMIT 1; ";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(":immobilizer", $this->immobilizer);
        $stmt->bindParam(":signaling", $this->signaling);
        // execute query
        $stmt->execute();

        return $stmt;
    }
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET  immobilizer=:immobilizer, signaling=:signaling";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->immobilizer=htmlspecialchars(strip_tags($this->immobilizer));
        $this->signaling=htmlspecialchars(strip_tags($this->signaling));

        // bind values
        $stmt->bindParam(":immobilizer", $this->immobilizer);
        $stmt->bindParam(":signaling", $this->signaling);

        // execute query
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