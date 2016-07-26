<?php
class Mark{
    private $conn;
    private $table_name = "marks";

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . " order by id;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readOne(){
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = ;";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            return $stmt;
        }
}
?>