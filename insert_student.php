<?php
// include database and object files
include_once 'config/database.php';
include_once 'objects/student.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// pass connection to objects
$student = new Student($db);

// set page headers
$page_title = "Insert Student";
include_once "layout_header.php";
  
echo "<div class='right-button-margin'>
        <a href='get_students.php' class='btn btn-default pull-right'>Student List</a>
    </div>";
  
?>
<?php 
// if the form was submitted
if($_POST){
  
    // set student property values
    $student->student_name = $_POST['student_name'];
    $student->student_id = $_POST['student_id'];
    $student->student_age = $_POST['student_age'];
  
    // create the product
    if($student->create()){
        echo "<div class='alert alert-success'>Student was added.</div>";
    }
  
    // if unable to enter student, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to enter student.</div>";
    }
}
?>
  
<!-- HTML form for inserting a new student -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  
    <table class='table table-hover table-responsive table-bordered'>
	<tr>
            <td>Student ID</td>
            <td><input type='text' name='student_id' class='form-control' /></td>
        </tr>
  
        <tr>
            <td>Student Name</td>
            <td><input type='text' name='student_name' class='form-control' /></td>
        </tr>
  
        <tr>
            <td>Student Age</td>
            <td><input type='text' name='student_age' class='form-control' /></td>
        </tr>
  
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
  
    </table>
</form>
<?php
  
// footer
include_once "layout_footer.php";
?>