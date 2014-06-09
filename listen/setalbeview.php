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
				$selisteningme_TBL="selisteningme"; 
				$id = $_GET["id"];
				$str="select title, content, firsttag from $selisteningme_TBL where id='$id'";
				$list =mysql_query($str);
				list($title,$content,$firsttag) = mysql_fetch_row($list);
				$content=nl2br($content);

			?>

		<table class="table">
			<tr><td><?php echo $title; ?></td></tr>
			<tr><td><?php echo $content;?></a></td></tr>
			<tr><td> 本福利法條所包含的tags : ["<?php echo $firsttag;?>"]</a></td></tr>
		</table>
		</div>
	</section>
	<?php include 'footer.php'; ?>
</body>
</html>