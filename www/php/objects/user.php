<?php
class User{
    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $idUser;
    public $login;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $mail;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read users
    function readAll(){

        // select all query
        $query = "SELECT * FROM " . $this->table_name . ";";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function authorize($login, $password){
        $query = "SELECT * FROM " . $this->table_name . " WHERE login=:login and password=:password ;";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $password);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
?>