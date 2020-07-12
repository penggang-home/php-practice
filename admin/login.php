<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> -->
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
            <form action="chkadmin.php" method="POST" autocomplete='off'>
                <img src="images/avatar.svg" alt="" class="avatar">
                <h2>Welcome</h2>
                <div class="input-group">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input type="text" name="username" class="input" maxlength="22" required>
                    </div>
                </div>
                <div class="input-group">
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input type="password" name="password" class="input" maxlength="16" required>
                    </div>
                </div>
                <div class="menu">
                    <a href="#">Register</a>
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" class="btn" value="Log in">
            </form>
        </div>
    </div>
    <script src="js/login.js" type="text/javascript"></script>
</body>
</html>