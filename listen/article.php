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
			文章區
		</div>
		<div class="grid_12" style="text-align:center;">
			<?php
				if($_SESSION['account_number']!=null)
					echo "<a href='newarticle.php'><button class='btn btn-success btn-lg'>新增文章</button></a>";
			?>
		</div>
		<div class="grid_12">
			<div style="text-align:center;">
				<?php
					$DISSCUSS_TBL="disscuss"; // 發表文章用資料庫
					$RE_DISSCUSS_TBL="re_disscuss"; // 回覆文章用資料庫
					$read_num="20"; // 設定單頁顯示文章數量
					$str="select count(*) from $DISSCUSS_TBL";//計算留言數
					$list =mysql_query($str);
					list($disscuss_count) = mysql_fetch_row($list);
					$all_page=ceil($disscuss_count/$read_num); //抓取頁數
					for($i=1;$i<=$all_page;$i++){
						echo "<a href='article.php?page_num=$i'> $i </a>|";	
				}
				?>
			</div>
			<table class="table">
				<tr><td>發佈時間</td><td>討論主題</td><td>發佈人</td><td>瀏覽人數</td></tr>
				<?php
					if(empty($_GET['sort']) && empty($_GET['page_num']) ){
						$sort="time desc , serial desc";
						$page_num=1;
					}
					else if(empty($_GET['sort'])){
						$sort="time desc , serial desc"; /* 排序預設值 */
						$page_num = $_GET['page_num'];
					}
					else if(empty($_GET['page_num'])){
						$page_num=1;					/* 分頁分析 */
						$sort = $_GET['sort'];
					}
					$start_num=$read_num*($page_num-1);
					$str="select serial,time,title,count,name,email from $DISSCUSS_TBL order by $sort limit $start_num,$read_num";
					$list =mysql_query($str);
					while(list($serial,$time,$title,$count,$name,$email) = mysql_fetch_row($list)){
						if(strlen($title)>40){
							$title=substr($title,0,40)."-----";
						}
						echo "<tr><td>$time</td><td><a href='view.php?serial=$serial'>$title</a></td><td><a href='mailto:$email'>$name</a></td><td>$count</td></tr>";
					}
				?>
			</table>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>