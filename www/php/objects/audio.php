<?php
class Audio{
    private $conn;
    private $table_name = "audio";

    public $id;
    public $cd_changer;
    public $cd_player;
    public $mp3_player;
    public $tv;
    public $cassette_player;
    public $subwoofer;

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
         $query = "SELECT * FROM " . $this->table_name . " WHERE cd_changer=:cd_changer, cd_player=:cd_player,
                             mp3_player=:mp3_player, tv=:tv, cassette_player=:cassette_player, subwoofer=:subwoofer
                             ORDER BY id DESC LIMIT 1; ";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":cd_changer", $this->cd_changer);
        $stmt->bindParam(":cd_player", $this->cd_player);
        $stmt->bindParam(":mp3_player", $this->mp3_player);
        $stmt->bindParam(":tv", $this->tv);
        $stmt->bindParam(":cassette_player", $this->cassette_player);
        $stmt->bindParam(":subwoofer", $this->subwoofer);
        $stmt->execute();

        return $stmt;
    }
    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET  cd_changer=:cd_changer, cd_player=:cd_player,
                    mp3_player=:mp3_player, tv=:tv, cassette_player=:cassette_player, subwoofer=:subwoofer";
        $stmt = $this->conn->prepare($query);
        $this->cd_changer=htmlspecialchars(strip_tags($this->cd_changer));
        $this->cd_player=htmlspecialchars(strip_tags($this->cd_player));
        $this->mp3_player=htmlspecialchars(strip_tags($this->mp3_player));
        $this->tv=htmlspecialchars(strip_tags($this->tv));
        $this->cassette_player=htmlspecialchars(strip_tags($this->cassette_player));
        $this->subwoofer=htmlspecialchars(strip_tags($this->subwoofer));

        $stmt->bindParam(":cd_changer", $this->cd_changer);
        $stmt->bindParam(":cd_player", $this->cd_player);
        $stmt->bindParam(":mp3_player", $this->mp3_player);
        $stmt->bindParam(":tv", $this->tv);
        $stmt->bindParam(":cassette_player", $this->cassette_player);
        $stmt->bindParam(":subwoofer", $this->subwoofer);

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