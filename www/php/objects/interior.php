<?php
class Interior{
    private $conn;
    private $table_name = "interior";

    public $id;
    public $velour;
    public $leather;
    public $alloy_wheels;
    public $wood;

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
         $query = "SELECT * FROM " . $this->table_name . " WHERE velour=:velour, leather=:leather,
                             alloy_wheels=:alloy_wheels, wood=:wood
                             ORDER BY id DESC LIMIT 1; ";
        $stmt = $this->conn->prepare( $query );

        $stmt->bindParam(":velour", $this->velour);
        $stmt->bindParam(":leather", $this->leather);
        $stmt->bindParam(":alloy_wheels", $this->alloy_wheels);
        $stmt->bindParam(":wood", $this->wood);

        $stmt->execute();

        return $stmt;
    }
    function create(){
         $query = "INSERT INTO " . $this->table_name . " SET velour=:velour, leather=:leather,
                     alloy_wheels=:alloy_wheels, wood=:wood";
         $stmt = $this->conn->prepare($query);

         $this->velour=htmlspecialchars(strip_tags($this->velour));
         $this->leather=htmlspecialchars(strip_tags($this->leather));
         $this->alloy_wheels=htmlspecialchars(strip_tags($this->alloy_wheels));
         $this->wood=htmlspecialchars(strip_tags($this->wood));

         $stmt->bindParam(":velour", $this->velour);
         $stmt->bindParam(":leather", $this->leather);
         $stmt->bindParam(":alloy_wheels", $this->alloy_wheels);
         $stmt->bindParam(":wood", $this->wood);

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