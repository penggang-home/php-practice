<?php
    include("header.php");
?>

    <!-- 中间内容区域开始 -->
    <div class="main-right col-sm-8">
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

                            $paidTotalNumSql = "select * from tb_paidinfo where concat(type,title,content,linkman,tel,sdate) like '%$searchContent%' and type like '$searchType' and checkstate = 1 and sdate < showdate ";

                            $paidTotalNum = $pdo->prepare($paidTotalNumSql);
                            $paidTotalNum->execute();
                                                                                    
                            // 满足条件的总记录数
                            $paidTotalNum = count($paidTotalNum->fetchAll(PDO::FETCH_ASSOC));
                            
                            if($paidTotalNum >= 1){                                        
                                ?>
                                    <p class="mani-title mb-1" style='background-color:#F6F6F6;'><i class="iconfont pl-2 icon-zheng-triangle"></i> 付费信息</p>
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
                                $paidSql = "select type,title,left(content,152) as splitContent,linkman,tel,sdate from tb_paidinfo where concat(type,title,content,linkman,tel) like '%$searchContent%' and type like '$searchType' and checkstate = 1 and sdate < showdate order by id limit $paidStartNum,$paidPageSize ";
                                $paidResult = $pdo->prepare($paidSql);
                                $paidResult->execute();
    
                                // $currentDate = date("Y-m-d",time());
    
                                while($res = $paidResult->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <div class='mb-2'>
                                            <div>
                                                <span>[<?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['type']) ?>]</span>
                                                <!-- <span> <?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['type']) ?> </span> -->
                                                <span><?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['title']) ?></span>
                                                <span><?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['sdate']) ?></span>
                                            </div>
                                            <!-- echo mb_substr('这个真的很nice',0,3,'utf-8'); //这个真 -->
                                            <!-- echo mb_strlen('中文a字1符',‘UTF8‘); //6   -->
                                            <!-- number_format（）函数用于将字符串转换为数字。-->
                                            <div style='text-indent:2em;'>
                                                <?php 
                                                    echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['splitContent']);
                                                    if(number_format(mb_strlen($res['content'])>=152)){echo '...';} 
                                                ?>
                                            </div>
                                            <p>
                                                联系人：<?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['linkman']);?> 
                                                联系电话：<?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['tel']);?> 
                                            </p>
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
                        <ul class="pagination mb-0">
                            <li class="page-item <?php if($paidCurrentPage == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?paidpage=1&<?php echo 'freepage='.$currentPageNum?>">首页</a>
                            </li>
                            <li class="page-item <?php if($paidCurrentPage == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?paidpage=<?php echo $paidCurrentPage-1 ?>&<?php echo 'freepage='.$currentPageNum?>">上一页</a>
                            </li>
                            <?php
                                $paidEnd = 5;
                                $paidStart = 1;
                                
                                if($_GET['paidpage'] - 3 > 0){
                                    if($paidTotalPage - $_GET['paidpage'] <= 2 ){
                                        $paidStart = $paidTotalPage - 4;
                                        $paidEnd = $paidTotalPage;
                                    }else{
                                        $paidStart = $_GET['paidpage'] - 2;
                                        $paidEnd = $_GET['paidpage'] + 2;
                                    }
                                    
                                }

                                for($i=$paidStart;$i<=$paidTotalPage;$i++){
                                    if($i <= $paidEnd){
                                        ?>
                                        <li class="page-item <?php if($i == $paidCurrentPage){echo 'active';}?>">
                                            <a class="page-link" href="findinfo.php?paidpage=<?php echo $i ?>&<?php echo 'freepage='.$currentPageNum?>"> 
                                                <?php echo $i ?>
                                            </a>
                                        </li>
                                        <?php
                                    }else{
                                        if($paidTotalPage - $_GET['paidpage'] > 2){
                                            ?>  
                                            <li class="page-item ">
                                                <span class="page-link">...</span>
                                            </li>
                                            <li class="page-item <?php if($i == $currentPageNum){echo 'active';}?>">
                                                <a class="page-link" href="findinfo.php?freepage=<?php echo $currentPageNum ?>&<?php echo 'paidpage='.$paidTotalPage?>"> 
                                                    <?php echo $paidTotalPage?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        break;
                                    }

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

                            $pageSql = "select * from tb_freeinfo where concat(type,title,content,linkman,tel) like '%$searchContent%' and type like '$searchType' and checkstate = 1";
    
                            $page = $pdo->prepare($pageSql);
                            $page->execute();
            
                            // 总记录数
                            $totalNum = count($page->fetchAll(PDO::FETCH_ASSOC));

                            if($paidTotalNum == 0 && $totalNum == 0){
                                ?>
                                    <p class="mani-title mb-1" style='justify-content: center;align-items: center;height: 40vh;display: flex;font-weight:bold;'>对不起，没有您要查询的信息。</p>
                                <?php
                            }
                            if($totalNum >= 1 ){
                                ?>
                                    <p class="mani-title mb-1 rounded-lg" style='background-color:#F6F6F6;'><i class="iconfont pl-2 icon-zheng-triangle"></i> <span>免费信息</span></p>
                                <?php
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
                                $sql = "select type,title,left(content,152) as splitContent,linkman,tel,edate from tb_freeinfo where concat(type,title,content,linkman,tel,edate) like '%$searchContent%' and type like '$searchType' and checkstate = 1  limit $startPageNum,$pageSize ";
                                $result = $pdo->prepare($sql);  
                                $result->execute();

                                while($res = $result->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                                        <div class='mb-2'>
                                            <div>
                                                <span>[<?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['type']) ?>]</span>
                                                <span><?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['title']) ?></span>
                                                <span><?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['edate']) ?></span>
                                            </div>
                                            <!-- echo mb_substr('这个真的很nice',0,3,'utf-8'); //这个真 -->
                                            <!-- echo mb_strlen('中文a字1符',‘UTF8‘); //6   -->
                                            <!-- number_format（）函数用于将字符串转换为数字。-->
                                            <div style='text-indent:2em;'>
                                                <?php 
                                                    echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['splitContent']);
                                                    if(number_format(mb_strlen($res['content'])>=152)){echo '...';} 
                                                ?>
                                            </div>
                                            <p>
                                                联系人：<?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['linkman']);?> 
                                                联系电话：<?php echo str_replace($searchContent,"<span style='font-weight:bold;color:red'>$searchContent</span>",$res['tel']);?> 
                                            </p>
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
                        <ul class="pagination mb-1">
                            <li class="page-item <?php if($currentPageNum == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?freepage=1&<?php echo 'paidpage='.$paidCurrentPage?>">首页</a>
                            </li>
                            <li class="page-item <?php if($currentPageNum == 1){echo 'disabled';}?>">
                                <a class="page-link" href="findinfo.php?freepage=<?php echo $currentPageNum-1 ?>&<?php echo 'paidpage='.$paidCurrentPage?>">上一页</a>
                            </li>
                            <?php
                                $pageNumber = 5;
                                $start = 1;

                                // 当是大于等于第四页时
                                if($_GET['freepage']-3>0){
                                    // 判断是否到最后五页
                                    if($pageCountNum - $_GET['freepage'] <= 2){
                                        // 开始到倒数第五项
                                        $start = $pageCountNum - 4;
                                        // 
                                        $pageNumber = $totalNum;
                                    }else{
                                        // 只显示当前页的前两页和后两页
                                        $start = $_GET['freepage'] -2;
                                        $pageNumber = $_GET['freepage'] + 2;
                                    }
                                }

                                for($i=$start;$i<=$pageCountNum;$i++){
                                    // 判断是否是开头前$pageNumber页
                                    if($i<=$pageNumber){
                                        ?>  
                                        <li class="page-item <?php if($i == $currentPageNum){echo 'active';}?>">
                                            <a class="page-link" href="findinfo.php?freepage=<?php echo $i ?>&<?php echo 'paidpage='.$paidCurrentPage?>"> 
                                                <?php echo $i?>
                                            </a>
                                        </li>
                                        <?php
                                    }else{
                                        ?>  
                                        <li class="page-item">
                                            <span class='page-link'>...</span>
                                        </li>
                                        <li class="page-item <?php if($i == $currentPageNum){echo 'active';}?>">
                                            <a class="page-link" href="findinfo.php?freepage=<?php echo $pageCountNum ?>&<?php echo 'paidpage='.$paidCurrentPage?>"> 
                                                <?php echo $pageCountNum?>
                                            </a>
                                        </li>
                                        <?php
                                        break;
                                    }
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
                    <?php
                }
            ?>
        </article>
        <!-- 免费区结束 -->
    </div>
    <!-- 中间内容区域结束 -->

<?php
    include("footer.php");
?>