<?php
	include("connect.php");
	/* 接收表單資料 */
	$name=$_POST["name"];
	$mail=$_POST["mail"];
	$subject=$_POST["subject"];
	$content=$_POST["content"];
	/* 將欄位資料加入資料庫 */
	$sql="INSERT guestbook (name,mail,subject,content,putdate)
	VALUES ('$name','$mail','$subject','$content',now())";
	mysql_query($sql);
	echo "<meta http-equiv=REFRESH CONTENT=0;url=message.php>";
?>