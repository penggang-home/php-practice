<?php
    session_start();
    if($_POST['signout'] == '退出登录'){
        $_SESSION['loginState'] = 'false';
        // echo $_SESSION['loginState'];
        ?>
        <script>
            alert("退出成功");
            window.location.href='login.php';
        </script>
        <?php   
    }
?>