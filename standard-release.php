<?php
    include('header.php');
    ?>

    <!-- 中间内容区域开始 -->
    <div class="main-right">
        <article>
            <p class="mani-title"><i class="iconfont icon-rect"></i>免费发布专区</p>

            <div class='release-main'>
                <section>
                    <div>信息类别：</div>
                    <div>
                        <select name="release-type" id="release-type">
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
                        <span>*请选择您要发布信息的类别</span>
                    </div>
                </section>
                <section>
                    <div>信息标题：</div>
                    <div><input type="text"></div>
                </section>
                <section>
                    <div>信息内容：</div>
                    <textarea name="textarea"cols="30" rows="10"></textarea>
                </section>
                <section>
                    <div>联系人：</div>
                    <div><input type="text"></div>
                </section>
                <section>
                    <div>联系电话：</div>
                    <div><input type="tel"></div>
                </section>
                <div>
                    <button><img src="image/fa.jpg" alt=""></button>
                </div>
            </div>
        </article>
    </div>
    <!-- 中间内容区域结束 -->

    <?php
    include('footer.php');

?>