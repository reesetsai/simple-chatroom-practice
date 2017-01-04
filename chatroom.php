<?php
session_start();
$username = trim($_GET['username']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="ajax.js" type="text/javascript"></script>
</head>
<style type="text/css">
	.well{
		text-align: center;
	}
	textarea{
		width:1150px;
		height:500px;
		max-width:1150px;
		max-height:500px;
	}

</style>
<script type="text/javascript">
	//window.resizeTo(500,700);
	window.setInterval("reflash()",3000); //每5秒呼叫reflash檢查是否有新訊息
	var myrequest;

	//利用ajax發送訊息到server端(此練習用json方法傳遞訊息)
	function sendmsg(){
		myrequest = ajaxRequest();
		var url = "sendmsg.php";
		//var data = "user=root";
		var data = "con="+$('con').value+"&getter=<?php echo $username; ?>&sender=<?php echo $_SESSION['user']; ?>";
		//window.alert(data);
		myrequest.open("post",url,true);
		myrequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		myrequest.onreadystatechange = function SendMessage(){
			if(myrequest.readyState == 4 && myrequest.status == 200){
				var mse="";
				var res = myrequest.responseText; //接收sendmsg回傳的資料(此時狀態為字串)
				var res_obj = eval("("+res+")");  //將string轉回json
				if(res_obj.length !=0){

					for(i=0;i<res_obj.length;i++){
							//取出所需的值差到mse中
							mse +=res_obj[i].sender+" 說 "+res_obj[i].content+"\r\n";
					}	
				}
				if(mse){
					//將收到的mse連續串接塞進對話框id = mes;
				$('mes').innerText += mse;
				}
			}
		}
		myrequest.send(data);
		$('con').value = ""; //完成步驟後將所輸入的訊息清空
	}
	function reflash(){
		myrequest = ajaxRequest();
		var url = "sendmsg.php";
		var data= "getter=<?php echo $username; ?>&sender=<?php echo $_SESSION['user']; ?>";
		myrequest.open("POST",url,true);
		myrequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		myrequest.onreadystatechange = function SendMessage(){
			if(myrequest.readyState == 4 && myrequest.status == 200){
				var mse="";
				var res = myrequest.responseText;
				//window.alert(res);
				var res_obj = eval("("+res+")");
				if(res_obj.length !=0){
					for(i=0;i<res_obj.length;i++){
							mse +=res_obj[i].sender+" 說 "+res_obj[i].content+"\r\n";
					}	
				}
				if(mse){
				$('mes').innerText += mse;
				}
			}
		}
		myrequest.send(data);
	}
</script>
<body>
  <div class="container">
      <div class="well">
        <h1><?php echo $_SESSION['user']; ?>正和<font color = "red"><?php echo $username; ?></font>聊天</h1>
      </div>
      	<textarea class="form-control" id="mes" rows = "25" onfocus="blur()"></textarea>
      <div class="input-group col-md-12">
          <input type="text" class="form-control" id = "con" placeholder="輸入訊息">
          <div class="input-group-btn">
              <button class="btn btn-default" onclick="sendmsg()">
               送出
              </button>
          </div>
      </div>
  </div>
</body>
</html>