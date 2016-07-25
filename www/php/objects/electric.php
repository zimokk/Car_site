<?php
class Electric{
    private $conn;
    private $table_name = "electric";

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
         $query = "SELECT * FROM " . $this->table_name . " WHERE computer=:computer, rain=:rain,
                         light=:light, mirrors_heating=:mirrors_heating, seats_heating=:seats_heating, locking=:locking,
                         seats=:seats, winows_lift=:winows_lift, mirrors_electric=:mirrors_electric
                             ORDER BY id DESC LIMIT 1; ";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":computer", $this->computer);
        $stmt->bindParam(":rain", $this->rain);
        $stmt->bindParam(":light", $this->light);
        $stmt->bindParam(":mirrors_heating", $this->mirrors_heating);
        $stmt->bindParam(":seats_heating", $this->seats_heating);
        $stmt->bindParam(":locking", $this->locking);
        $stmt->bindParam(":seats", $this->seats);
        $stmt->bindParam(":winows_lift", $this->winows_lift);
        $stmt->bindParam(":mirrors_electric", $this->mirrors_electric);

        $stmt->execute();
        return $stmt;
    }
     function create(){
        $query = "INSERT INTO " . $this->table_name . " SET computer=:computer, rain=:rain,
                    light=:light, mirrors_heating=:mirrors_heating, seats_heating=:seats_heating, locking=:locking,
                    seats=:seats, winows_lift=:winows_lift, mirrors_electric=:mirrors_electric";
        $stmt = $this->conn->prepare($query);

        $this->computer=htmlspecialchars(strip_tags($this->computer));
        $this->rain=htmlspecialchars(strip_tags($this->rain));
        $this->light=htmlspecialchars(strip_tags($this->light));
        $this->mirrors_heating=htmlspecialchars(strip_tags($this->mirrors_heating));
        $this->seats_heating=htmlspecialchars(strip_tags($this->seats_heating));
        $this->locking=htmlspecialchars(strip_tags($this->locking));
        $this->seats=htmlspecialchars(strip_tags($this->seats));
        $this->winows_lift=htmlspecialchars(strip_tags($this->winows_lift));
        $this->mirrors_electric=htmlspecialchars(strip_tags($this->mirrors_electric));

        $stmt->bindParam(":computer", $this->computer);
        $stmt->bindParam(":rain", $this->rain);
        $stmt->bindParam(":light", $this->light);
        $stmt->bindParam(":mirrors_heating", $this->mirrors_heating);
        $stmt->bindParam(":seats_heating", $this->seats_heating);
        $stmt->bindParam(":locking", $this->locking);
        $stmt->bindParam(":seats", $this->seats);
        $stmt->bindParam(":winows_lift", $this->winows_lift);
        $stmt->bindParam(":mirrors_electric", $this->mirrors_electric);

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