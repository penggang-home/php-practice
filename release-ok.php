<?php
    if($_POST['releaseSubmit'] == '发布信息'){
        $type = $_POST['releaseSelect'];
        $title = $_POST['releaseTitle'];
        $content = $_POST['releaseTextarea'];
        $linkman = $_POST['releasePerson'];
        $tel = $_POST['releaseTel'];
        // 年份减一
        // $sdate =  date('Y-m-d h:i:s',strtotime("-1 year")); 
        $edate =  date('Y-m-d h:i:s',time()); 

        $dbms = 'mysql';
        $host = 'localhost';
        $dbName='tb_cityinfo';
        $user='root';
        $pass='123456';

        $dsn = "$dbms:dbname=$dbName;host=$host";

        $pdo = new PDO($dsn,$user,$pass);
        $query ="insert into tb_freeinfo(type,title,content,linkman,tel,edate)values('$type','$title','$content','$linkman','$tel','$edate')";
        $result=$pdo->prepare($query);
        $result->execute();

        $code=$result->errorCode();

        if($code == '00000'){
            ?>
                <script>
                    alert("恭喜，发布成功！");
                    window.location.href='index.php';
                </script>
            <?php
            

        }else{
            echo "数据库错误<br/>";
            echo "SQL Query：".$query;
            echo '<pre>';
            echo ("Error：".$result->errorInfo()[2]);
            echo '</pre>';
        }
    }
?>