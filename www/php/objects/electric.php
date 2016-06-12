<?php
class Electric{
    // database connection and table name
    private $conn;
    private $table_name = "electric";

    // object properties
    public $id;
    public $computer;
    public $rain;
    public $light;
    public $mirrors_heating;
    public $seats_heating;
    public $locking;
    public $seats;
    public $winows_lift;
    public $mirrors_electric;

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
        $query = "INSERT INTO " . $this->table_name . " SET id=:id, computer=:computer, rain=:rain,
                    light=:light, mirrors_heating=:mirrors_heating, seats_heating=:seats_heating, locking=:locking,
                    seats=:seats, winows_lift=:winows_lift, mirrors_electric=:mirrors_electric";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->computer=htmlspecialchars(strip_tags($this->computer));
        $this->rain=htmlspecialchars(strip_tags($this->rain));
        $this->light=htmlspecialchars(strip_tags($this->light));
        $this->mirrors_heating=htmlspecialchars(strip_tags($this->mirrors_heating));
        $this->seats_heating=htmlspecialchars(strip_tags($this->seats_heating));
        $this->locking=htmlspecialchars(strip_tags($this->locking));
        $this->seats=htmlspecialchars(strip_tags($this->seats));
        $this->winows_lift=htmlspecialchars(strip_tags($this->winows_lift));
        $this->mirrors_electric=htmlspecialchars(strip_tags($this->mirrors_electric));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":computer", $this->computer);
        $stmt->bindParam(":rain", $this->rain);
        $stmt->bindParam(":light", $this->light);
        $stmt->bindParam(":mirrors_heating", $this->mirrors_heating);
        $stmt->bindParam(":seats_heating", $this->seats_heating);
        $stmt->bindParam(":locking", $this->locking);
        $stmt->bindParam(":seats", $this->seats);
        $stmt->bindParam(":winows_lift", $this->winows_lift);
        $stmt->bindParam(":mirrors_electric", $this->mirrors_electric);

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