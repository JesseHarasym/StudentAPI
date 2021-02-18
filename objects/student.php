<?php
class Student{
  
    // database connection and table name
    private $conn;
    private $table_name = "student";
  
    // object properties
    public $id;
    public $student_name;
    public $student_number;
    public $student_age;
  
    public function __construct($db){
        $this->conn = $db;
    }
  
    function create(){
  
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    student_name=:student_name, student_number=:student_number, student_age=:student_age";
  
        $stmt = $this->conn->prepare($query);
  
        // posted values
        $this->student_name=htmlspecialchars(strip_tags($this->student_name));
        $this->student_number=htmlspecialchars(strip_tags($this->student_number));
        $this->student_age=htmlspecialchars(strip_tags($this->student_age));
  
        // bind values 
        $stmt->bindParam(':student_name', $this->student_name);
        $stmt->bindParam(':student_number', $this->student_number);
        $stmt->bindParam(':student_age', $this->student_age);
  
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    // read products
    function read(){
        $query = "SELECT *
                FROM " . $this->table_name;
    
        $stmt = $this->conn->prepare($query);
    
        $stmt->execute();
    
        return $stmt;
    }

    function readOne(){
        $query = "SELECT *
        FROM " . $this->table_name . " 
                WHERE
                    id = ?
                LIMIT
                    0,1";
    
        $stmt = $this->conn->prepare( $query );
    
        $stmt->bindParam(1, $this->id);
    
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->student_name = $row['student_name'] ?? null;
        $this->student_number = $row['student_number'] ?? null;
        $this->student_age = $row['student_age'] ?? null;
    }
}
?>