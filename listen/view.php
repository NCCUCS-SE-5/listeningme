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

		<table class="table">
			<tr><td><?php echo $title; ?></td></tr>
			<tr><td>【發佈人】：<a href="mailto:<?php echo $email;?>"><?php echo $name;?></a></td></tr>
			<tr><td>【發佈時間】：<?php echo $time;?>【瀏覽人數】：<?php echo $count;?></td></tr>
			<tr><td><?php echo $content;?></td></tr>
		</table>
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
					<table class='table'>
						<tr><td>【回覆人】：<a href='mailto:".$re_email."'>".$re_name."</a></td></tr>
						<tr><td>【回覆時間】：".$re_time."</td></tr>
						<tr><td>".$re_content."</td></tr>
					</table></br>
					";
				}
			}
			?>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>