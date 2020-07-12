<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <img src="images/bg-font.png" alt="" class="wave">
    <div class="container">
        <div class="img">
            <img src="images/info.svg" alt="">
        </div>
        <div class="login-box">
            <form action="register_ok.php" method="POST" autocomplete='off'>
                <img src="images/avatar.svg" alt="" class="avatar">
                <h2>Welcome Sign Up</h2>
                <div class="input-group">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div>
                        <h5>Username <span>用户名已存在</span></h5>
                        <input type="text" name="username" class="input" minlength='6' maxlength="22" required >
                    </div>
                </div>
                <div class="input-group">
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input type="text" name="password" class="input" minlength='8' maxlength="16" required>
                    </div>
                </div>
                <div class="menu">
                    <a href="login.php">Go Sign In</a>
                </div>
                <input type="submit" class="btn" value="Sign Up">
                <a href="../index.php"><input type="button" class="btn" value="Back Index"></a>
            </form>
        </div>
    </div>
    <script src="js/admin.js" type="text/javascript"></script>
</body>
</html>