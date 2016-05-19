<?php
class Car{
    // database connection and table name
    private $conn;
    private $table_name = "cars";

    // object properties
    public $idCars;
    public $mark_id;
    public $model_id;
    public $cost;
    public $year;
    public $fuel_id;
    public $transmission;
    public $body_id;
    public $user_id;
    public $city_id;

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
}
?>