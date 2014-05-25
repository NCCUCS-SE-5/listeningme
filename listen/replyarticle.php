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
	<section class="container_12">
		<div class="grid_12">
			<form action="addarticle.php" method="post" id="add_form" >
				<table class="table">
					<tr><td>討論主題</td><td><input type="text" name="re_title" value="<?php echo $title;?>" disabled style="width: 350;"></td></tr>
					<tr><td>尊姓大名</td><td><input type="text" name="re_name"  style="width: 150;" id="re_name" value=<?php echo $_SESSION['account_number'] ?> disabled></td></tr>
					<tr><td>電子郵件</td><td><input type="text" name="re_email"  style="width: 350;" id="re_email"></td></tr>
					<tr><td>回覆內容</td><td><textarea cols="" rows="6" name="re_content" style="width: 350;" id="re_content"></textarea></td></tr>
					<tr><td colspan="2" style="text-align:center;">
						<input type="hidden" name="re_serial" value="<?php echo $serial;?>">
						<button class="btn btn-success btn-lg" type="submit">送出回覆</button>
					</td></tr>
			</table>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>