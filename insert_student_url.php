<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'config/connection.php';
    include_once 'objects/student.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $student = new Student($db);

    $data = json_decode(file_get_contents("php://input"));


if(!empty($data->student_name) && !empty($data->student_age) && !empty($data->student_number)){
    $student->student_name = $data->student_name;
    $student->student_age = $data->student_age;
    $student->student_number = $data->student_number;
  
    if($student->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Student was added successfully."));
    } else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to add student."));
    }
} else{
        http_response_code(400);
        echo json_encode(array("message" => "Unable to add student. You are likely missing required data."));
    }
?>

  
