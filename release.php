<?php
    include('header.php');
    ?>

    <!-- 中间内容区域开始 -->
    <div class="main-right">
        <article>
            <p class="mani-title"><i class="iconfont icon-rect"></i>免费发布专区</p>

            <div class='release-main'>
                    <form action="release-ok.php" method='post' class="form-row">

                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">信息类别</span>
                                </div>
                                <select name="releaseSelect">
                                    <option value="公寓信息">公寓信息</option>
                                    <option value="求职信息">求职信息</option>s
                                    <option value="招聘信息">招聘信息</option>
                                    <option value="培训信息">培训信息</option>
                                    <option value="房屋信息">房屋信息</option>
                                    <option value="求购信息">求购信息</option>
                                    <option value="求职信息">求职信息</option>
                                    <option value="家庭信息">家庭信息</option>
                                    <option value="车辆信息">车辆信息</option>
                                    <option value="出售信息">出售信息</option>
                                    <option value="寻物启示">寻物启示</option>
                                </select>
                                <span class='release-select-info'>* 请正确选择你要发布的信息类别</span>
                            </div>
                        </div>

                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">信息标题</span>
                                </div>
                                <input type="text" required name='releaseTitle'>
                            </div>
                        </div>

                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">信息内容</span>
                                </div>
                                <textarea name="releaseTextarea"cols="100" rows="10" required ></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">联系人</span>
                                </div>
                                <input type="text" required name='releasePerson'>
                            </div>
                        </div>

                        <div class="form-group mb-1 w-100">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">联系电话</span>
                                </div>
                                <input type="text" required name='releaseTel'>
                            </div>
                        </div>

                        <input type='submit' name='releaseSubmit'  class='btn btn-info' value='发布信息'></input>

                    </form>
            </div>
        </article>
    </div>
    <!-- 中间内容区域结束 -->

    <?php
    include('footer.php');

?>