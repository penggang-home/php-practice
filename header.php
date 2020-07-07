<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>易查供求信息网</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://at.alicdn.com/t/font_1925165_m54txa8lr6.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- 头部开始 -->
    <header>
        <div class="header-menu">
            <ul class="mb-1">
                <div class="left">
                    <li><a href="release.php">[发布信息]</a> </li>
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
                <a href="index.php"><img src="image/logo.png"  alt=""></a>
            </div>
            <div class="right">
                <ul class="m-0 p-0">
                    <li><a href="index.php">首页</a></li>
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
    <!-- 头部结束 -->

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
                                <li>
                                    <a href="#"> <i class="iconfont icon-dian"></i> <?php echo $res['title'] ?></a>
                                </li>

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
        <!-- 左侧边栏结束 -->
