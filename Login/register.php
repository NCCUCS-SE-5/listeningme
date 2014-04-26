<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap core CSS -->
<link href="./dist/css/bootstrap.css" rel="stylesheet">
<!-- Bootstrap theme -->
<link href="./dist/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
	<h2 class="page-header col-sm-offset-1 col-sm-10">註冊帳號</h2>
	<form class="form-horizontal" id="regForm_1" role="form" action="register_finish.php" method="post">
		<div class="form-group">
			<label class="col-sm-2 control-label">帳號</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="id">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">密碼</label>
			<div class="col-sm-4">
				<input type="password" class="form-control pull-left" name="pw">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">再一次輸入密碼</label>
			<div class="col-sm-4">
				<input type="password" class="form-control pull-left" name="pw2">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">名字</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="fullname">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">性別</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="sex">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">生日</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="birthday">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">電話</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="telephone">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">手機</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="mobile">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">地址</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="address">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">e-mail</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="email">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">職業</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="profession">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">備註</label>
			<div class="col-sm-4">
				<input type="text" class="form-control pull-left" name="other">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">請輸入驗證碼</label>
			<div class="col-sm-4">
			<img src="captcha.php" id="captcha" />
			<!-- CHANGE TEXT LINK -->
			<a href="#" onclick="
				document.getElementById('captcha').src='captcha.php?'+Math.random();
				document.getElementById('captcha-form').focus();"
				id="change-image">Change text</a><br/><br/>
			<input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-9 col-sm-2">
				<button type="submit" class="btn btn-default">下一步</button>
			</div>
		</div>
	</form>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="./dist/js/bootstrap.js"></script>
</body>
</html>