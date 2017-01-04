<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="ajax.js" type="text/javascript"></script>
</head>
<script type="text/javascript">

</script>
<body>
		<form class="form-horizontal" action ="checkid.php" method="post" id = "login">
			<div class="">
			<h2 style="text-align:center;">會員登錄</h2>
			<div class="form-group">
				<label class="col-sm-offset-2 control-label col-sm-2">帳號:</label>
				<div class="col-sm-4">
					<input class="form-control" id="username" type="text" name = "username">
      			</div>
	    	</div>
			<div class="form-group">
				<label class="col-sm-offset-2 control-label col-sm-2">密碼:</label>
				<div class="col-sm-4">
					<input class="form-control" id="userpassword" type="password" name ="userpassword">
      			</div>
	    	</div>
	    	<div class="form-group">  
	    		<div class="col-sm-offset-5 col-sm-4">
					<button type="submit" class="btn btn-default">登入</button> <button type="reset" class="btn btn-default">取消</button>
				</div>
			</div>
			<div class="col-sm-offset-7 col-sm-2"><a href="register.html">註冊</a></div>
        	<div class="col-sm-offset-7 col-sm-2"><a href="">忘記密碼</a></div>
		</form>		
	</div>
</body>
</html>