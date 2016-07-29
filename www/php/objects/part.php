<?php
class Part{
    private $conn;
    private $table_name = "parts";

    public $id;
    public $mark_id;
    public $model_id;
    public $year_begin;
    public $year_end;
    public $city_id;
    public $region_id;
    public $country_id;
    public $description;
    public $phone;
    public $skype;
    public $email;
    public $user_id;
    public $city_name;

    public function __construct($db){
        $this->conn = $db;
    }
    function readAll(){
        $query = "SELECT parts.*, cities.name as city_name,
                        marks.name as mark_name, models.name as model_name
                        FROM " . $this->table_name . " Inner join cities on parts.city_id = cities.id
                                                       Inner join models on models.id = parts.model_id
                                                       Inner join marks on marks.id = parts.mark_id;";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET mark_id=:mark_id, model_id=:model_id,
                            year_begin=:year_begin, year_end=:year_end, city_id=:city_id, region_id=:region_id,
                            country_id=:country_id, description=:description, phone=:phone, skype=:skype,
                            email=:email, user_id=:user_id;";
        $stmt = $this->conn->prepare($query);

        $this->login=htmlspecialchars(strip_tags($this->mark_id));
        $this->login=htmlspecialchars(strip_tags($this->model_id));
        $this->login=htmlspecialchars(strip_tags($this->year_begin));
        $this->login=htmlspecialchars(strip_tags($this->year_end));
        $this->login=htmlspecialchars(strip_tags($this->city_id));
        $this->login=htmlspecialchars(strip_tags($this->region_id));
        $this->login=htmlspecialchars(strip_tags($this->country_id));
        $this->login=htmlspecialchars(strip_tags($this->description));
        $this->login=htmlspecialchars(strip_tags($this->phone));
        $this->login=htmlspecialchars(strip_tags($this->skype));
        $this->login=htmlspecialchars(strip_tags($this->email));
        $this->login=htmlspecialchars(strip_tags($this->user_id));

        $stmt->bindParam(":mark_id", $this->mark_id);
        $stmt->bindParam(":model_id", $this->model_id);
        $stmt->bindParam(":year_begin", $this->year_begin);
        $stmt->bindParam(":year_end", $this->year_end);
        $stmt->bindParam(":city_id", $this->city_id);
        $stmt->bindParam(":region_id", $this->region_id);
        $stmt->bindParam(":country_id", $this->country_id);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":skype", $this->skype);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":user_id", $this->user_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function readWithFilter($year_begin,$year_end){
        $helper;
        if(empty($this->mark_id) and empty($this->model_id) and empty($year_begin)
            and empty($year_end) and empty($this->country_id)
            and empty($this->region_id) and empty($this->city_id)){
                return $this->readAll();
            }
        $helper = $helper.' WHERE 1=1';
        if(!empty($this->mark_id))
        {
            $helper = $helper.' and ';
            $helper = $helper . " parts.mark_id = " . $this->mark_id ;
        }
        if(!empty($this->model_id))
        {
            $helper = $helper.' and ';
            $helper = $helper . " parts.model_id = " . $this->model_id ;
        }
        if(!empty($year_begin) and !empty($year_end))
        {
            $helper = $helper.' and ';
            $helper = $helper . " parts.year_begin > " . $year_begin . " and parts.year_end < ". $year_end ;
        }
        else if(!empty($year_begin)){
            $helper = $helper.' and ';
            $helper = $helper . " parts.year_begin >= " . $year_begin;
        }
        else if(!empty($year_end)){
            $helper = $helper.' and ';
            $helper = $helper . " parts.year_end <= " . $year_end;
        }
        if(!empty($this->country_id)){
            $helper = $helper.' and parts.country_id = '.$this->country_id;
            if(!empty($this->region_id)){
                $helper = $helper.' and parts.region_id = '.$this->region_id;
                if(!empty($this->city_id)){
                    $helper = $helper.' and parts.city_id = '.$this->city_id;
                }
            }
        }
        $sql = " SELECT parts.*, cities.name as city_name, marks.name as mark_name, models.name as model_name ".
            "FROM " . $this->table_name ." Inner join cities on parts.city_id = cities.id
                                           Inner join models on models.id = parts.model_id
                                           Inner join marks on marks.id = parts.mark_id ". $helper . " ;" ;
        /*region + countries*/
        $query = $sql;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
}
?>