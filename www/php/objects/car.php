<?php
class Car{
    // database connection and table name
    private $conn;
    private $table_name = "cars";

    // object properties
    public $idCars;
    public $description;
    public $mark_id;
    public $model_id;
    public $cost;
    public $year;
    public $fuel_id;
    public $transmission;
    public $body_id;
    public $user_id;
    public $city_id;

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

    function readWithFilter ($max_price,$min_price,$year_begin,$year_end)
    {
        $helper;
        if(empty($this->mark_id) and empty($this->model_id) and empty($this->fuel_id)
            and empty($this->transmission) and empty($this->body_id) and empty($max_price)
             and empty($min_price)  and empty($year_begin) and empty($year_end)){
                return $this->readAll();
            }
        if(!empty($this->mark_id))
        {
            $helper = $helper.' WHERE ';
            $helper = $helper . " mark_id = " . $this->mark_id ;
        }
        if(!empty($this->model_id))
        {
            if(!empty($helper)){
                $helper = $helper.' and ';
            }
            else{
                $helper = $helper.' WHERE ';
            }
            $helper = $helper . " model_id = " . $this->model_id ;
        }
        if(!empty($this->fuel_id))
        {
            if(!empty($helper)){
                $helper = $helper.' and ';
            }
            else{
                $helper = $helper.' WHERE ';
            }
            $helper = $helper . " fuel_id = " . $this->fuel_id ;
        }
        if(!empty($this->body_id))
        {
            if(!empty($helper)){
                $helper = $helper.' and ';
            }
            else{
                $helper = $helper.' WHERE ';
            }
            $helper = $helper . " body_id = " . $this->body_id ;
        }
        if(!empty($this->transmission))
        {
            if(!empty($helper)){
                $helper = $helper.' and ';
            }
            else{
                $helper = $helper.' WHERE ';
            }
            $helper = $helper . " transmission = " . $this->transmission ;
        }
        if(!empty($max_price) and !empty($min_price))
        {
            if(!empty($helper)){
                $helper = $helper.' and ';
            }
            else{
                $helper = $helper.' WHERE ';
            }
            $helper = $helper . " cost between " . $max_price . " and ". $min_price ;
        }
        if(!empty($year_begin) and !empty($year_end))
        {
            if(!empty($helper)){
                $helper = $helper.' and ';
            }
            else{
                $helper = $helper.' WHERE ';
            }
            $helper = $helper . " year between " . $year_begin . " and ". $year_end ;
        }
        /*TRAnsmission
        if(!$body_id.is_null())
        {
           $helper = $helper . " and body_id = " . $body_id ;
        }   */
        
        $sql = "SELECT * FROM " . $this->table_name . $helper . " ;" ;
        
        $query = $sql;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
}
?>