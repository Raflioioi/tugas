<?php
session_start();


$db = mysqli_connect('localhost', 'root', '','ta');


$Username = "";
$Nama	  = "";
$errors	  = array();


if (isset($_POST['register_btn'])) {
	register();
}		


function register(){
	global $db, $errors, $Username, $Nama;





	$Nama		= e($_POST['nama']);
	$Username	= e($_POST['username']);
	$Password	= e($_POST['password']);
	$No_HP		= e($_POST['hp']);


	if (empty($Username)) {
		array_push($errors, "Username is required");
	}
	if (empty($Nama)) {
		array_push($errors, "Nama is required");
	}
	if (empty($Password)) {
		array_push($errors, "Password is required");
	}
	if (empty($No_HP)) {
		array_push($errors, "No_HP is required");
	}


	if (count($errors) ==0) {
		$password = md5($Password);

		$query = "INSERT INTO admin (Username, Password, Nama, No_HP)
					VALUES('$Username', 'Password', 'Nama', 'No_HP')";
		mysqli_query($db, $query);
		

		$logged_in_user_id = mysqli_insert_id($db);

		$_SESSION['user'] = getUserById($logged_in_user_id);
		$_SESSION['success'] = "You are now logged in";
		header('location: admin.php')
	}
}


function getUserIdBy($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;



function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

		if (count($errors) > 0){
			echo '<div class="errors">';
			foreach ($errors as $errors){
				echo $errors . '<br>';
			}
			echo '</div>';
		}
}