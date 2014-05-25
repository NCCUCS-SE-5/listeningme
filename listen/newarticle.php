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
	<section class="container_12">
		<div class="grid_12">
			<form action="addarticle.php" method="post" id="add_form" >
				<table class="table">
				<tr><td nowrap>姓名</td><td><input type="text" name="name"  style="width: 150;" id="name" value=<?php echo $_SESSION['account_number'] ?> disabled></td></tr>
				<tr><td nowrap>電子郵件</td><td><input type="text" name="email"  style="width: 350;" id="email"></td></tr>
				<tr><td nowrap>討論主題</td><td><input type="text" name="title"  style="width: 350;" id="title"></td></tr>
				<tr><td nowrap>主題內容</td><td><textarea cols="" rows="6" name="content" style="width: 350;" id="content"></textarea></td></tr>
				<tr><td><button class="btn btn-success btn-lg" type="submit">送出文章</button></td></tr>
			</table>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>