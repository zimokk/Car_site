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

    function readByParams(){
        // select all query
         $query = "SELECT * FROM " . $this->table_name . " WHERE power_steering=:power_steering, climate=:climate,
                             conditioner=:conditioner, cruise=:cruise, xenon=:xenon, hatch=:hatch,
                             navigation=:navigation, tow_hitch=:tow_hitch
                             ORDER BY id DESC LIMIT 1; ";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated

        $stmt->bindParam(":power_steering", $this->power_steering);
        $stmt->bindParam(":climate", $this->climate);
        $stmt->bindParam(":conditioner", $this->conditioner);
        $stmt->bindParam(":cruise", $this->cruise);
        $stmt->bindParam(":xenon", $this->xenon);
        $stmt->bindParam(":hatch", $this->hatch);
        $stmt->bindParam(":navigation", $this->navigation);
        $stmt->bindParam(":tow_hitch", $this->tow_hitch);

        // execute query
        $stmt->execute();

        return $stmt;
    }
     function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET power_steering=:power_steering, climate=:climate,
                    conditioner=:conditioner, cruise=:cruise, xenon=:xenon, hatch=:hatch,
                    navigation=:navigation, tow_hitch=:tow_hitch";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->power_steering=htmlspecialchars(strip_tags($this->power_steering));
        $this->climate=htmlspecialchars(strip_tags($this->climate));
        $this->conditioner=htmlspecialchars(strip_tags($this->conditioner));
        $this->cruise=htmlspecialchars(strip_tags($this->cruise));
        $this->xenon=htmlspecialchars(strip_tags($this->xenon));
        $this->hatch=htmlspecialchars(strip_tags($this->hatch));
        $this->navigation=htmlspecialchars(strip_tags($this->navigation));
        $this->tow_hitch=htmlspecialchars(strip_tags($this->tow_hitch));

        // bind values
        $stmt->bindParam(":power_steering", $this->power_steering);
        $stmt->bindParam(":climate", $this->climate);
        $stmt->bindParam(":conditioner", $this->conditioner);
        $stmt->bindParam(":cruise", $this->cruise);
        $stmt->bindParam(":xenon", $this->xenon);
        $stmt->bindParam(":hatch", $this->hatch);
        $stmt->bindParam(":navigation", $this->navigation);
        $stmt->bindParam(":tow_hitch", $this->tow_hitch);

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