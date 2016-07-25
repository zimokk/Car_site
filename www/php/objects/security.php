<?php
class Security{
    private $conn;
    private $table_name = "security";

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

    public function __construct($db){
        $this->conn = $db;
    }
    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function readById(){
         $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?;";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt;
    }
    function readByParams(){
         $query = "SELECT * FROM " . $this->table_name . " WHERE abs=:abs, ebd=:ebd,
                             ebs=:ebs, esp=:esp, has=:has, hdc=:hdc,
                             traction=:traction, parktronic=:parktronic, airbag=:airbag
                             ORDER BY id DESC LIMIT 1; ";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":abs", $this->abs);
        $stmt->bindParam(":ebd", $this->ebd);
        $stmt->bindParam(":ebs", $this->ebs);
        $stmt->bindParam(":esp", $this->esp);
        $stmt->bindParam(":has", $this->has);
        $stmt->bindParam(":hdc", $this->hdc);
        $stmt->bindParam(":traction", $this->traction);
        $stmt->bindParam(":parktronic", $this->parktronic);
        $stmt->bindParam(":airbag", $this->airbag);

        $stmt->execute();

        return $stmt;
    }
     function create(){
        $query = "INSERT INTO " . $this->table_name . " SET abs=:abs, ebd=:ebd,
                    ebs=:ebs, esp=:esp, has=:has, hdc=:hdc,
                    traction=:traction, parktronic=:parktronic, airbag=:airbag";
        $stmt = $this->conn->prepare($query);

        $this->abs=htmlspecialchars(strip_tags($this->abs));
        $this->ebd=htmlspecialchars(strip_tags($this->ebd));
        $this->ebs=htmlspecialchars(strip_tags($this->ebs));
        $this->esp=htmlspecialchars(strip_tags($this->esp));
        $this->has=htmlspecialchars(strip_tags($this->has));
        $this->hdc=htmlspecialchars(strip_tags($this->hdc));
        $this->traction=htmlspecialchars(strip_tags($this->traction));
        $this->parktronic=htmlspecialchars(strip_tags($this->parktronic));
        $this->airbag=htmlspecialchars(strip_tags($this->airbag));

        $stmt->bindParam(":abs", $this->abs);
        $stmt->bindParam(":ebd", $this->ebd);
        $stmt->bindParam(":ebs", $this->ebs);
        $stmt->bindParam(":esp", $this->esp);
        $stmt->bindParam(":has", $this->has);
        $stmt->bindParam(":hdc", $this->hdc);
        $stmt->bindParam(":traction", $this->traction);
        $stmt->bindParam(":parktronic", $this->parktronic);
        $stmt->bindParam(":airbag", $this->airbag);

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