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
		<div class="grid_12 panel panel-default">
  			<div class="panel-body" style="min-height: 500px">
	  			<div class="tabbable" id "search-block">
				    <ul class="nav nav-tabs">
				        <li class="active"><a href="#pane1" data-toggle="tab">關鍵字搜尋</a></li>
				        <li><a href="#pane2" data-toggle="tab">分類搜尋</a></li>
				    </ul>
				    <div class="tab-content">
				        <div id="pane1" class="tab-pane active">
				            <form class="form-wrapper cf" id="search-by-keyword-form" style="width: 470px" method="GET">
				                <input type="text" id="keyword" name="keyword" placeholder=" 請輸入關鍵字..." required>
				                <button class="btn-search" id="search-by-keyword-btn">搜尋</button>
				            </form>
				        </div>
				        <div id="pane2" class="tab-pane">
				            <form class="form-wrapper cf" id="search-by-category-form" style="width: 380px">
				                <div class="input-control select place-left">
				                    <select style="border-radius: 7px 0 0 7px;" id="loc">
				                        <option value="" disabled selected>地區</option>
                                        <option value="中央">中央</option>
				                        <option value="基隆市">基隆市</option>
				                        <option value="台北市">台北市</option>
				                        <option value="新北市">新北市</option>
				                        <option value="桃園縣">桃園縣</option>
				                        <option value="新竹市">新竹市</option>
				                        <option value="新竹縣">新竹縣</option>
				                        <option value="苗栗縣">苗栗縣</option>
				                        <option value="臺中市">臺中市</option>
				                        <option value="彰化縣">彰化縣</option>
				                        <option value="南投縣">南投縣</option>
				                        <option value="雲林縣">雲林縣</option>
				                        <option value="嘉義市">嘉義市</option>
				                        <option value="嘉義縣">嘉義縣</option>
				                        <option value="臺南市">臺南市</option>
				                        <option value="高雄市">高雄市</option>
				                        <option value="屏東縣">屏東縣</option>
				                        <option value="宜蘭縣">宜蘭縣</option>
				                        <option value="花蓮縣">花蓮縣</option>
				                        <option value="臺東縣">臺東縣</option>
				                        <option value="澎湖縣">澎湖縣</option>
				                        <option value="金門縣">金門縣</option>
				                        <option value="連江縣">連江縣</option>
                                        <option value="全國適用">全國適用</option>
				                    </select>
				                </div>
				                <div class="input-control select place-left">
				                    <select id="identity">
				                        <option value="" disabled selected>身分</option>
                                        <option value="low-income">低收入戶</option>
				                        <option value="elder">老人</option>
				                        <option value="disabled">身障</option>
                                        <option value="baby">嬰兒</option>
                                        <option value="child">兒童</option>
				                        <option value="sefamily">單親家庭</option>
				                    </select>
				                </div>
				                <button class="btn-select" id="search-by-category-btn">搜尋</button>
				            </form>
				        </div>
			    </div><!-- /.tab-content -->
				</div><!-- /.tabbable -->
				<?php

			    	$sql = "SELECT id,_id,title,location,max_content,max_type FROM `selisteningme`";
					$result = mysql_query($sql) or die('MySQL query error');
					echo "<div id='result' style='display:none'>";
					echo "<table class='table'>";
					echo "<tr><td>名稱</td><td>地區</td><td>最大金額</td><td>單位</td></tr>";
					// 顯示欄位資訊
					while ( list($id,$_id,$title,$location,$max_content,$max_type) = mysql_fetch_array($result)){
						echo "<tr><td><a href='setalbeview.php?id= $id'>" .$title. "</td>";
						echo "<td>" .$location. "</td>";
						echo "<td>" .$max_content. "</td>";
						echo "<td>" .$max_type. "</td></tr>";
					}
					echo "</table></div>";
					mysql_free_result($result); // 釋放佔用的記憶體


                    $keyword = $_GET["keyword"];
                    $location = $_GET["location"];
                    $identity = $_GET["identity"];
                    if($keyword=="null")
                        $keyword="";
                    if($location=="null")
                        $location="";
                    if($identity=="null")
                        $identity="";
                    $sql = "SELECT id,_id,title,location,max_content,max_type FROM  `selisteningme` WHERE `title` LIKE '%$keyword%' AND `location`LIKE '%$location%' AND `secondtag` LIKE '%$identity%'";

                    $read_num="20"; // 設定單頁顯示文章數量
                    $str="select count(*) from ($sql) as subquery;";//計算留言數
                    $list =mysql_query($str);
                    list($disscuss_count) = mysql_fetch_row($list);
                    $all_page=ceil($disscuss_count/$read_num); //抓取頁數
                    echo "<ul class='pagination pull-right'>";
                    for($i=1;$i<=$all_page;$i++){
                        echo "<li><a href='index.php?keyword=$keyword&location=$location&identity=$identity&page_num=$i'> $i </a></li>";
                    }
                    echo "</ul>";

                //------------------------------------------------------------------
                if(empty($_GET['page_num']) ){
                    $page_num=1;
                }
                else {
                    $page_num = $_GET['page_num'];
                }

                $start_num=$read_num*($page_num-1);
                $str="SELECT id,_id,title,location,max_content,max_type FROM  `selisteningme` WHERE `title` LIKE '%$keyword%' AND `location`LIKE '%$location%' AND `secondtag` LIKE '%$identity%' limit $start_num,$read_num ";
                $result = mysql_query($str) or die('MySQL query error');
                
				echo "<div id='result'>";
				echo "<table class='table'>";
				echo "<tr><td>名稱</td><td>地區</td><td>最大金額</td><td>單位</td></tr>";
				// 顯示欄位資訊
				while ( list($id,$_id,$title,$location,$max_content,$max_type) = mysql_fetch_array($result) ) {
					echo "<tr><td><a href='setalbeview.php?id= $id'>" .$title. "</td>";
					echo "<td>" .$location. "</td>";
					echo "<td>" .$max_content. "</td>";
					echo "<td>" .$max_type. "</td></tr>";
				}
				echo "</table></div>";
				mysql_free_result($result); // 釋放佔用的記憶體
			?>
			</div>
		</div>
	</section>
	<?php include 'footer.php'; ?>
	<script type="text/javascript">
	$('#search-by-keyword-btn').click(function(){
		url = 'index.php?keyword=' + $('#keyword').val();
		window.location.href=url;
		return false;
	});
	$('#search-by-category-btn').click(function(){
		url = 'index.php?location=' + $('#loc').val() + '&identity=' + $('#identity').val();
		window.location.href=url;
		return false;
	});
	</script>
</body>
</html>