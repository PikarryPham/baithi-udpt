<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../admin/public/css/order-detail-admin.css">
    <link rel="stylesheet" href="../../admin/public/css/alert.css">

    <title>Orders Details </title>
</head>

<body>
    <div id="admin-container">
        <div id="sidebar-menu">
            <div class="header-admin">
                <div class="admin-logo">
                    Admin
                </div>
                <div class="avatar">
                    <img src="../../admin/public/assest/images/147144.png" alt="">
                </div>
            </div>
            <div id="drop-menu">
                <div class="menu-item active">
                    <a href="#"> Dashboard </a>
                </div>
            </div>
            <div id="drop-menu">
                <div class="menu-item">
                    <a href="/admin/?c=dashboard&a=list"> Danh sách đặt hàng và trạng thái </a>
                </div>
            </div>

            <!-- <div id="drop-menu">
                <div class="menu-item">
                    <a href="#"> Status Management </a>
                </div>
            </div>
            <div id="drop-menu">
                <div class="menu-item">
                    <a href="#"> Setting Management </a>
                </div>
            </div> -->

        </div>
        <div id="admin-content">
            <div class="admin-content-header">
                Order Detail
            </div>

            <?php require '../admin/layout/header.php'; ?>

            <div class="admin-content-body order-management">
                <form action="/admin/?c=dashboard&a=update" method="POST" id="order-detail-form">
                    <input type="hidden" value="<?= $order->MaDH ?>" name="MaDH">
                    <div class="left-content">
                        <div class="form-control">
                            <label for="">Customer Name</label>
                            <input style="background-color: #cccccc8f;" type="text" value="<?= $order->TenKH ?>" name="TenKH" readonly>
                            <small></small>
                        </div>

                        <div class="form-control">
                            <label for="">Phone Number</label>
                            <input style="background-color: #cccccc8f;" type="text" value="<?= $order->DienThoai ?>" name="DienThoai" readonly>
                            <small></small>
                        </div>

                        <div class="form-control">
                            <label for="">Address</label>
                            <input style="background-color: #cccccc8f;" type="text" value="<?= $order->DiaChi ?>" name="DiaChi" readonly>
                            <small></small>
                        </div>

                        <div class="form-control">
                            <label for="">Order time</label>
                            <input style="background-color: #cccccc8f;" type="text" value="<?= $order->ThoiGianBD ?>" name="ThoiGianBD" readonly>
                            <small></small>
                        </div>

                    </div>

                    <div class="right-content">
                        <div class="form-control">
                            <label for=""> Status </label>
                            <select name="TrangThai" id="">
                                <option value="DAKHOITAO" <?= $order->TrangThai == 'DAKHOITAO' ? 'selected' : '' ?>>Đã
                                    khởi tạo</option>
                                <option value="DAXACNHAN" <?= $order->TrangThai == 'DAXACNHAN' ? 'selected' : '' ?>>Đã
                                    xác nhận</option>
                                <option value="DANGTIENHANH"
                                    <?= $order->TrangThai == 'DANGTIENHANH' ? 'selected' : '' ?>>Đang tiến hành</option>
                                <option value="HOANTAT" <?= $order->TrangThai == 'HOANTAT' ? 'selected' : '' ?>>Hoàn tất
                                </option>
                                <option value="HUY">Hủy</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label for="">Service Name</label>
                            <input style="background-color: #cccccc8f;" type="text" name="" value="<?= $service->TenDV ?>" readonly>
                            <small></small>
                        </div>
                        <div class="form-control">
                            <label for="">Amount</label>
                            <input style="background-color: #cccccc8f;" type="number" value="<?= $order->SoLuong ?>" readonly>
                            <small></small>
                        </div>

                        <div class="form-control">
                            <label for="">Total Price</label>
                            <input style="background-color: #cccccc8f;" type="text" value="<?= number_format($order->ThanhTien) ?> ₫" readonly>
                            <small></small>
                        </div>

                        <div class="submit-btn">
                            <div class="update-status-huy">
                                <a href="/admin/">Hủy</a>
                            </div>
                            <div class="update-status">
                                Update
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

<script src="../../admin/public/js/order-detail-admin.js"> </script>

</html>