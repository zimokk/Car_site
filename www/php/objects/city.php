<?php
class City{
    private $conn;
    private $table_name = "cities";

    public $id;
    public $region_id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readByRegion(){
            $query = "SELECT * FROM " . $this->table_name . " WHERE region_id = ?;";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->region_id);
            $stmt->execute();
            return $stmt;
        }
}
?>