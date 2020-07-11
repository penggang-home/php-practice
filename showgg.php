<?php
	if(!isset($_GET['id'])){
		?>
		<script>
			alert("非法访问");
			window.location.href='index.php';
			// window.history.go(-1);
		</script>
		<?php
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>广告信息</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="showgg-body">
	<div class="container rounded-lg">
		<div class="all">
			<?php
				if(isset($_GET['id'])){
					$dbms = 'mysql';
					$host = 'localhost';
					$dbName='tb_cityinfo';
					$user='root';
					$pass='123456';

					$dsn="$dbms:dbname=$dbName;host=$host";

					try{
						$pdo = new PDO($dsn,$user,$pass);

						$id = $_GET['id'];
						$sql = "select * from tb_advertsing where id=$id";

						$result = $pdo->prepare($sql);
						$result->execute();

						while($res = $result->fetch(PDO::FETCH_ASSOC)){
							?>
							<div class="ad-info">
								<div class="ad-info-left">
									<div>广告主题：</div>
									<div><?php echo $res['title'] ?></div>
								</div>
								<div class="ad-info-right">
									<div>发布时间：</div>
									<div><?php echo $res['fdate'] ?></div>
								</div>
							</div>
							<div class="ad-content">
								<div>广告内容：</div>
								<div><?php echo $res['content'] ?></div>
							</div>
							<?php   
						}
					} catch (Exception $e){
						die("Error:".$e->getMessage()."<br>");
					}
				}
			?>
		</div>
	</div>
</body>

</html>