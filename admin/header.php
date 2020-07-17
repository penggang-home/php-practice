<?php
    session_start();
    // 判断是否登录

    // PDO
    $dbms = 'mysql';
    $host = 'localhost';
    $dbName='tb_cityinfo';
    $user='root';
    $pass='123456';

    $dsn="$dbms:dbname=$dbName;host=$host";

    if($_SESSION['loginState'] != 'true'){
        ?>
		<script>
			alert("请登录后访问！");
			window.location.href='login.php';
		</script>
		<?php
		exit;
    }

    if($_GET['enable'] != '' || $_GET['disable'] != '' ){
        $updateTableName = $_GET['tableName'];
        $updatePDO = new PDO($dsn, $user, $pass);

        // 审核通过
        if($_GET['enable'] != ''){
            $id = $_GET['enable'];
            $checkstate = 1;
        }
        // 取消审核
        if($_GET['disable'] != ''){
            $id = $_GET['disable'];
            $checkstate = 0;
        }

        try {
            $updateSql = "update $updateTableName set checkstate=$checkstate where id=$id";

            // exec 执行后返回受影响的行数
            $updateResult = $updatePDO->exec($updateSql);
            if($updateResult > 0){
                if($_GET['enable'] != ''){
                    ?>
                    <script>
                        alert("该信息已审核通过!");
                    </script>
                    <?    
                }else{
                    ?>
                    <script>
                        alert("该信息已取消审核!");
                    </script>
                    <?
                }
            }

        } catch (Exception $e) {
            die("Error:".$e->getMessage()."<br>");
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统后台</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- 阿里图标库 -->
    <link rel="stylesheet" href="https://at.alicdn.com/t/font_1925165_xn2bhv6np7.css">
    <!-- Font-Awesome 字体图标库 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
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
                <form action="signout.php" method='POST'>
                    <a href="../index.php"><input type='button' class="btn btn-primary" value='网站首页'></a>
                    <input type='submit' class="btn btn-danger" name='signout' value='退出登录'>
                </form>
        </div>
        </header>


