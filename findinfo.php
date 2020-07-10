<?php
    include("header.php");
?>

    <!-- 中间内容区域开始 -->
    <div class="main-right">
        <article>
            <div class="paid-content">
                <?php
                    if(isset($_POST['searchContent'])){
                        $_SESSION['searchContent'] = $_POST['searchContent'];
                        $_SESSION['searchType'] = $_POST['searchType'];
                    }

                    if(isset($_SESSION['searchContent'])){
                        $searchContent =  $_SESSION['searchContent'];
                        $searchType = $_SESSION['searchType'];
                        
                        try{
                            $pdo = new PDO($dsn,$user,$pass);

                            $paidTotalNumSql = "select * from tb_paidinfo where concat(title,content,linkman,tel) like '%$searchContent%' and type='$searchType' and checkstate = 1 and sdate < showdate ";

                            $paidTotalNum = $pdo->prepare($paidTotalNumSql);
                            $paidTotalNum->execute();
                                                                                    
                            // 满足条件的总记录数
                            $paidTotalNum = count($paidTotalNum->fetchAll(PDO::FETCH_ASSOC));
                            
                            if($paidTotalNum >= 1){                                        
                                ?>
                                    <p class="mani-title mb-1"><i class="iconfont icon-rect"></i> 付费信息</p>
                                <?php
                                // 付费信息显示条数
                                $paidPageSize = 2;
                                // 算出总页数
                                $paidTotalPage = ceil($paidTotalNum/$paidPageSize);
                                // 获取当前页码 如果当前页存在则使用当前页，否则为1
                                $paidCurrentPage =  isset($_GET['paidpage'])?$_GET['paidpage']:1;
                                // 获取 免费页 的页码
                                $currentPageNum = isset($_GET['freepage'])?$_GET['freepage']:1;
    
                                // 当前页的起始位置
                                $paidStartNum = ($paidCurrentPage -1)*$paidPageSize;
    
                                // 获取当前页的内容 判断类型 是否审核 是否到期
                                $paidSql = "select * from tb_paidinfo where concat(title,content,linkman,tel) like '%$searchContent%' and type='$searchType' and checkstate = 1 and sdate < showdate order by id limit $paidStartNum,$paidPageSize ";
                                $paidResult = $pdo->prepare($paidSql);
                                $paidResult->execute();
    
                                // $currentDate = date("Y-m-d",time());
    
                                while($res = $paidResult->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <div class='mb-2'>
                                            <div>
                                                <span>[<?php echo $res['type']; ?>]</span>
                                                <span><?php echo $res['title'] ?></span>
                                                <span><?php echo $res['edate'] ?></span>
                                            </div>
                                            <!-- echo mb_substr('这个真的很nice',0,3,'utf-8'); //这个真 -->
                                            <!-- echo mb_strlen('中文a字1符',‘UTF8‘); //6   -->
                                            <!-- number_format（）用于将字符串转换为数字 -->
                                            <div><?php echo mb_substr($res['content'],0,92,'utf-8'); if(number_format(mb_strlen($res['content'])>92)){echo '...';} ?></div>
                                            <p>联系人：<?php echo $res['linkman']?> 联系电话：<?php echo $res['tel']?> </p>
                                        </div>
                                        <?php
                                }
                            }
                            
                        } catch (Exception $e){
                            die("Error:".$e->getMessage()."<br>");
                        }
                    }
                ?>
            </div>
            <?php
                if($paidTotalNum >2){
                    ?>
                    <nav class='page' aria-label="...">
                        <ul class="pagination">
                            <li class="page-item <?php if($paidCurrentPage == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?paidpage=1&<?php echo 'freepage='.$currentPageNum?>">首页</a>
                            </li>
                            <li class="page-item <?php if($paidCurrentPage == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?paidpage=<?php echo $paidCurrentPage-1 ?>&<?php echo 'freepage='.$currentPageNum?>">上一页</a>
                            </li>
                            <?php
                                for($i=1;$i<=$paidTotalPage;$i++){
                                    ?>  
                                        <li class="page-item <?php if($i == $paidCurrentPage){echo 'active';}?>">
                                            <a class="page-link" href="findinfo.php?paidpage=<?php echo $i ?>&<?php echo 'freepage='.$currentPageNum?>"> 
                                                <?php echo $i ?>
                                            </a>
                                        </li>
                                        
                                    <?php
                                }
                            ?>
                            <li class="page-item <?php if($paidCurrentPage == $paidTotalPage){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?paidpage=<?php echo $paidCurrentPage+1 ?>&<?php echo 'freepage='.$currentPageNum?>">下一页</a>
                            </li>
                            <li class="page-item <?php if($paidCurrentPage == $paidTotalPage){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?paidpage=<?php echo $paidTotalPage ?>&<?php echo 'freepage='.$currentPageNum?>">尾页</a>
                            </li>
                        </ul>
                    </nav>
                    <?php
                }
            ?>
        </article>
        <!-- 付费区结束 -->

        <!-- 免费区开始 -->
        <article class='pt-2'>
            <div class="free-content">
                <?php
                    if(isset($_SESSION['searchContent'])){
                        try{
                            $pdo = new PDO($dsn,$user,$pass);

                            $pageSql = "select * from tb_freeinfo where concat(title,content,linkman,tel) like '%$searchContent%' and type='$searchType' and checkstate = 1";
    
                            $page = $pdo->prepare($pageSql);
                            $page->execute();
            
                            // 总记录数
                            $totalNum = count($page->fetchAll(PDO::FETCH_ASSOC));
                            if($totalNum >= 1 ){

                                // 页面大小
                                $pageSize = 3;
                                // 总页数 ceil向上取整
                                $pageCountNum = ceil($totalNum / $pageSize);
                                // 获取传递的当前页码 三元运算符
                                $currentPageNum = isset($_GET['freepage'])?$_GET['freepage']:1;
                                // 求当前页的起始位置
                                $startPageNum=($currentPageNum -1)*$pageSize;
        
                                // 获取付费页的页码
                                $paidCurrentPage =  isset($_GET['paidpage'])?$_GET['paidpage']:1;
        
                                // 获取当前页的内容
                                $sql = "select * from tb_freeinfo where concat(title,content,linkman,tel) like '%$searchContent%' and type='$searchType' and checkstate = 1  limit $startPageNum,$pageSize ";
        
                                $result = $pdo->prepare($sql);
                                $result->execute();
                                
                                ?>
                                    <p class="mani-title mb-1"><i class="iconfont icon-rect"></i> 免费专区</p>
                                <?php
                                while($res = $result->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                        <div class='mb-2'>
                                            <div>
                                                <span>[<?php echo $res['type']; ?>]</span>
                                                <span><?php echo str_replace($searchContent,"<span style='font:size:25px;color:red'>$searchContent<span>",$res['title']) ?></span>
                                                <span><?php echo $res['sdate'] ?></span>
                                            </div>
                                            <!-- echo mb_substr('这个真的很nice',0,3,'utf-8'); //这个真 -->
                                            <!-- echo mb_strlen('中文a字1符',‘UTF8‘); //6   -->
                                            <!-- number_format（）函数用于将字符串转换为数字。-->
                                            <div><?php echo mb_substr($res['content'],0,92,'utf-8'); if(number_format(mb_strlen($res['content'])>92)){echo '...';} ?></div>
                                            <p>联系人：<?php echo $res['linkman']?> 联系电话：<?php echo $res['tel']?> </p>
                                        </div>
                                    <?php
                                }
                            }
                            
                        } catch (Exception $e){
                            die("Error:".$e->getMessage()."<br>");
                        }
                    }
                ?>
            </div>
            <?php
                if($totalNum >3){
                    ?>
                    <nav class='page' aria-label="...">
                        <ul class="pagination">
                            <li class="page-item <?php if($currentPageNum == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?freepage=1&<?php echo 'paidpage='.$paidCurrentPage?>">首页</a>
                            </li>
                            <li class="page-item <?php if($currentPageNum == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?freepage=<?php echo $currentPageNum-1 ?>&<?php echo 'paidpage='.$paidCurrentPage?>">上一页</a>
                            </li>
                            <?php
                                for($i=1;$i<=$pageCountNum;$i++){
                                    ?>  
                                        <li class="page-item <?php if($i == $currentPageNum){echo 'active';}?>">
                                            <a class="page-link" href="findinfo.php?freepage=<?php echo $i ?>&<?php echo 'paidpage='.$paidCurrentPage?>"> 
                                                <?php echo $i?>
                                            </a>
                                        </li>
                                    <?php
                                }
                            ?>
                            <li class="page-item <?php if($currentPageNum == $pageCountNum){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?freepage=<?php echo $currentPageNum+1 ?>&<?php echo 'paidpage='.$paidCurrentPage?>">下一页</a>
                            </li>
                            <li class="page-item <?php if($currentPageNum == $pageCountNum){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?freepage=<?php echo $pageCountNum ?>&<?php echo 'paidpage='.$paidCurrentPage?>">尾页</a>
                            </li>
                        </ul>
                    </nav>
                    <?
                }
            ?>
        </article>
        <!-- 免费区结束 -->
    </div>
    <!-- 中间内容区域结束 -->

<?php
    include("footer.php");
?>