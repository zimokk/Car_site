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
    function register(){
        $query = "INSERT INTO " . $this->table_name . " SET login=:login, email=:email,
                            password=:password, first_name=:first_name, last_name=:last_name, phone=:phone ;";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->login=htmlspecialchars(strip_tags($this->login));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->last_name=htmlspecialchars(strip_tags($this->last_name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));

        // bind values
        $stmt->bindParam(":login", $this->login);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":phone", $this->phone);

        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>