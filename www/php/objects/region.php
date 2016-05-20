<?php
class Region{
    // database connection and table name
    private $conn;
    private $table_name = "regions";

    // object properties
    public $id;
    public $country_id;
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
    function readByCountry(){

            // select all query
            $query = "SELECT * FROM " . $this->table_name . " WHERE country_id = ?;";

            // prepare query statement
            $stmt = $this->conn->prepare( $query );
            // bind id of product to be updated
            $stmt->bindParam(1, $this->country_id);

            // execute query
            $stmt->execute();

            return $stmt;
        }
}
?>