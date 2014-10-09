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
		<!--
		<div class="grid_12 title">
			福利請聽
		</div>
		-->

		<div class="grid_12" style="padding: 50px; text-align: center">
			<img src="./images/logo.png" />
		</div>
		<div class="grid_12 container_12 tabbable" id "search-block">
		    <ul class="nav nav-pills">
		        <li class="active" style="padding-left: 375px"><a href="#pane1" data-toggle="tab">關鍵字搜尋</a></li>
		        <li><a href="#pane2" data-toggle="tab">分類搜尋</a></li>
		    </ul>
		    <div class="panel panel-default">
		  		<div class="panel-body" style="box-shadow: 0px 0px 50px #FFE1A0;">
		   			<div class="tab-content">
  						<?php include "searchbar.php" ?>
  						<div  id='result' style='display:none'>
						<?php

				    	$sql = "SELECT id,_id,title,location,max_content,max_type FROM  `selisteningme` LIMIT 0 , 30";
						$result = mysql_query($sql) or die('MySQL query error');
						echo "<div>";
						echo "<table class='table'>";
						echo "<tr><td>名稱</td><td>地區</td><td>最大金額</td><td>單位</td></tr>";
						// 顯示欄位資訊
						while ( list($id,$_id,$title,$location,$max_content,$max_type) = mysql_fetch_array($result) ) {
							echo "<tr><td><a href='setalbeview.php?id= $id'>" .$title. "</a></td>";
							echo "<td>" .$location. "</td>";
							echo "<td>" .$max_content. "</td>";
							echo "<td>" .$max_type. "</td></tr>";
						}
						echo "</table></div>";
						mysql_free_result($result); // 釋放佔用的記憶體

						?>
						</div>
					</div>
				</div>
		   	</div>
		</div>

	</section>
	<?php include 'footer.php'; ?>
</body>
</html>