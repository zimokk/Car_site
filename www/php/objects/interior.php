<?php
class Interior{
    // database connection and table name
    private $conn;
    private $table_name = "interior";

    // object properties
    public $id;
    public $velour;
    public $leather;
    public $alloy_wheels;
    public $wood;

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
    function create(){
         // query to insert record
         $query = "INSERT INTO " . $this->table_name . " SET id=:id, velour=:velour, leather=:leather,
                     alloy_wheels=:alloy_wheels, wood=:wood";

         // prepare query
         $stmt = $this->conn->prepare($query);

         // posted values
         $this->id=htmlspecialchars(strip_tags($this->id));
         $this->velour=htmlspecialchars(strip_tags($this->velour));
         $this->leather=htmlspecialchars(strip_tags($this->leather));
         $this->alloy_wheels=htmlspecialchars(strip_tags($this->alloy_wheels));
         $this->wood=htmlspecialchars(strip_tags($this->wood));

         // bind values
         $stmt->bindParam(":id", $this->id);
         $stmt->bindParam(":velour", $this->velour);
         $stmt->bindParam(":leather", $this->leather);
         $stmt->bindParam(":alloy_wheels", $this->alloy_wheels);
         $stmt->bindParam(":wood", $this->wood);

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