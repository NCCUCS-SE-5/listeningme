<?php
	session_start();
	include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>福利請聽</title>
	<?php include 'include.php'; ?>
	<script type="text/javascript">
	function testEmail(){
		var div=document.getElementById("errEmail");
		var inEmail=document.getElementById("inEmail");
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!regex.test(inEmail.value))
			//div.innerHTML=inEmail.value;
			div.innerHTML="Email格式錯誤，請重新輸入";
		else
			div.innerHTML="";
	}
	function testAccount(){
		var div=document.getElementById("errAccount");
		var inAccount=document.getElementById("inAccount");
		var regex=/[a-zA-Z]+[a-zA-Z0-9]/;
		if (!regex.test(inAccount.value))
			//div.innerHTML=inAccount.value;
			div.innerHTML="帳號格式錯誤，請重新輸入(帳號需為英文字母開頭，並僅由英文字母及數字組成)";
		else
			div.innerHTML="";
	}
	function testPasswd(){
		var div=document.getElementById("errPasswd");
		var inPasswd=document.getElementById("inPasswd");
		var regex=/\s/;
		if (regex.test(inPasswd.value))
			div.innerHTML="密碼不可含有空白，請重新輸入";
		else
			div.innerHTML="";
	}
	</script>
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="container_12">
		<div class="grid_12 panel panel-default">
			<div class="panel-body">
				<div class="pull-left">
					<h1 style="color: #575757">註冊會員</h1>
				</div>
				<br><br><hr /><br>
				<form class="grid_12 form-horizontal" id="regForm_1" role="form" action="register_finish.php" method="post">
					<div class="form-group">
						<label class="grid_2 push_2 control-label">帳號</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="id" id="inAccount" onchange="testAccount();">
						</div>
						<div id="errAccount" class="grid_2 push_2 text-danger" style="font-size: 14px">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">密碼</label>
						<div class="grid_5 push_2">
							<input type="password" class="form-control pull-left" name="pw" id="inPasswd" onchange="testPasswd();">
						</div>
						<div id="errPasswd" class="grid_2 push_2 text-danger" style="font-size: 14px">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">確認密碼</label>
						<div class="grid_5 push_2">
							<input type="password" class="form-control pull-left" name="pw2">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">名字</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="fullname">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">性別</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="sex">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">生日</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="birthday">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">電話</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="telephone">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">手機</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="mobile">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">地址</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="address">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">Email</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="email" id="inEmail" onchange="testEmail();">
						</div>
						<div id="errEmail" class="grid_2 push_2 text-danger" style="font-size: 14px">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">職業</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="profession">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">備註</label>
						<div class="grid_5 push_2">
							<input type="text" class="form-control pull-left" name="other">
						</div>
					</div>
					<div class="form-group">
						<label class="grid_2 push_2 control-label">請輸入驗證碼</label>
						<div class="grid_5 push_2">
						<img src="captcha.php" id="captcha" />
						<!-- CHANGE TEXT LINK -->
						<a href="#" onclick="
							document.getElementById('captcha').src='captcha.php?'+Math.random();
							document.getElementById('captcha-form').focus();"
							id="change-image">換一組驗證碼</a><br/><br/>
						<input type="text" class="form-control pull-left" name="captcha" id="captcha-form" autocomplete="off" /><br/>
						</div>
					</div>
					<div class="form-group">
						<div class="grid_1 push_6" style="margin-top:20px">
							<button type="submit" class="btn btn-primary">下一步</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>