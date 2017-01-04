<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="ajax.js" type="text/javascript"></script>
  	<script type="text/javascript" src ="ajax.js"></script>
</head>
<style type="text/css">
	.well{
		text-align: center;
	}
</style>
<script type="text/javascript">
	function change(val,obj){
		if(val =='over'){
			obj.style.color = "red";
			obj.style.cursor= "pointer";
		}else{
			obj.style.color = "black";
		}
	}
	//傳遞username 開新視窗
	function openChatroom(obj){
		window.open('chatroom.php?username='+encodeURI(obj.innerText),"_blank");
	}

</script>
<body>
	<div class ="container col-md-12">
		<div class="well col-md-3">
			<h1>在線上ID</h1>
			<ul class="list-group col-md-12">
				<li class="list-group-item" onmouseover="change('over',this)" onmouseleave="change('out',this)" onclick="openChatroom(this)">A</li>
				<li class="list-group-item" onmouseover="change('over',this)" onmouseleave="change('out',this)" onclick="openChatroom(this)">B</li>
				<li class="list-group-item" onmouseover="change('over',this)" onmouseleave="change('out',this)" onclick="openChatroom(this)">C</li>
			</ul>
		</div>

        

      <div class="well col-md-9">
      	<h1>聊天大廳</h1>
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

	</div>

</body>
</html>