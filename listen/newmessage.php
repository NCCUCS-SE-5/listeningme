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
		<div class='messagecard grid_8 push_2'>
			<form name="form1" method="post" action="addmessage.php">
			<div class='messagetitle'>主題：<input type="text" name="subject" style="width:90%"></div>
			<div class='messagename'>姓名：<input type="text" name="name" style="width:90%"></div>
			<div class='messageemail'>郵件：<input type="text" name="mail" style="width:90%"></div>
			<div class='messageconten'>內容：<textarea type="text" rows=7 name="content" style="width:90%"></textarea></div>
			<div style="text-align:center;">
				<button class="btn btn-success" type="submit">送出留言</button>
				<button class="btn btn-warning" type="Reset">重新填寫</button>
			</div>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>