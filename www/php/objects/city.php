<?php
class City{
    // database connection and table name
    private $conn;
    private $table_name = "cities";

    // object properties
    public $id;
    public $region_id;
    public $name;

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
    function readByRegion(){

            // select all query
            $query = "SELECT * FROM " . $this->table_name . " WHERE region_id = ". $this->region_id .";";

            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // execute query
            $stmt->execute();

            return $stmt;
        }
}
?>