<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/login.css">
    <title>Document</title>
</head>

<body>
    <div id="login">
        <div class="form-container">
            <a href="/">
                <div class="home-button">
                    Home
                </div>
            </a>
            <div class="login-header">
                Login
            </div>
            <form action="/admin/?c=login&a=checkLogin" method="POST" id="form-login">
                <div class="form-group">
                    <div class="bg-danger text-warning text-center">

                    </div>
                </div>
                <div class="form-control">
                    <label for="">Tên tài khoản</label>
                    <input type="text" placeholder="Type your phone number" name="TenTK">
                    <small></small>
                </div>
                <div class="form-control">
                    <label for="">Mật khẩu</label>
                    <input type="password" placeholder="Type your password" name="MatKhau">
                    <small></small>
                </div>
                <div class="remember-form">
                    <input type="checkbox" name="rememberMe">
                    <span>Remember me</span>
                </div>

                <div class="form-control">
                    <input type="submit" value="Login">
                    <small></small>
                </div>
            </form>
            <div class="social-login">
                <p>Login with</p>
                <div class="social-icons-container">
                    <div class="social-icon">
                        <img src="./public/assest/icons/facebook.png" alt="">
                    </div>
                    <div class="social-icon">
                        <img src="./public/assest/icons/google.png" alt="">
                    </div>
                    <div class="social-icon">
                        <img src="./public/assest/icons/twitter.png" alt="">
                    </div>
                </div>
            </div>

            <div class="forgot-password">
                <a href=""> Forgot password</a>
            </div>

            <div class="forgot-password">
                <a href="/?c=register&a=register"> Sign up</a>
            </div>
        </div>
    </div>
</body>
<!-- <script src="./public/js/login.js"></script> -->

</html>