<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    include_once 'config/connection.php';
    include_once 'objects/student.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $student = new Student($db);
    
    $student->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    $student->readOne();
    
    if($student->student_name!=null){
        $student_arr = array(
            "student_name" => $student->student_name,
            "student_number" => $student->student_number,
            "student_age" => $student->student_age
        );
    
        http_response_code(200);
        echo json_encode($student_arr);
    } else{
        http_response_code(404);
        echo json_encode(array("message" => "Student with this id does not exist."));
    }
?>