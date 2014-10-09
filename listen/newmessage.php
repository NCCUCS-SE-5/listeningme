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
	<section class="container_12" style="padding-top: 20px">
		<div class='messagecard grid_8 push_2'>
			<form class="form-horizontal" name="form1" method="post" action="addmessage.php" style="padding-top: 20px">
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">主題：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control " type="text" name="subject" style="width:90%">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">姓名：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control " type="text" name="name" style="width:90%">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">郵件：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control " type="text" name="mail" style="width:90%">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">內容：</label>
					<div class="col-md-10 col-lg-10">
						<textarea class="form-control" type="text" rows=7 name="content" style="width:90%"></textarea>
					</div>
				</div>
				<div style="text-align:center;">
					<button class="btn btn-success" type="submit">送出留言</button>
					<button class="btn btn-warning" type="Reset">重新填寫</button>
				</div>
			</form>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>