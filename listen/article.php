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
		<div>
			<?php
				if($_SESSION['account_number']!=null)
					echo "<a href='newarticle.php'><button class='btn btn-default btn-lg'>新增文章</button></a>";
			?>
		</div>
		<div>
			<?php
			$DISSCUSS_TBL="disscuss"; // 發表文章用資料庫
			$RE_DISSCUSS_TBL="re_disscuss"; // 回覆文章用資料庫
			$read_num="20"; // 設定單頁顯示文章數量
			$str="select count(*) from $DISSCUSS_TBL";//計算留言數
			$list =mysql_query($str);
			list($disscuss_count) = mysql_fetch_row($list);
			$all_page=ceil($disscuss_count/$read_num); //抓取頁數
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
			$str="select serial,time,title,count,name,content from $DISSCUSS_TBL order by $sort limit $start_num,$read_num";
			$list =mysql_query($str);
			while(list($serial,$time,$title,$count,$name,$content) = mysql_fetch_row($list)){
				if(strlen($title)>40){
					$title=substr($title,0,40)."-----";
				}
				$precontent=substr(wordwrap($content, 65, "<br />", true), 0, 195);

				//echo "<tr><td><a href='view.php?serial=$serial'>$title</a></td><td>$time</td><td><a href='mailto:$email'>$name</a></td><td>$count</td></tr>";
				echo "<div class='grid_12 panel panel-default'><div class='panel-body'>".
						"<div><strong><a href='view.php?serial=$serial' style='font-size: 24px'>$title</a></strong><small class='pull-right' style='color: gray'>作者：$name  瀏覽人數：$count</small></div>".
						"<br /><hr/>".
						"<div>$precontent</div>".
						"</div></div>";
			}
			?>
			<!--
			<table class="table">
				<thead>
					<tr><td>討論主題</td><td>發佈時間</td><td>發佈人</td><td>瀏覽人數</td></tr>
				</thead>
				<tbody>
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
						echo "<tr><td><a href='view.php?serial=$serial'>$title</a></td><td>$time</td><td><a href='mailto:$email'>$name</a></td><td>$count</td></tr>";
					}
					?>
				</tbody>
			</table>
			-->
			<div style='text-align: center'>
				<?php
					echo "<ul class='pagination'>";
					for($i=1;$i<=$all_page;$i++){
						echo "<li><a href='article.php?page_num=$i'> $i </a></li>";
					}
					echo "</ul>";
				?>
			</div>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>