<main>
    <div class="left">
        <div class="top">
            <span>后台功能区</span>
            <span class="iconfont icon-caidan"></span>
        </div>
        <div class="show-info">
            <div class="show-top">
                <i class="iconfont icon-rect"></i>
                <span>免费信息显示方式</span>
            </div>

            <form action="index.php" method="POST">
                <div class="show-center">
                    <span class="iconfont icon-star_full">审核状态</span>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState'] && $_SESSION['tableName'] == 'tb_freeinfo'){ if($_SESSION['checkState'] == '1'){ echo 'checked';}} ?> value='1'>已审核
                        </label>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState'] && $_SESSION['tableName'] == 'tb_freeinfo'){ if($_SESSION['checkState'] == '0'){ echo 'checked';}} ?> value='0'>未审核
                        </label>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState'] && $_SESSION['tableName'] == 'tb_freeinfo'){ if($_SESSION['checkState'] == '%'){ echo 'checked';}} ?> value='%' >全部
                        </label>
                </div>
                <div class="show-bottom">
                    <div>
                        <span>信息类别</span>
                        <select name="searchType" id="search-info">
                            <option value="%">所有信息</option>
                            <option value="招聘信息">招聘信息</option>
                            <option value="培训信息">培训信息</option>
                            <option value="公寓信息">公寓信息</option>
                            <option value="求购信息">求购信息</option>
                            <option value="求职信息">求职信息</option>
                            <option value="家庭信息">家庭信息</option>
                            <option value="车辆信息">车辆信息</option>
                            <option value="出售信息">出售信息</option>
                            <option value="招商信息">招商信息</option>
                            <option value="寻物启示">寻物启示</option>
                        </select>
                    </div>
                    <input type="hidden" name='tableName' value='tb_freeinfo'>
                    <input type='submit' name='submit' class="btn btn-info" value='检索'></input>
                </div>
            </form>

        </div>
        <div class="show-info">
            <div class="show-top">
                <i class="iconfont icon-rect"></i>
                <span>付费信息显示方式</span>
            </div>
            <form action="index.php" method="POST">
                <div class="show-center">
                    <span class="iconfont icon-star_full">审核状态</span>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState'] && $_SESSION['tableName'] == 'tb_paidinfo'){ if($_SESSION['checkState'] == '1'){ echo 'checked';}} ?> value='1'>已审核
                        </label>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState'] && $_SESSION['tableName'] == 'tb_paidinfo'){ if($_SESSION['checkState'] == '0'){ echo 'checked';}} ?> value='0'>未审核
                        </label>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState'] && $_SESSION['tableName'] == 'tb_paidinfo'){ if($_SESSION['checkState'] == '%'){ echo 'checked';}} ?> value='%' >全部
                        </label>
                </div>
                <div class="show-bottom">
                    <div>
                        <span>信息类别</span>
                        <select name="searchType" id="search-info">
                            <option value="%">所有信息</option>
                            <option value="招聘信息">招聘信息</option>
                            <option value="培训信息">培训信息</option>
                            <option value="公寓信息">公寓信息</option>
                            <option value="求购信息">求购信息</option>
                            <option value="求职信息">求职信息</option>
                            <option value="家庭信息">家庭信息</option>
                            <option value="车辆信息">车辆信息</option>
                            <option value="出售信息">出售信息</option>
                            <option value="招商信息">招商信息</option>
                            <option value="寻物启示">寻物启示</option>
                        </select>
                    </div>
                    <input type="hidden" name='tableName' value='tb_paidinfo'>
                    <input type='submit' name='submit' class="btn btn-info" value='检索'></input>
                </div>
            </form>

        </div>
        <div class="show-info">
            <div class="show-top">
                <i class="iconfont icon-rect"></i>
                <span>企业广告显示方式</span>
            </div>
            <form action="index.php" method="POST">
                <div class="show-center">
                    <span class="iconfont icon-star_full">推荐状态</span>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState']&& $_SESSION['tableName'] == 'tb_advertsing'){ if($_SESSION['checkState'] == '1'){ echo 'checked';}} ?> value='1'>已推荐
                        </label>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState']&& $_SESSION['tableName'] == 'tb_advertsing'){ if($_SESSION['checkState'] == '0'){ echo 'checked';}} ?> value='0'>未推荐
                        </label>
                        <label>
                            <input type="radio" name="checkState" <?php if($_SESSION['submitState']&& $_SESSION['tableName'] == 'tb_advertsing'){ if($_SESSION['checkState'] == '%'){ echo 'checked';}} ?> value='%' >全部
                        </label>
                </div>
                <div class="show-bottom ad-push">
                    <input type="hidden" name='tableName' value='tb_advertsing'>
                    <input type='submit' name='submit' class="btn btn-info" value='检索'></input>
                </div>
            </form>



        </div>
        <div class="release-info">
            <div>
                <i class="fa fa-dollar"></i>
                发布付费信息
            </div>
            <div>
                <i class="fa fa-info"></i>
                发布企业广告
            </div>
        </div>
    </div>

