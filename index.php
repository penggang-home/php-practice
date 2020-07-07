<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>易查供求信息网</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https:////at.alicdn.com/t/font_1925165_m54txa8lr6.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="index-body">
    <header>
        <div class="header-menu">
            <ul class="mb-1">
                <div class="left">
                    <li><a href="#">[发布信息]</a> </li>
                    <li><a href="#">[进入后台]</a> </li>
                </div>
                <div class="right">
                    <li><a href="#">加入收藏</a> </li>
                    <li><a href="#">联系我们</a> </li>
                </div>
            </ul>
        </div>
        <nav>
            <div class="left">
                <img src="image/logo.png" alt="">
            </div>
            <div class="right">
                <ul class="m-0 p-0">
                    <li><a href="">首页</a></li>
                    <li><a href="">招聘信息</a></li>
                    <li><a href="">培训信息</a></li>
                    <li><a href="">房屋信息</a></li>
                    <li><a href="">求购信息</a></li>
                    <li><a href="">求职信息</a></li>
                    <li><a href="">家庭信息</a></li>
                    <li><a href="">车辆信息</a></li>
                    <li><a href="">出售信息</a></li>
                    <li><a href="">招商信息</a></li>
                    <li><a href="">寻物启示</a></li>
                </ul>
            </div>
        </nav>
        <div class="work">
            <img src="image/pcard1.png" alt="">
        </div>
    </header>

    <main>
        <!-- 左侧边栏 -->
        <aside>
            <div>
                <p class="mani-title mb-0"><i class="iconfont icon-rect"></i> 推荐企业广告信息</p>
                <ul>

                <?php
                        $dbms = 'mysql';
                        $host = 'localhost';
                        $dbName='tb_cityinfo';
                        $user='root';
                        $pass='123456';

                        $dsn="$dbms:dbname=$dbName;host=$host";

                        try{
                            $pdo = new PDO($dsn,$user,$pass);
                            $sql = 'select * from tb_advertsing';
                            $result = $pdo->prepare($sql);
                            $result->execute();

                            while($res = $result->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> <?php echo $res['title'] ?></a> </li>
                                <!-- <li><a href="#"> <i class="iconfont icon-dian"></i> 万法影城优惠</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 欧亚卖场店即将开始</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 新城喜悦广场印象KTV</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 新城喜悦广场盛大开业</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 美食广场欢迎您</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 心悦房地产</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 花园式酒店正式成立</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 诚邀电子商务</a> </li>
                                <li><a href="#"> <i class="iconfont icon-dian"></i> 你好，欢迎登录52同城</a> </li> -->
                                <?php
                            }
                        } catch (Exception $e){
                            die("Error:".$e->getMessage()."<br>");
                        }
                    ?>
                </ul>
            </div>
            <br>
            <div>
                <p class="mani-title"><i class="iconfont icon-rect"></i> 信息快速检索</p>
                <div class="search">
                    <form class="form-row">
                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">搜索内容</span>
                                </div>
                                <input type="text">
                            </div>
                        </div>
                    </form>
                    <form class="form-row">
                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">选择条件</span>
                                </div>
                                <select name="search-info" id="search-info">
                                    <option value="0">求职信息</option>
                                    <option value="1">招聘信息</option>
                                    <option value="2">培训信息</option>
                                    <option value="3">房屋信息</option>
                                    <option value="4">求购信息</option>
                                    <option value="5">求职信息</option>
                                    <option value="6">家庭信息</option>
                                    <option value="7">车辆信息</option>
                                    <option value="8">出售信息</option>
                                    <option value="9">招商信息</option>
                                    <option value="10">寻物启示</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary">搜索</button>
                    </div>
                </div>
            </div>
            <div class="about">
                <p class="mani-title"><i class="iconfont icon-rect"></i> 联系我们</p>
                <ul>
                    <li>52同城信息网</li>
                    <li>联系地址：吉林省长春市街道62号</li>
                    <li>联系电话：100-675-1066</li>
                    <li>邮政编码：130000</li>
                </ul>
            </div>
        </aside>

        <!-- 中间内容区域开始 -->
        <div class="main-right">
            <!-- 付费区 -->
            <article>
                <p class="mani-title"><i class="iconfont icon-rect"></i> 付费专区</p>
                <div class="pay">
                    <div>暂无公寓信息资源！</div>
                    <div>
                        <img src="image/pcard2.png" alt="">
                    </div>
                </div>
            </article>
            <!-- 免费区 -->
            <article>
                <p class="mani-title"><i class="iconfont icon-rect"></i> 免费专区</p>

                <div class="free-content">
                    <div>
                        <div>
                            <span>[公寓信息]</span>
                            <span>心怡女子公寓</span>
                            <span>2017-12-20 09:40:58</span>
                        </div>
                        <div>本公寓位于贵阳街交通便利，环境好，现入住人员工作稳走素质高，欢迎有稳定工作爱干净女孩入住，有不良嗜好者勿扰</div>
                        <p>联系人：欧阳女士 联系电话：0431-8889639</p>
                    </div>
                </div>
                <div class="free-content">
                    <div>
                        <div>
                            <span>[公寓信息]</span>
                            <span>高级男子公寓</span>
                            <span>2017-12-26 08:36:23</span>
                        </div>
                        <div>民康路附近，交通便利，内设热水器可以做饭，洗衣机，饮水机，电视机，24小时冷热水等-供暖好，全新被褥，宽敞明亮，环境幽雅清净，安全卫生，竭城欢迎各界高素质单身男士前来入住</div>
                        <p>联系人：舒先生 联系电话：0431-88864562</p>
                    </div>
                </div>
                <div class="free-content">
                    <div>
                        <div>
                            <span>[公寓信息]</span>
                            <span>心怡女子公寓</span>
                            <span>2017-12-10 03:50:51</span>
                        </div>
                        <div>温馨街附近，2楼，提供2人间，8人间。交通便利，室内干净，整洁，通风好，有甩干筒，有电视，提供热水。价格合
                            理，亲情化专人管理，是理想的公寓选择</div>
                        <p>联系人：欧阳女士 联系电话：0431-8889639</p>
                    </div>
                </div>

            </article>
        </div>
    </main>
    <footer>
        吉林省明日科技有限公司 版权所有 邮箱：mingrisoft@mingrisoft.com 联系电话:400-675-1066
    </footer>
</body>

</html>