<?php
class Equipment{
    // database connection and table name
    private $conn;
    private $table_name = "equipment";

    // object properties
    public $id;
    public $power_steering;
    public $climate;
    public $conditioner;
    public $cruise;
    public $xenon;
    public $hatch;
    public $navigation;
    public $tow_hitch;

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
}
?>