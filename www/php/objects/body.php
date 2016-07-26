<?php
class Body{
    private $conn;
    private $table_name = "bodies";

    public $id;
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
}
?>