<?php
class Equipment{
    private $conn;
    private $table_name = "equipment";

    public $id;
    public $power_steering;
    public $climate;
    public $conditioner;
    public $cruise;
    public $xenon;
    public $hatch;
    public $navigation;
    public $tow_hitch;

    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readById(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }

    function readByParams(){
         $query = "SELECT * FROM " . $this->table_name . " WHERE power_steering=:power_steering, climate=:climate,
                             conditioner=:conditioner, cruise=:cruise, xenon=:xenon, hatch=:hatch,
                             navigation=:navigation, tow_hitch=:tow_hitch
                             ORDER BY id DESC LIMIT 1; ";
        $stmt = $this->conn->prepare( $query );

        $stmt->bindParam(":power_steering", $this->power_steering);
        $stmt->bindParam(":climate", $this->climate);
        $stmt->bindParam(":conditioner", $this->conditioner);
        $stmt->bindParam(":cruise", $this->cruise);
        $stmt->bindParam(":xenon", $this->xenon);
        $stmt->bindParam(":hatch", $this->hatch);
        $stmt->bindParam(":navigation", $this->navigation);
        $stmt->bindParam(":tow_hitch", $this->tow_hitch);
        $stmt->execute();
        return $stmt;
    }
     function create(){
        $query = "INSERT INTO " . $this->table_name . " SET power_steering=:power_steering, climate=:climate,
                    conditioner=:conditioner, cruise=:cruise, xenon=:xenon, hatch=:hatch,
                    navigation=:navigation, tow_hitch=:tow_hitch";
        $stmt = $this->conn->prepare($query);

        $this->power_steering=htmlspecialchars(strip_tags($this->power_steering));
        $this->climate=htmlspecialchars(strip_tags($this->climate));
        $this->conditioner=htmlspecialchars(strip_tags($this->conditioner));
        $this->cruise=htmlspecialchars(strip_tags($this->cruise));
        $this->xenon=htmlspecialchars(strip_tags($this->xenon));
        $this->hatch=htmlspecialchars(strip_tags($this->hatch));
        $this->navigation=htmlspecialchars(strip_tags($this->navigation));
        $this->tow_hitch=htmlspecialchars(strip_tags($this->tow_hitch));

        $stmt->bindParam(":power_steering", $this->power_steering);
        $stmt->bindParam(":climate", $this->climate);
        $stmt->bindParam(":conditioner", $this->conditioner);
        $stmt->bindParam(":cruise", $this->cruise);
        $stmt->bindParam(":xenon", $this->xenon);
        $stmt->bindParam(":hatch", $this->hatch);
        $stmt->bindParam(":navigation", $this->navigation);
        $stmt->bindParam(":tow_hitch", $this->tow_hitch);

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