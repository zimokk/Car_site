<?php
class Security{
    // database connection and table name
    private $conn;
    private $table_name = "security";

    // object properties
    public $id;
    public $abs;
    public $ebd;
    public $ebs;
    public $esp;
    public $has;
    public $hdc;
    public $traction;
    public $parktronic;
    public $airbag;

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
     function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET id=:id, abs=:abs, ebd=:ebd,
                    ebs=:ebs, esp=:esp, has=:has, hdc=:hdc,
                    traction=:traction, parktronic=:parktronic, airbag=:airbag";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->abs=htmlspecialchars(strip_tags($this->abs));
        $this->ebd=htmlspecialchars(strip_tags($this->ebd));
        $this->ebs=htmlspecialchars(strip_tags($this->ebs));
        $this->esp=htmlspecialchars(strip_tags($this->esp));
        $this->has=htmlspecialchars(strip_tags($this->has));
        $this->hdc=htmlspecialchars(strip_tags($this->hdc));
        $this->traction=htmlspecialchars(strip_tags($this->traction));
        $this->parktronic=htmlspecialchars(strip_tags($this->parktronic));
        $this->airbag=htmlspecialchars(strip_tags($this->airbag));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":abs", $this->abs);
        $stmt->bindParam(":ebd", $this->ebd);
        $stmt->bindParam(":ebs", $this->ebs);
        $stmt->bindParam(":esp", $this->esp);
        $stmt->bindParam(":has", $this->has);
        $stmt->bindParam(":hdc", $this->hdc);
        $stmt->bindParam(":traction", $this->traction);
        $stmt->bindParam(":parktronic", $this->parktronic);
        $stmt->bindParam(":airbag", $this->airbag);

        // execute query
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