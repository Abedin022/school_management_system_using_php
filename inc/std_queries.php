<?php 
include_once 'db.php';



// for finding out how many admins in the application

$admins_query= "SELECT * FROM admin";

$admins = $mysql->query($admins_query);



// for finding out how many teachers in the application

$teachers_query= "SELECT * FROM teacher";

$teachers = $mysql->query($teachers_query);



// for finding out how many parents in the application

$parents_query= "SELECT * FROM parent";

$parents = $mysql->query($parents_query);



// for finding out how many students in the application

$students_query= "SELECT * FROM student";

$students = $mysql->query($students_query);



// for finding out how many calssrooms in the application

$classrooms_query= "SELECT * FROM classroom";

$classrooms = $mysql->query($classrooms_query);



// for finding out how many calssroom_students in the application

$cs_query= "SELECT * FROM classroom_student";

$cs = $mysql->query($cs_query);



// for finding out how many attendances in the application

$attendances_query= "SELECT * FROM attendance";

$attendances = $mysql->query($attendances_query);



// for finding out how many courses in the application

$courses_query= "SELECT * FROM course";

$courses = $mysql->query($courses_query);



// for finding out how many exams in the application

$exams_query= "SELECT * FROM exam";

$exams = $mysql->query($exams_query);



// for finding out how many exam types in the application

$exam_types_query= "SELECT * FROM exam_type";

$exam_types = $mysql->query($exam_types_query);

// for finding out how many exam results in the application

$exam_results_query= "SELECT * FROM exam_result";

$exam_results = $mysql->query($exam_results_query);


// for finding out how many grades in the application

$grades_query= "SELECT * FROM grade";

$grades = $mysql->query($grades_query);


?>