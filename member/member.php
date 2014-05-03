<?php
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">登出</a>  <br><br>';

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if ($_SESSION['account_number'] != null) {
    echo '<a href="register.php">新增帳號</a>    ';
    echo '<a href="update.php">修改資料</a>    ';
    echo '<a href="delete.php">刪除資料</a>  <br><br>';
    
    //將資料庫裡的所有會員資料顯示在畫面上
    $sql    = "SELECT * FROM member_table";
    $result = mysql_query($sql)or die('MySQL query error');
	echo "<table border=1>";
	echo "<tr><td>編號</td><td>帳號</td><td>姓名</td><td>性別</td><td>生日</td><td>電話</td><td>手機</td><td>地址</td><td>E-mail</td><td>職業</td><td>備註</td>";
	// 顯示欄位資訊
	while ( $row = mysql_fetch_array($result) ) {
	echo "<tr><td align=center>" .$row[0]. "</td>";
	echo "<td>" .$row[1]. "</td>"; 
	echo "<td>" .$row[3]. "</td>";
	echo "<td>" .$row[4]. "</td>";
	echo "<td>" .$row[5]. "</td>";
	echo "<td>" .$row[6]. "</td>";
	echo "<td>" .$row[7]. "</td>";
	echo "<td>" .$row[8]. "</td>";
	echo "<td>" .$row[9]. "</td>";
	echo "<td>" .$row[10]. "</td>";
	echo "<td>" .$row[11]. "</td></tr>";
	}
	echo "</table>";
} else {
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>