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
    function readByCar(){

            // select all query
             $query = "SELECT * FROM " . $this->table_name . " WHERE car_id = ". $this->car_id .";";

            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // execute query
            $stmt->execute();

            return $stmt;
        }
}
?>