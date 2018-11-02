<?php
	session_start(); ob_start();
	include_once '../../inc/db.php';
	
	$id = $_GET['id'];
    $table = $_GET['table'];
    $row = $table."_id";

	if(isset($_POST['yes'])){
		$sql = "DELETE FROM $table WHERE $row=$id;";

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

			// delete succesful
			header("Location: delete.php?notification=100&table=$table");		
		}
	}
	else if(isset($_POST['no'])){
		
		header("Location: ../tables/table.php?table=$table");
	}
		
?>