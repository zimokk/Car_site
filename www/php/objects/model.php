<?php
class Model{
    // database connection and table name
    private $conn;
    private $table_name = "models";

    // object properties
    public $id;
    public $mark_id;
    public $name;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read models
    function readAll(){

        // select all query
        $query = "SELECT * FROM " . $this->table_name . ";";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function readMark($markId){

            // select all query
            $query = "SELECT * " . $this->table_name . " WHERE mark_id = ".$markId.";";

            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // execute query
            $stmt->execute();

            return $stmt;
        }
}
?>