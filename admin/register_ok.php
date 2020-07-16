<?php
    session_start();
    // 若变量存在且值不为NULL，则返回TURE
    if ($_POST['username'] != '' and $_POST['password'] != '') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbms = 'mysql';
        $host = 'localhost';
        $dbName='tb_cityinfo';
        $user='root';
        $pass='123456';

        $dsn = "$dbms:dbname=$dbName;host=$host";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $sql = "select * from tb_admin where name='$username' ";
            
            // echo $sql;
            // exit;
            $result = $pdo->prepare($sql);
            $result->execute();

            $usernameNum = count($result->fetchAll(PDO::FETCH_ASSOC));
    
            if ($usernameNum >0) {
                ?>
                <script>
                    alert('注册失败，用户名已存在！');
                    window.location.href='register.php';
                </script>
                <?php
                exit;
            } else {
                $sql = "insert into tb_admin(name,pwd)values('$username','$password')";

                $result=$pdo->prepare($sql);
                $result->execute();
                $code=$result->errorCode();

                if ($code == '00000') {
                    ?>
                        <script>
                            alert("恭喜，注册成功！");
                            window.location.href='login.php';
                        </script>
                    <?php
                } else {
                    echo "数据库错误<br/>";
                    echo "SQL Query：".$query;
                    echo '<pre>';
                    echo("Error：".$result->errorInfo()[2]);
                    echo '</pre>';
                }
            }
            exit;
        } catch (Exception $e) {
            die("Error:".$e->getMessage()."<br>");
        }
    } else {
        ?>
		<script>
			alert("请输入用户名或密码！");
			window.location.href='login.php';
		</script>
		<?php
        exit;
    }
?>