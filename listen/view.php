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
	<section class="container_12" style="padding-top: 40px">
		<div class="grid_12">
			<?php
				$DISSCUSS_TBL="disscuss"; // 發表文章用資料庫
				$RE_DISSCUSS_TBL="re_disscuss"; // 回覆文章用資料庫
				$read_num="20"; // 設定單頁顯示文章數量
				$serial = $_GET["serial"];
				$str="update $DISSCUSS_TBL set count=count+1 where serial= '$serial'";
				mysql_query($str);
				$str="select time,title,content,count,name,email,web,ip from $DISSCUSS_TBL where serial='$serial'";
				$list =mysql_query($str);
				list($time,$title,$content,$count,$name,$email,$web,$ip) = mysql_fetch_row($list);
			?>
			<div class="panel panel-default">
				<div class="panel-body">

					<strong><a href="view.php?serial=<?php echo $serial?>" style="font-size: 24px"><?php echo $title?></a></strong>

					<hr />
					<small class="pull-right" style="color: gray">作者：<?php echo $name?>　瀏覽人數：<?php echo $count?></small>
					<div>
						<?php echo $content ?>
					</div>
					<br /><hr />
					<form action="replyarticle.php" method="post" style="text-align:center;">
						<input type="hidden" name="serial" value="<?php echo $serial;?>">
						<input type="hidden" name="title" value="<?php echo $title;?>">
						<?php
							if($_SESSION['account_number']!=null)
								echo '<button class="btn btn-success" type="submit">回覆本文</button>';
						?>
					</form>
					<?php re_post($serial); ?>

					<?php
					function re_post($serial){
						global $close_html,$link,$RE_DISSCUSS_TBL;
						$str="select * from $RE_DISSCUSS_TBL where re_serial = '$serial'";
						$list =mysql_query($str);
						while(list($re_serial,$re_time,$re_title,$re_content,$re_count,$re_name,$re_email,$re_web,$re_ip) = mysql_fetch_row($list)){
							echo "
							<div class='well'>
								<small>【回覆人】：<a href='mailto:".$re_email."'>".$re_name."</a></small>
								<small>【回覆時間】：".$re_time."</small><br /><br />
								<div>".$re_content."</div>
							</div><br />
							";
						}
					}
					?>
				</div>
			</div>

			<?php
				/*echo "<div class='grid_12 panel panel-default'><div class='panel-body'>".
						"<div><strong><a href='view.php?serial=$serial' style='font-size: 24px'>$title</a></strong><small class='pull-right' style='color: gray'>作者：$name  瀏覽人數：$count</small></div>".
						"<hr/>".
						"<div>$content</div>".
						"</div></div>";
				*/
			?>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>