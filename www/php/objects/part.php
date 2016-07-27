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

    public function __construct($db){
        $this->conn = $db;
    }

    function readAll(){
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
}
?>