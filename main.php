<!-- 中间内容区域开始 -->
<div class="main-right">
    <!-- 付费区开始 -->
    <article>
        <p class="mani-title"><i class="iconfont icon-rect"></i> 付费专区</p>
        <div class="pay">
            <div>暂无公寓信息资源！</div>
            <div>
                <img src="image/pcard2.png" alt="">
            </div>
        </div>
    </article>
    <!-- 付费区结束 -->

    <!-- 免费区开始 -->
    <article>
        <p class="mani-title"><i class="iconfont icon-rect"></i> 免费专区</p>

        <div class="free-content">
            <?php
                try{
                    $pdo = new PDO($dsn,$user,$pass);
                    $sql = 'select * from tb_leaguerinfo';
                    $result = $pdo->prepare($sql);
                    $result->execute();

                    while($res = $result->fetch(PDO::FETCH_ASSOC)){
                        ?>

                        <div>
                            <div>
                                <span><?php echo $res['type']; ?></span>
                                <span><?php echo $res['title'] ?></span>
                                <span><?php echo $res['sdate'] ?></span>
                            </div>
                            <div><?php echo $res['content'] ?></div>
                            <p>联系人：<?php echo $res['linkman']?> 联系电话：<?php echo $res['tel']?> </p>
                        </div>

                        <?php
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