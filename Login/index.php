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
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loginModal">登入</button>
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="loginFormLabel">登入會員</h4>
					<div class="col-sm-offset-8 col-sm-4">
						<a href="register.php">還不是會員? 點此註冊</a>
					</div>
					<br>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="loginForm" role="form" action="connect.php" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label">帳號</label>
							<div class="col-sm-10">
								<input type="text" class="form-control pull-left" name="id">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">密碼</label>
							<div class="col-sm-10">
								<input type="password" class="form-control pull-left" name="pw">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-10 col-sm-2">
								<button type="submit" class="btn btn-default">登入</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="./dist/js/bootstrap.js"></script>
</body>
</html>
