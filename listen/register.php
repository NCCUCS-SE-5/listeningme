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
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="container_12">
		<form class="form-horizontal" id="regForm_1" role="form" action="register_finish.php" method="post">
			<div class="form-group">
				<label class="grid_2 push_2 control-label">帳號</label>
				<div class="grid_5 push_2">
					<input type="text" class="form-control pull-left" name="id">
				</div>
			</div>
			<div class="form-group">
				<label class="grid_2 push_2 control-label">密碼</label>
				<div class="grid_5 push_2">
					<input type="password" class="form-control pull-left" name="pw">
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
					<input type="text" class="form-control pull-left" name="email">
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
				<input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
				</div>
			</div>
			<div class="form-group">
				<div class="grid_1 push_6" style="margin-top:20px">
					<button type="submit" class="btn btn-primary">下一步</button>
				</div>
			</div>
		</form>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>