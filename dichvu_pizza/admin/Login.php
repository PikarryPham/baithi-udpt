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

                <?php
                session_id() || session_start();
                echo !empty($_SESSION["error"]) ? $_SESSION["error"] : "";
                unset($_SESSION["error"]);
                ?>
                <div class="form-control">
                    <label for="">Tên tài khoản</label>
                    <input type="text" placeholder="Type your phone number" name="TenTK" value="<?php 
                        echo !empty($_SESSION["old_user_name"]) ? $_SESSION["old_user_name"] : "";
                        unset($_SESSION["old_user_name"]);
                    ?>">
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


            <div class="forgot-password">
                <a href="#"> Sign up</a>
            </div>
        </div>
    </div>
</body>
<!-- <script src="./public/js/login.js"></script> -->

</html>