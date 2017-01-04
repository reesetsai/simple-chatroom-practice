<?php
session_start();
//練習用並未使用資料庫
include("config.php");
if($_POST['username'] == 'root' && $_POST['userpassword'] == '123456' ){
	$_SESSION['user'] = $_POST['username'];
	header('Location: index.php');
}
if($_POST['username'] == 'A' && $_POST['userpassword'] == '123456' ){
	$_SESSION['user'] = $_POST['username'];
	header('Location: index.php');
}
if($_POST['username'] == 'B' && $_POST['userpassword'] == '123456' ){
	$_SESSION['user'] = $_POST['username'];
	header('Location: index.php');
}
if($_POST['username'] == 'C' && $_POST['userpassword'] == '123456' ){
	$_SESSION['user'] = $_POST['username'];
	header('Location: index.php');
}
//add salt to password
/*
$salt = "happynewyear";
//if username and password not empty
if($_POST['username'] != "" && $_POST['userpassword'] != ""){

	$username = $_POST['username'];
	//$userpassword = hash('sha512', $_POST['user_password'] . $salt);
	$userpassword = $_POST['userpassword'];
		if (get_magic_quotes_gpc()) {
			$username = stripslashes($username);
			$userpassword = stripslashes($userpassword);
			$username = mysql_real_escape_string($username);
			$userpassword = mysql_real_escape_string($userpassword);
		}
		$sql ="SELECT id, $username, $userpassword FROM members WHERE user = ? and user_password = ?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param('ss', $username, $userpassword);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id, $username, $userpassword);
		$stmt->fetch();

			if ($stmt->num_rows == 1) {
				$_SESSION['user'] = $username;
				header('Location: index.php');
			}else{
				echo "帳號或密碼有誤";
			}
}else{
	echo "欄位不得為空";
}

$mysqli->close();
*/
?>