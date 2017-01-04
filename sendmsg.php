<?php
header("Content-Type: text/html ;charset=utf-8");
//include('config.php');
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="123456"; // Mysql password 
$db_name="test"; // Database name 

$mysqli = new mysqli($host, $username, $password, $db_name); 
if($mysqli->connect_error) {
		die('Connect Error: ' . $mysqli->connect_error);
	}
$mysqli->query("SET NAMES utf8");


$con = $_POST['con'];  //發送的內容
$getter = $_POST['getter'];  //聊天的對象
$sender = $_POST['sender'];  //發送者
$time = date("y-m-d h:i:s");  //送出的時間

if($con !=""){
	//如果內容不為空存入mysql 利用prepare函式將存入格式轉字串防止sql injection
	$sql ="INSERT INTO messages(sender,getter,content,sendtime)VALUES(?,?,?,?)";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("ssss", $sender, $getter, $con, $time);
	$stmt->execute();
}

//取出資料內容 傳資料時用戶不一定在現,原先打算利用isGet的值來確認用戶是否讀取訊息,所以在資料庫多設置了isGet欄位
	$query = "SELECT * FROM messages WHERE getter = '$getter' AND sender = '$sender' AND isGet = 0 OR getter = '$sender' AND sender = '$getter' AND isGet = 0 ORDER by sendtime DESC ";
	$result = $mysqli->query($query);
	$row_cnt = $result->num_rows;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$arr[] = $row;
	}
	if($arr){ //如果$arr有值,則拼接成json格式
	$msg ='[';
		for($i=0;$i<count($arr);$i++){
			$row =$arr[$i];
			if($i == count($arr)-1){
			$msg .= '{"sender":"'.$row['sender'].'","content":"'.$row['content'].'","date":"'.$row['sendtime'].'"}]';
			}else{
			$msg .= '{"sender":"'.$row['sender'].'","content":"'.$row['content'].'","date":"'.$row['sendtime'].'"},';
			}
		}
	}
	//將isGet讀取後改值為1,避免用戶重複取出
	/*$query = "UPDATE messages SET isGet = 1 WHERE getter = '$getter' AND sender = '$sender' OR getter = '$sender' AND sender = '$getter'";
	$result = $mysqli->query($query);*/
	//echo $msg;
	echo $msg; 
//關閉mysqli
$mysqli->close();
?>