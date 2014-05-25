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
			留言板
		</div>
		<div class="grid_12" style="text-align:center;">
			<a href="newmessage.php"><button class="btn btn-success btn-lg">留言</button></a>
		</div>
		<?php
			/* 查詢欄位資料 */
			$sql="select * from guestbook ORDER BY no DESC limit 0, 10";  //從guestbook讀取資料並依no欄位做遞減排序
			$result=mysql_query($sql);
			/* 顯示資料庫資料 */
			while (list($no,$name,$mail,$subject,$content,$putdate)=mysql_fetch_row($result))
			{
				echo "<div class='messagecard grid_8 push_2'>";
				echo "<div class='messagetitle'>留言主題:".$subject."</div>";
				echo "<div class='messagename'>姓名:".$name."</div>";
				echo "<div class='messageemail'>E-mail:<a href=mailto:$mail>".$mail."</a>"."</div>";
				echo "<div class='messagetime'>留言時間:".$putdate."</div>";
				echo "<div class='messageconten'>留言內容:".nl2br($content)."</div>";
				echo "</div>";
			}
		?>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>