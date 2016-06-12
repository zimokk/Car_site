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
    function readByParams(){
        // select all query
         $query = "SELECT * FROM " . $this->table_name . " WHERE cd_changer=:cd_changer, cd_player=:cd_player,
                             mp3_player=:mp3_player, tv=:tv, cassette_player=:cassette_player, subwoofer=:subwoofer
                             ORDER BY id DESC LIMIT 1; ";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of product to be updated
        $stmt->bindParam(":cd_changer", $this->cd_changer);
        $stmt->bindParam(":cd_player", $this->cd_player);
        $stmt->bindParam(":mp3_player", $this->mp3_player);
        $stmt->bindParam(":tv", $this->tv);
        $stmt->bindParam(":cassette_player", $this->cassette_player);
        $stmt->bindParam(":subwoofer", $this->subwoofer);
        // execute query
        $stmt->execute();

        return $stmt;
    }
    function create(){
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . " SET  cd_changer=:cd_changer, cd_player=:cd_player,
                    mp3_player=:mp3_player, tv=:tv, cassette_player=:cassette_player, subwoofer=:subwoofer";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->cd_changer=htmlspecialchars(strip_tags($this->cd_changer));
        $this->cd_player=htmlspecialchars(strip_tags($this->cd_player));
        $this->mp3_player=htmlspecialchars(strip_tags($this->mp3_player));
        $this->tv=htmlspecialchars(strip_tags($this->tv));
        $this->cassette_player=htmlspecialchars(strip_tags($this->cassette_player));
        $this->subwoofer=htmlspecialchars(strip_tags($this->subwoofer));


        // bind values
        $stmt->bindParam(":cd_changer", $this->cd_changer);
        $stmt->bindParam(":cd_player", $this->cd_player);
        $stmt->bindParam(":mp3_player", $this->mp3_player);
        $stmt->bindParam(":tv", $this->tv);
        $stmt->bindParam(":cassette_player", $this->cassette_player);
        $stmt->bindParam(":subwoofer", $this->subwoofer);

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