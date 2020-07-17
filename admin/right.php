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

            if ($_SESSION['submitState']) {
                // SESSION 的赋值部分放到头部去了，因为默认选中单选按钮要用

                // 表名
                $tableName = $_SESSION['tableName'];
                // 审核状态 检查状态
                $checkState = $_SESSION['checkState'];
                // 搜索的类型
                $searchType = $_SESSION['searchType'];

                try {
                    $pdo = new PDO($dsn, $user, $pass);

                    // 免费与付费表 指定类型
                    if($searchType != "%" && $tableName != 'tb_advertsing'){
                        if ($checkState != "%") {
                            $sql = "select * from $tableName where type='$searchType' and checkstate = '$checkState' ";
                        } else if($checkState == "%") {
                            $sql = "select * from $tableName where type='$searchType' ";
                        }
                    // 免费与付费表 所有类型
                    }else{

                        if ($checkState != "%" && $tableName != 'tb_advertsing') {
                            $sql = "select * from $tableName where  checkstate = '$checkState' ";
                        } else if($checkState == "%" && $tableName != 'tb_advertsing') {
                            $sql = "select * from $tableName";
                        }
                    }
                    // 广告表
                    if($tableName == "tb_advertsing"){
                        if ($checkState != "%") {
                            $sql = "select * from $tableName where flag = '$checkState' ";
                        } else if($checkState == "%") {
                            $sql = "select * from $tableName";
                        }
                    }

                    $result = $pdo->prepare($sql);
                    $result->execute();
                    $allRes=$result->fetchAll(PDO::FETCH_ASSOC);
                    // 分页开始

                    // 每页显示多少条信息
                    $pageSize = 5;
                    // 总记录数
                    $totalNum = count($allRes);
                    // 页码
                    $totalPage =ceil($totalNum/$pageSize);
                    // 当前页码 如果存在则使用当前页码，没有则是 1
                    $currentPageNum = isset($_GET['pageNum'])?intval($_GET['pageNum']):1;
                    // 起始页
                    $startNum = ($currentPageNum -1 ) * $pageSize;


                    // 指定类型
                    if($searchType != "%"){
                        if ($checkState != "%") {
                            $sql = "select * from $tableName where type='$searchType' and checkstate = '$checkState' limit $startNum,$pageSize";
                        } else if($checkState == "%") {
                            $sql = "select * from $tableName where type='$searchType' limit $startNum,$pageSize";
                        }
                    // 所有类型
                    }else{
                        if ($checkState != "%") {
                            $sql = "select * from $tableName where  checkstate = '$checkState' limit $startNum,$pageSize";
                        } else if($checkState == "%") {
                            $sql = "select * from $tableName limit $startNum,$pageSize";
                        }
                    }

                    // 广告表
                    if($tableName == "tb_advertsing"){
                        if ($checkState != "%") {
                            $sql = "select * from $tableName where flag = '$checkState' limit $startNum,$pageSize";
                        } else if($checkState == "%") {
                            $sql = "select * from $tableName limit $startNum,$pageSize";
                        }
                    }

                    $result = $pdo->prepare($sql);
                    $result->execute();
                    $res=$result->fetchAll(PDO::FETCH_ASSOC);

                    ?>
                        <header class="title">当前信息类别是：
                            <span style="color:#27ae60;font-weight:bold">
                                <?php
                                    if($searchType == "%"){
                                        echo "所有类型";
                                    }else{
                                        echo $searchType;
                                    }
                                ?>
                            </span>
                        </header>
                    <?php
                                        
                    echo '<table class="table table-striped">';
                    for ($i=0;$i<count($res);$i++) {
                        // 判断是否是第一次输出 如果是则输出标题和当前行内容
                        if ($i==0) {
                            ?>
                            <thead align="center">
                                <tr >
                                    <?php
                                        // 免费信息
                                        if($tableName == "tb_freeinfo"){
                                            ?>
                                            <th scope="col">信息标题</th>
                                            <th scope="col">信息内容</th>
                                            <th scope="col">联系人</th>
                                            <th scope="col">联系电话</th>
                                            <th scope="col">发布时间</th>
                                            <th scope="col">审核状态</th>
                                            <th scope="col">操作</th>
                                            <?php
                                        // 付费信息
                                        }else if($tableName == "tb_paidinfo"){
                                            ?>
                                            <th scope="col">信息标题</th>
                                            <th scope="col">信息内容</th>
                                            <th scope="col">联系人</th>
                                            <th scope="col">联系电话</th>
                                            <th scope="col">发布日期</th>
                                            <th scope="col">截止日期</th>
                                            <th scope="col">审核状态</th>
                                            <th scope="col">操作</th>
                                            <?php
                                        // 广告信息
                                        }else{
                                            ?>
                                            <th scope="col">广告标题</th>
                                            <th scope="col">广告内容</th>
                                            <th scope="col">发布时间</th>
                                            <th scope="col">是否推荐</th>
                                            <th scope="col">操作</th>
                                            <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody align="center">
                            <?php
                        }
                        ?>
                        <tr>
                            <?php
                                // 免费信息
                                if($tableName == "tb_freeinfo"){
                                    ?>
                                    <th scope="col"><?php echo $res[$i]['title']?></th>
                                    <th scope="col"><?php echo $res[$i]['content']?></th>
                                    <th scope="col"><?php echo $res[$i]['linkman']?></th>
                                    <th scope="col"><?php echo $res[$i]['tel']?></th>
                                    <th scope="col"><?php echo $res[$i]['edate']?></th>
                                    <?php
                                // 付费信息
                                }else if($tableName == "tb_paidinfo"){
                                    ?>
                                    <th scope="col"><?php echo $res[$i]['title']?></th>
                                    <th scope="col"><?php echo $res[$i]['content']?></th>
                                    <th scope="col"><?php echo $res[$i]['linkman']?></th>
                                    <th scope="col"><?php echo $res[$i]['tel']?></th>
                                    <th scope="col"><?php echo $res[$i]['sdate']?></th>
                                    <th scope="col"><?php echo $res[$i]['showdate']?></th>
                                    <?php
                                // 广告信息
                                }else{
                                    ?>
                                    <th scope="col"><?php echo $res[$i]['title']?></th>
                                    <th scope="col"><?php echo $res[$i]['content']?></th>
                                    <th scope="col"><?php echo $res[$i]['fdate']?></th>
                                    <?php
                                }
                            ?>

                            <?php
                                // 免费信息
                                if($tableName == "tb_freeinfo"){
                                    if($res[$i]['checkstate'] == 1){
                                        echo "<th scope='col' style='color:#27ae60'>已审核</th>";
                                    }else{
                                        echo "<th scope='col' style='color:#e74c3c'>未审核</th>";
                                    }
                                // 付费信息
                                }else if($tableName == "tb_paidinfo"){
                                    if($res[$i]['checkstate'] == 1){
                                        echo "<th scope='col' style='color:#27ae60'>已付费</th>";
                                    }else{
                                        echo "<th scope='col' style='color:#e74c3c'>未付费</th>";
                                    }
                                // 广告信息
                                }else{
                                    if($res[$i]['flag'] == 1){
                                        echo "<th scope='col' style='color:#27ae60'>已推荐</th>";
                                    }else{
                                        echo "<th scope='col' style='color:#e74c3c'>未推荐</th>";
                                    }
                                }

                            ?>
                            <th scope="col">
                                <?php
                                    if($res[$i]['checkstate'] == 1 or $res[$i]['flag'] ==1){
                                        ?>
                                        <a href="index.php?disable=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>&pageNum=<?php echo $currentPageNum?> ">
                                            <?php
                                                // 免费信息
                                                if($tableName == "tb_freeinfo"){
                                                    echo "取审";
                                                // 付费信息
                                                }else if($tableName == "tb_paidinfo"){
                                                    echo "取消付费";
                                                // 广告信息
                                                }else{
                                                    echo "取消推荐";
                                                }
                                            ?>
                                        </a>
                                        <?php
                                    }else{
                                        ?>
                                        <a href="index.php?enable=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>&pageNum=<?php echo $currentPageNum?>">
                                            <?php
                                                // 免费信息
                                                if($tableName == "tb_freeinfo"){
                                                    echo "审核";
                                                // 付费信息
                                                }else if($tableName == "tb_paidinfo"){
                                                    echo "付费";
                                                // 广告信息
                                                }else{
                                                    echo "推荐";
                                                }
                                            ?>
                                        </a>
                                        <?php
                                    }
                                    // 删除按钮
                                    ?>
                                        <a style='color:#e74c3c' href="javascript:deleteInfo('<?php echo $res[$i]['title']?>','index.php?delete=<?php echo $res[$i]['id'] ?>&tableName=<?php echo $tableName ?>&pageNum=<?php echo $currentPageNum?>','<?php echo $res[$i]['checkstate']?>')">删除</a>
                                    <?php
                                ?>
                            </th>
                        </tr>
                        <?php
                    }
                    echo ' </tbody></table>';
                    ?>
                    
                    <?php 
                        // 只有当大于1页时才显示 翻页按钮
                        if($totalPage >1){
                            ?>
                            <nav class='w-100' aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item <?php if($currentPageNum == 1){echo 'disabled';}?>">
                                        <a class="page-link" href="index.php?pageNum=<?php echo 1 ?>">首页</a>
                                    </li>
                                    <li class="page-item <?php if($currentPageNum == 1){echo 'disabled';}?>">
                                        <a class="page-link" href="index.php?pageNum=<?php echo $currentPageNum-1 ?>">上一页</a>
                                    </li>
                                    <?php
                                        for($i=1;$i<$totalPage+1;$i++){
                                            ?>
                                            <li class="page-item <?php if($currentPageNum == $i){echo 'active';} ?> ">
                                                <a class="page-link" href="index.php?pageNum=<?php echo $i ?>"><?php echo $i ?></a>
                                            </li>
                                            <?
                                        }
                                    ?>
                                    <li class="page-item <?php if($currentPageNum == $totalPage){ echo 'disabled';}?>">
                                        <a class="page-link" href="index.php?pageNum=<?php echo $currentPageNum+1 ?>">下一页</a>
                                    </li>
                                    <li class="page-item <?php if($currentPageNum == $totalPage){ echo 'disabled';}?>">
                                        <a class="page-link" href="index.php?pageNum=<?php echo $totalPage ?>">尾页</a>
                                    </li>
                                </ul>
                            </nav>
                            <?php
                        }

                        // 当一条信息都没有时
                        if(count($allRes) == 0){
                            ?>
                                <div id='no-content'>
                                    对不起，没有您要查找的记录!
                                </div>
                            <?php
                        }
                    ?>

                    <?php
                } catch (Exception $e) {
                    die("Error:".$e->getMessage()."<br>");
                }
            }
            ?>
    </div>
</div>
</main>