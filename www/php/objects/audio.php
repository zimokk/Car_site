<?php
class Audio{
    // database connection and table name
    private $conn;
    private $table_name = "audio";

    // object properties
    public $id;
    public $cd_changer;
    public $cd_player;
    public $mp3_player;
    public $tv;
    public $cassette_player;
    public $subwoofer;

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