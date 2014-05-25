<?php
	session_start();
	include("connect.php");
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	//搜尋資料庫資料
	$sql    = "SELECT * FROM member_table where account_number = '$id'";
	$result = mysql_query($sql);
	$row    = @mysql_fetch_row($result);
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
				//判斷帳號與密碼是否為空白
				//以及MySQL資料庫裡是否有這個會員
				if ($id != null && $pw != null && $row[1] == $id && $row[2] == $pw) {
				    //將帳號寫入session，方便驗證使用者身份
				    $_SESSION['account_number'] = $id;
				    echo "
							<div class='phpmessage'>
								登入成功！
							</div>
						";
				    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
				} else {
						echo "
							<div class='phpmessage'>
								登入失敗！
							</div>
						";
				    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
				}
			?>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>