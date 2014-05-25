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
		<div class="grid_12 title">
			福利請聽
		</div>
		<div class="grid_12">
			<?php
		    $sql = "SELECT * FROM  `selisteningme` LIMIT 0 , 30";
				$result = mysql_query($sql) or die('MySQL query error');
				echo "<table class='table'>";
				echo "<tr><td>名稱</td><td>地區</td><td>最大金額</td><td>單位</td></tr>";
				// 顯示欄位資訊
				while ( $row = mysql_fetch_array($result) ) {
					echo "<tr><td>" .$row[9]. "</td>";
					echo "<td>" .$row[5]. "</td>";
					echo "<td>" .$row[6]. "</td>";
					echo "<td>" .$row[7]. "</td></tr>";
				}
				echo "</table>";
				mysql_free_result($result); // 釋放佔用的記憶體
			?>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>