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

            if($_POST['submit'] == "检索"){
                $_SESSION['submitState'] = true; 
                // 查询的表名
                $_SESSION['tableName'] = $_POST['infoState'];
                // 审核状态 检查状态
                $_SESSION['checkState'] = $_POST['checkState'];
                // 搜索的类型
                $_SESSION['searchType'] = $_POST['searchType'];
            }
            if ($_SESSION['submitState']) {
                // 查询的表名
                $tableName = $_SESSION['tableName'];
                // 审核状态 检查状态
                $checkState = $_SESSION['checkState'];
                // 搜索的类型
                $searchType = $_SESSION['searchType'];


            //     保存点击的选项 重载页面时使用
                if($tableName == 'tb_freeinfo'){
                    $_SESSION['freeCheckState'] = $checkState;
                }else if($tableName == 'tb_paidinfo'){
                    $_SESSION['paidCheckState'] = $checkState;
                }else if($tableName == 'ad-info'){
                    ;
                }

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
                            <tr>
                                <th scope="col"><?php echo $res[$i]['title']?></th>
                                <th scope="col"><?php echo $res[$i]['content']?></th>
                                <th scope="col"><?php echo $res[$i]['linkman']?></th>
                                <th scope="col"><?php echo $res[$i]['tel']?></th>
                                <th scope="col"><?php echo $res[$i]['edate']?></th>
                                <th scope="col">
                                    <?php
                                        if($res[$i]['checkstate'] == 1){
                                            echo "已审核";
                                        }else{
                                            echo "未审核";
                                        }
                                    ?>
                                </th>
                                <th scope="col">
                                    <?php
                                        if($res[$i]['checkstate'] == 1 ){
                                            ?>
                                            <a href="index.php?disable=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?> ">取审</a>
                                            <a href="index.php?delete=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>">删除</a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="index.php?enable=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>">审核</a>
                                            <a href="index.php?delete=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>">删除</a>
                                            <?php
                                        }
                                    ?>
                                </th>
                            </tr>
                            <?php
                        }else{
                            ?>
                            <tr>
                                <th scope="col"><?php echo $res[$i]['title']?></th>
                                <th scope="col"><?php echo $res[$i]['content']?></th>
                                <th scope="col"><?php echo $res[$i]['linkman']?></th>
                                <th scope="col"><?php echo $res[$i]['tel']?></th>
                                <th scope="col"><?php echo $res[$i]['edate']?></th>
                                <th scope="col">
                                    <?php
                                        if($res[$i]['checkstate'] == 1){
                                            echo "已审核";
                                        }else{
                                            echo "未审核";
                                        }
                                    ?>
                                </th>
                                <th scope="col">
                                    <?php
                                        if($res[$i]['checkstate'] == 1 ){
                                            ?>
                                            <a href="index.php?disable=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?> ">取审</a>
                                            <a href="index.php?delete=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>">删除</a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="index.php?enable=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>">审核</a>
                                            <a href="index.php?delete=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>">删除</a>
                                            <?php
                                        }
                                    ?>
                                </th>
                            </tr>
                            <?php
                        }
                    }
                    echo ' </tbody></table>';
                    echo count($res);
                } catch (Exception $e) {
                    die("Error:".$e->getMessage()."<br>");
                }
            }
            ?>
    </div>
</div>
</main>