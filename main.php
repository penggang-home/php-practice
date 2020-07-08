<!-- 中间内容区域开始 -->
<div class="main-right">
    <!-- 付费区开始 -->
    <article>
        <p class="mani-title mb-1"><i class="iconfont icon-rect"></i> 付费专区</p>
        <div class="pay">
            <div class="paid-content">
                <?php
                    try{
                        $pdo = new PDO($dsn,$user,$pass);
                        $sql = 'select * from tb_info';
                        $result = $pdo->prepare($sql);
                        $result->execute();

                        while($res = $result->fetch(PDO::FETCH_ASSOC)){
                            $currentDate = date("Y-m-d",time());
                            if($res['checkstate'] == 1 and $res['type'] == "公寓信息"){
                                ?>
                                <div class='mb-2'>
                                    <div>
                                        <span class='content-type'><?php echo $res['type']; ?></span>
                                        <span class='content-title'><?php echo $res['title'] ?></span>
                                        <span class='content-sdate'><?php echo $res['edate'] ?></span>
                                    </div>
                                    <div class='content-content my-2'><?php echo $res['content'] ?></div>
                                    <p class='mb-0 content-info'>联系人：<?php echo $res['linkman']?> 联系电话：<?php echo $res['tel']?> </p>
                                </div>
                                <?php
                            }
                        }
                    } catch (Exception $e){
                        die("Error:".$e->getMessage()."<br>");
                    }
                ?>
            </div>
            <div>
                <img src="image/pcard2.png" alt="">
            </div>
        </div>
    </article>
    <!-- 付费区结束 -->

    <!-- 免费区开始 -->
    <article>
        <p class="mani-title mb-1"><i class="iconfont icon-rect"></i> 免费专区</p>

        <div class="free-content">
            <?php
                try{
                    $pdo = new PDO($dsn,$user,$pass);
                    $sql = 'select * from tb_freeinfo';
                    $result = $pdo->prepare($sql);
                    $result->execute();

                    while($res = $result->fetch(PDO::FETCH_ASSOC)){
                        // $currentDate = date("Y-m-d",strtotime($res['sdate']));
                        $currentDate = date("Y-m-d",time());
                        if($res['checkstate'] == 1 and $currentDate < $res['showdate'] and $res['type'] == "公寓信息"){
                            ?>
                                <div class='mb-2'>
                                    <div>
                                        <span class='content-type'><?php echo $res['type']; ?></span>
                                        <span class='content-title'><?php echo $res['title'] ?></span>
                                        <span class='content-sdate'><?php echo $res['sdate'] ?></span>
                                    </div>
                                    <div class='content-content'><?php echo $res['content'] ?></div>
                                    <p class='mb-0 content-info'>联系人：<?php echo $res['linkman']?> 联系电话：<?php echo $res['tel']?> </p>
                                </div>
                            <?php
                        }
                    }
                } catch (Exception $e){
                    die("Error:".$e->getMessage()."<br>");
                }
            ?>
        </div>
    </article>
    <!-- 免费区结束 -->
</div>
<!-- 中间内容区域结束 -->