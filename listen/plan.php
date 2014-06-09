<?php
	session_start();
	include 'connect.php';
	require('lib/gantti.php'); 
	require('myData.php'); 

	date_default_timezone_set('Asia/Taipei');
	setlocale(LC_ALL, 'zh_TW');

	$gantti = new Gantti($data, array(
	  'title'      => '福利法案',
	  'cellwidth'  => 20,
	  'cellheight' => 40,
	  'today'      => true
	));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>福利請聽</title>
	<?php include 'include.php'; ?>
	<link rel="stylesheet" href="css/screen.css" />
	<link rel="stylesheet" href="css/gantti.css" />
</head>
<body>
	<?php include 'nav.php'; ?>
	<section class="container_12">
		<div class="grid_12 title">
			福利規劃
		</div>
		<div class="grid_12">
			<p>
				圖表顏色說明：
				<li>藍色：一般案件</li>
				<li>黃色：緊急案件</li>
				<li>紅色：重要案件</li>
			</p>
			<?php echo $gantti ?>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>