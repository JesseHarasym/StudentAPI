<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once 'config/database.php';
    include_once 'objects/student.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $student = new Student($db);

    $stmt = $student->read();
    $num = $stmt->rowCount();
      
    if($num>0){
        $students_arr=array();
        $students_arr["student_records"]=array();
      
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
      
            $students_item=array(
                "id" => $id,
                "student_name" => $student_name,
                "student_number" => $student_number,
                "student_age" => $student_age
            );
            array_push($students_arr["student_records"], $students_item);
        }
        http_response_code(200);
        echo json_encode($students_arr);
    } else{
        http_response_code(404);
      
        echo json_encode(
            array("message" => "No students found.")
        );
    }
?>
<?php 
