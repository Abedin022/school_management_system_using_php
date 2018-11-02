<?php 
// 1)database server name
// 2)database name 
// 3)database user 
// 4)database user password

// server name, username, passowrd,db name 

define('dbserver','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname', 'stdms');

@$mysql = new mysqli(dbserver,dbuser,dbpass,dbname);

if($mysql->connect_errno){

	echo 'Unable to connect to the database server'.'<br>';
	echo 'Your database server provides following error'.$mysql->connect_error.'<br>';
	echo 'db.php';
	echo 'Your database server error no is'.$mysql->connect_errno.'<br>';

	exit();
}
