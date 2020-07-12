<?php
    session_start();
    // 若变量存在且值不为NULL，则返回TURE
    if($_POST['username'] != '' and $_POST['password'] != '' ){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbms = 'mysql';
        $host = 'localhost';
        $dbName='tb_cityinfo';
        $user='root';
        $pass='123456';

        $dsn = "$dbms:dbname=$dbName;host=$host";

        try {
            $pdo = new PDO($dsn,$user,$pass);
            $sql = "select * from tb_admin ";
            
            $result = $pdo->prepare($sql);
            $result->execute();
            
            $usernameState = true;
            while($res = $result->fetch(PDO::FETCH_ASSOC)){
                if($res['name'] == $username and $res['pwd'] == $password){
                    $_SESSION['loginState'] = 'true';
                    ?>
                    <script>
                        alert("登录成功！");
                        window.location.href='index.php';
                    </script>
                    <?php
                    exit;
                }else if($res['name'] == $username and $res['pwd'] != $password){
                    ?>
                    <script>
                        alert("登录失败，密码错误！");
                        window.location.href='login.php';
                    </script>
                    <?php
                    exit;
                }else if($res['name'] == $username){
                    $usernameState = false;
                }
            }

            if($usernameState){
                ?>
                <script>
                    alert("不存在的用户名！");
                    window.location.href='login.php';
                </script>
                <?php
            }


        } catch (Exception $e){
            die("Error:".$e->getMessage()."<br>");
        }


    }else{
        ?>
		<script>
			alert("请输入用户名或密码！");
			window.location.href='login.php';
		</script>
		<?php
		exit;
    }
?>