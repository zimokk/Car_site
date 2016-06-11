<?php
class Image{
    // database connection and table name
    private $conn;
    private $table_name = "images";

    // object properties
    public $id;
    public $car_id;
    public $url;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        // select all query
        $query = "SELECT * FROM " . $this->table_name . ";";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function readByCar(){
        // select all query
         $query = "SELECT * FROM " . $this->table_name . " WHERE car_id = ?;";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(1, $this->car_id);
        // execute query
        $stmt->execute();

        return $stmt;
    }
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET car_id=:car_id, url=:url";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->car_id=htmlspecialchars(strip_tags($this->car_id));
        $this->url=htmlspecialchars(strip_tags($this->url));

        // bind values
        $stmt->bindParam(":car_id", $this->car_id);
        $stmt->bindParam(":url", $this->url);

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