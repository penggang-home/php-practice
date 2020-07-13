<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>验证用户名</title>
</head>
<body>
    <div id="app">
        <div>
            <span >用户名:</span>
            <span>
                <input type="text"  v-model='uname'>
            </span>
            <button :focus='handle1'>点击</button>
            <span>{{tip}}</span>
        </div>
    </div>
    <script src="vue.js"></script>
    <script>
        let vm = new Vue({
            el:"#app",
            data:{
                uname:'',
                tip:''
            },
            methods: {
                handle1:function(event){
                    console.log(event.target.innerHTML);
                    this.num++;
                },
                checkName:function(uname){
                    // 调用接口,但是可以使用定时任务的方式模拟接口调用
                    var that = this;
                    setTimeout(function(){
                        if(uname == 'admin'){
                            that.tip='用户名已经存在,请更换一个';
                        }else{
                            that.tip='用户名可以使用';
                        }
                    },300)

                },
            },
            watch: {
                uname:function(val){
                    // 调用后台接口验证用户名的合法性
                    this.checkName(val);
                    <?php
                        echo "console.log(1)";
                    ?>
                    // 修改提示信息
                    this.tip = '正在验证...';
                }
            },
        });
    </script>
</body>
</html>