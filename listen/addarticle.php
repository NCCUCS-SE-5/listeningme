<?php
session_start();
require "connect.php"; 
$DISSCUSS_TBL="disscuss"; // 發表文章用資料庫
$RE_DISSCUSS_TBL="re_disscuss"; // 回覆文章用資料庫
if(empty($_POST["re_serial"])){
	$re_serial= 0;
	}
else{
	$re_serial=$_POST["re_serial"];
	}

if($re_serial){     /* 回覆模式 */
/* 接收表單資料 */
	$re_name=$_SESSION['account_number'];
	$re_email=$_POST["re_email"];
	$re_content=$_POST["re_content"];
	$re_content = ereg_replace("\n", "<br />\n", $re_content); /* 處理資料寫入無換行問題，加入換行字元 */
	$re_title=$_POST["re_title"];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){    /* 存取使用者IP */
		$re_ip=$_SERVER['HTTP_CLIENT_IP'];
		}
	else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$re_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	else{
		$re_ip=$_SERVER['REMOTE_ADDR'];
		}
	$re_ip=$_SERVER["REMOTE_ADDR"];
	$sql="INSERT $RE_DISSCUSS_TBL (re_time,re_serial,re_content,re_name,re_email,re_ip) VALUES (now(),'$re_serial','$re_content','$re_name','$re_email','$re_ip')";
	}
else{  /* 發文模式 */
	/* 接收表單資料 */
	$name=$_SESSION['account_number'];
	$email=$_POST["email"];
	$content=$_POST["content"];
	$content = ereg_replace("\n", "<br />\n", $content);
	$title=$_POST["title"];
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){  /* 存取使用者IP */
			$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
		else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		else{
			$ip=$_SERVER['REMOTE_ADDR'];
			}
	$ip=$_SERVER["REMOTE_ADDR"];
	$sql="INSERT $DISSCUSS_TBL (time,title,content,count,name,email,ip) VALUES (now(),'$title','$content','0','$name','$email','$ip')";
	}
	
mysql_query($sql) or die("Data Insert Failed");
	if($re_serial){
		echo '<meta http-equiv=REFRESH CONTENT=0;url=view.php?serial='.$re_serial.'>';
	}
	else{
		echo '<meta http-equiv=REFRESH CONTENT=0;url=article.php>';
	}
?>
