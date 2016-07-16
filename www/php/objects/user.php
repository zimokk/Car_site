<?php

class User{
    private $conn;
    private $table_name = "users";

    public $idUser;
    public $login;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $email;

    public function __construct($db){
        $this->conn = $db;
    }
    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function authorize($login, $password){
        $query = "SELECT * FROM " . $this->table_name . " WHERE login=:login and password=:password ;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt;
    }
    function check_email($email){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email=:email;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt;
    }
    function check_login($login){
        $query = "SELECT * FROM " . $this->table_name . " WHERE login=:login;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":login", $login);
        $stmt->execute();
        return $stmt;
    }
}
?>