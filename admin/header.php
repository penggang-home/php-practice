<?php
    session_start();
    if($_SESSION['loginState'] != 'true'){
        ?>
		<script>
			alert("请登录后访问！");
			window.location.href='login.php';
		</script>
		<?php
		exit;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统后台</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- 阿里图标库 -->
    <link rel="stylesheet" href="https://at.alicdn.com/t/font_1925165_kt5qll2386j.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
    <div class="container">
        <header class="row m-0 header">
            <div class="img">
                <img src="../image/menu.png">
            </div>
            <div class="title">
                <span>52同城信息网</span>
                后台管理系统
            </div>
            <div class="menu">
                <button class="btn btn-primary">网站首页</button>
                <button class="btn btn-primary">退出登录</button>
            </div>
        </header>


