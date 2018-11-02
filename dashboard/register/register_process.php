<?php
	session_start(); ob_start();
	include_once '../../inc/db.php';
	$table = $_GET['table'];

	if($table === 'admin' || $table === 'teacher' || $table === 'student' || $table === 'parent'){
		
		if(isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['mobile']) && isset($_POST['dob']) && isset($_POST['password']) && isset($_POST['r_password']) && $_POST['fname']!='' || $_POST['lname']!='' || $_POST['phone']!= '' || $_POST['mobile']!='' || $_POST['dob']!='' || $_POST['password'] != '' || $_POST['r_password'] != ''){

	    	
	    	/*echo $id;
	    	die();*/
	    	$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$phone = $_POST['phone'];
			$dob = $_POST['dob'];
			$mobile = $_POST['mobile'];
			$password = $_POST['password'];
			$r_password = $_POST['r_password'];

			if($password != $r_password ){
				header("Location: register.php?table=$table&error=200");
			}
			
			else {
				$sql = "INSERT INTO $table (email, password, fname, lname, dob, phone, mobile) VALUES ('$email', md5('$password'), '$fname', '$lname', '$dob', '$phone', '$mobile')";

				$result = $mysql->query($sql);

				if(!$result){
					echo "Somethign wrong in your query\n";
					echo 'Your Erron no'.$mysql->connect_errno.'<br>';
					echo 'Your Error'.$mysql->connect_error.'<br>';
					exit;
				}
				else{

					// Insertion succesful
					header("Location: register.php?notification=100&table=$table");		
				}
			}
		}
		else{
			echo 'Give right input';
		}
	}
	else if($table==='attendance'){
		
		if(isset($_POST['doa']) && isset($_POST['student_id']) && isset($_POST['status']) && isset($_POST['remarks']) && $_POST['doa']!='' || $_POST['student_id']!='' || $_POST['status']!= '' || $_POST['remarks']!=''){
		
			$doa = $_POST['doa'];
			$student_id = $_POST['student_id'];
			$status = $_POST['status'];
			$remarks = $_POST['remarks'];

			$sql = "INSERT INTO attendance (date, student_id, attendance_status, remark) VALUES ('$doa','$student_id', '$status', '$remarks')";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='classroom'){
		
		if(isset($_POST['grade_id']) && isset($_POST['room_number']) && isset($_POST['section']) && isset($_POST['status']) && isset($_POST['remarks']) && isset($_POST['teacher_id'])  && $_POST['grade_id']!='' || $_POST['room_number']!='' || $_POST['section']!= '' || $_POST['status']!='' || $_POST['remarks']!='' || $_POST['teacher_id']!= ''){

			$grade_id = $_POST['grade_id'];
			$room_number = $_POST['room_number'];
			$section = $_POST['section'];
			$status = $_POST['status'];
			$remarks = $_POST['remarks'];
			$teacher_id = $_POST['teacher_id'];
			

			$sql = "INSERT INTO classroom (grade_id, room_number, section, status, remarks, teacher_id) VALUES ('$grade_id', '$room_number', '$section', '$status', '$remarks', '$teacher_id')";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='classroom_student'){
		
		if(isset($_POST['classroom_id']) && isset($_POST['student_id']) && $_POST['classroom_id']!='' || $_POST['student_id']!=''){

			$classroom_id = $_POST['classroom_id'];
			$student_id = $_POST['student_id'];

			$sql = "INSERT INTO classroom_student (classroom_id, student_id) VALUES ('$classroom_id', '$student_id')";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='course'){
		
		if(isset($_POST['course_code']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['grade_id']) && $_POST['course_code']!='' || $_POST['name']!='' || $_POST['description']!= '' || $_POST['grade_id']!=''){
		
			$course_code = $_POST['course_code'];
			$name = $_POST['name'];
			$description = $_POST['description'];
			$grade_id = $_POST['grade_id'];

			$sql = "INSERT INTO course (course_code, name, description, grade_id) VALUES ('$course_code', '$name', '$description', '$grade_id')";

			$result = $mysql->query($sql);
			

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='exam'){
		
		if(isset($_POST['exam_type_id']) && isset($_POST['name']) && isset($_POST['start_date']) && $_POST['exam_type_id']!='' || $_POST['name']!='' || $_POST['start_date']!= ''){
			$exam_type_id = $_POST['exam_type_id'];
			$name = $_POST['name'];
			$start_date = $_POST['start_date'];

			$sql = "INSERT INTO exam (exam_type_id, name, start_date) VALUES ('$exam_type_id', '$name','$start_date')";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='exam_type'){

		if(isset($_POST['name']) && isset($_POST['description']) && $_POST['name']!='' || $_POST['description']!=''){
			$fname = $_POST['name'];
			$description = $_POST['description'];

			$sql = "INSERT INTO exam_type (name, descr) VALUES ('$name', '$description')";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}
	else if($table==='exam_result'){
		
		if(isset($_POST['exam_id']) && isset($_POST['exam_type_id']) && isset($_POST['student_id']) && isset($_POST['grade_id']) && isset($_POST['course_id']) && isset($_POST['marks']) && $_POST['exam_id']!='' || $_POST['student_id']!='' || $_POST['course_id']!= '' || $_POST['marks']!=''){

			$exam_id = $_POST['exam_id'];
			$exam_type_id = $_POST['exam_type_id'];
			$student_id = $_POST['student_id'];
			$grade_id = $_POST['grade_id'];
			$course_id = $_POST['course_id'];
			$marks = $_POST['marks'];

			$sql = "INSERT INTO exam_result (exam_id, exam_type_id, student_id, grade_id, course_id, marks) VALUES ('$exam_id', '$exam_type_id', '$student_id', '$grade_id', '$course_id', '$marks')";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='grade'){
		
		if(isset($_POST['name']) && isset($_POST['description']) && $_POST['name']!='' || $_POST['description']!=''){
			$name = $_POST['name'];
			$description = $_POST['description'];

			$sql = "INSERT INTO grade (name, descr) VALUES ('$name', '$description')"; 
			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: register.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

?>