<?php
	session_start();
	$title = $_POST["title"];
	$serial = $_POST["serial"];
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
		<div class="grid_12">
			<form class="form-horizontal" action="addarticle.php" method="post" id="add_form" >
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">討論主題：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control " type="text" name="re_title" style="width:350;" value="<?php echo $title;?>" disabled>
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">尊姓大名：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control " type="text" name="re_name" style="width: 150;" id="re_name" value="<?php echo $_SESSION['account_number'] ?>" disabled>
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">電子郵件：</label>
					<div class="col-md-10 col-lg-10">
						<input class="form-control " type="text" name="re_email" style="width: 350;" id="re_email">
					</div>
				</div>
				<div class='form-group'>
					<label class="col-md-2 col-lg-2 control-label">回覆內容：</label>
					<div class="col-md-10 col-lg-10">
						<textarea class="form-control" cols="100" rows="6" name="re_content" style="width: 350;" id="re_content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-md-offset-2 col-lg-10 col-md-10">
						<button class="btn btn-success btn-lg" type="submit">送出回覆</button>
					</div>
				</div>
			</form>

		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>