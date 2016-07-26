<?php
class Model{
    private $conn;
    private $table_name = "models";

    public $id;
    public $mark_id;
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

    function readMark(){
            $query = "SELECT * " . $this->table_name . " WHERE mark_id = ?;";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->mark_id);
            $stmt->execute();
            return $stmt;
        }
}
?>