<div class="right">
        <div class="location">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>您现在的位置：</span>
                <a href="../index.php">首页</a>
                >
                <a href="index.php">后台管理系统</a>
        </div>
        <div class="content">
                <?php
                if ($_POST['submit'] == "检索") {
                    // 查询的表名
                    $tableName = $_POST['infoState'];
                    // 审核状态 检查状态
                    $checkState = $_POST['checkState'];
                    
                    // 搜索的类型
                    $searchType = $_POST['searchType'];


                //     保存点击的选项 重载页面时使用
                    if($tableName == 'tb_freeinfo'){
                        $_SESSION['freeCheckState'] = $checkState;
                    }else if($tableName == 'tb_paidinfo'){
                        $_SESSION['paidCheckState'] = $checkState;
                    }else if($tableName == 'ad-info'){
                        ;
                    }
                    $dbms = 'mysql';
                    $host = 'localhost';
                    $dbName='tb_cityinfo';
                    $user='root';
                    $pass='123456';

                    $dsn="$dbms:dbname=$dbName;host=$host";

                    try {
                        $pdo = new PDO($dsn, $user, $pass);

                        if ($checkState != "%") {
                            $sql = "select * from $tableName where type='$searchType' and checkstate = '$checkState' ";
                        } else {
                            $sql = "select * from $tableName where type='$searchType' ";
                        }

                        $result = $pdo->prepare($sql);
                        $result->execute();

                        $res=$result->fetchAll(PDO::FETCH_ASSOC);
                        echo '<header class="title">当前信息类别是：'.$searchType.'</header>';
                        echo '<table class="table table-striped">';
                        for ($i=0;$i<count($res);$i++) {
                        
                                if ($i==0) {
                                        ?>
                                        <thead align="center">
                                                <tr >
                                                        <th scope="col">信息标题</th>
                                                        <th scope="col">信息内容</th>
                                                        <th scope="col">联系人</th>
                                                        <th scope="col">练习电话</th>
                                                        <th scope="col">发布时间</th>
                                                        <th scope="col">审核状态</th>
                                                        <th scope="col">操作</th>
                                                </tr>
                                        </thead>
                                        <tbody align="center">
                                        <?php
                                }else{
                                        ?>
                                        
                                        <tr>
                                                <th scope="col"><?php echo $res[$i]['title']?></th>
                                                <th scope="col"><?php echo $res[$i]['content']?></th>
                                                <th scope="col"><?php echo $res[$i]['linkman']?></th>
                                                <th scope="col"><?php echo $res[$i]['tel']?></th>
                                                <th scope="col"><?php echo $res[$i]['edate']?></th>
                                                <th scope="col"><?php echo $res[$i]['checkstate']?></th>
                                                <th scope="col">
                                                    <a href="">审核</a>
                                                    <a href="">取审</a>
                                                    <a href="">删除</a>
                                                </th>
                                        </tr>
                                        <?php
                                }
                                
                                
                        }
                        echo ' </tbody></table>';
                        echo count($res);
                        exit;
                    } catch (Exception $e) {
                        die("Error:".$e->getMessage()."<br>");
                    }
                }
                ?>
        </div>
</div>

</main>