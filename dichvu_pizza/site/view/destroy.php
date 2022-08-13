<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đặt dịch vụ</title>
    <link rel="stylesheet" href="./site/public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./site/public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="./site/public/css/style.css">
    <link rel="stylesheet" href="./site/public/css/alert.css" />

</head>

<body>
    <div class="container" style="margin-top:20px;">
        <?php require './site/layout/header.php';  ?>


        <a href="./site/subject/list.html" class=" btn btn-info">add</a>
        <a href="./site/register/list.html" class="active btn btn-info">Register</a>
        <div style="height:40px; margin-top:20px">
            <div class="error bg-danger container-fluid text-center">
            </div>
            <div class="message bg-primary container-fluid text-center">
            </div>
        </div>
        <h1>Dịch vụ của bạn</h1>
        <form action="?c=order&a=destroy" method="GET">

            <div class="form-group">
                <label>Mã đơn hàng</label>
                <input type="text" class="form-control" placeholder="Mã đơn hàng" required name="MaDH">
            </div>


            <div class="form-group">
                <button class="btn btn-success" type="submit">Xóa</button>
            </div>

        </form>
        <script src="./site/public/vendor/jquery-3.5.1.min.js"></script>
        <script src="./site/public/vendor/popper.min.js"></script>
        <script src="./site/public/vendor/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
        <script src="./site/public/js/script.js"></script>
    </div>
</body>

</html>