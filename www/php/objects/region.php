<?php
class Region{
    private $conn;
    private $table_name = "regions";

    public $id;
    public $country_id;
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
    function readByCountry(){
            $query = "SELECT * FROM " . $this->table_name . " WHERE country_id = ?;";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->country_id);
            $stmt->execute();
            return $stmt;
        }
}
?>