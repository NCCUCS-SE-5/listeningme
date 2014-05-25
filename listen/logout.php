<?php
	session_start();
	//將session清空
	unset($_SESSION['account_number']);
?>
<head>
	<meta charset="utf-8">
	<title>福利請聽</title>
	<?php include 'include.php'; ?>
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="container_12">
		<div class="grid_12" style="text-align:center;height:400px">
			<?php
				echo "
					<div class='phpmessage'>
						登出中
					</div>
				";
				echo "<meta http-equiv=REFRESH CONTENT=1;url=index.php>";
			?>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>