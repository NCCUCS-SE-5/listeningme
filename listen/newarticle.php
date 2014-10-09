<?php
	session_start();
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
		<div class="grid_12 prefix_3">
			<form class="form-horizontal" action="addarticle.php" method="post" id="add_form" >
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">姓名：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control" type="text" name="name" id="name" style="width:150px">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">電子郵件：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control" type="text" name="email" id="email" style="width:350px">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">討論主題：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control" type="text" name="email" id="email" style="width:450px">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">主題內容：</label>
					<div class="col-md-10 col-lg-10">
						<textarea class="form-control" cols="100" rows="13" name="content" style="width: 450px" id="content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-md-offset-2 col-lg-10 col-md-10">
						<button class="btn btn-success" type="submit">送出文章</button>
					</div>
				</div>
			</form>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>