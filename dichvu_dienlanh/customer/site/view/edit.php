<!DOCTYPE htm>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./site/public/css/order-detail.css" />
    <link rel="stylesheet" href="./site/public/css/alert.css" />
    <title>Check Out Service</title>
</head>

<body>
    <div id="header">
        <div class="logo">
            <span>logo</span>
        </div>
        <div class="header-menu">
            <div class="menu-item"><a href="/">Trang chủ</a></div>
            <div class="menu-item"><a href="#">Dịch vụ</a></div>
            <div class="menu-item"><a href="#">Chi tiết đơn hàng</a></div>
            <div class="menu-item"><a href="#">Liên hệ</a></div>
            <div class="menu-item"><a href="#">Đăng nhập</a></div>
        </div>
    </div>
    <?php require './site/layout/header.php'; ?>



    <div id="main-content">
        <form action="./?c=order&a=edit" method="GET" class="search-container">
            <input type="hidden" name="c" value="order">
            <input type="hidden" name="a" value="edit">
            <input type="text" placeholder="Nhập mã giao dịch để tìm kiếm" name="MaDH" value="<?php if (isset($MaDH)) {
                                                                                                    echo $MaDH;
                                                                                                }; ?>">
            <button class="search-icon">
                <img src="./site/public/assest/icons/search.png" alt="" width="30px">
            </button>
        </form>
        <div class="table-header-container">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên dịch vụ</th>
                            <th>Tên khách hàng</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Ghi chú</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="orders-container">
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0">
                    <tbody id="tbody-order-table">
                        <?php if (isset($order)) : ?>
                        <tr>
                            <td><?= $order->MaDH ?></td>
                            <td><?= $services->TenDV ?></td>
                            <td><?= $order->TenKH ?></td>
                            <td><?= $order->DienThoai ?></td>
                            <td><?= $order->DiaChi ?></td>
                            <td><?= $order->ThoiGianBD ?></td>
                            <td><?= $order->TrangThai ?></td>
                            <td> <?= $order->SoLuong ?></td>
                            <td><?= number_format($order->ThanhTien) ?></td>
                            <td><?= $order->GhiChu ?></td>
                            <?php if ($order->TrangThai == 'DAKHOITAO') : ?>
                            <td>
                                <div class="button-container">
                                    <div class="button-options">
                                        <a href="/?c=order&a=destroy&MaDH=<?= $order->MaDH ?>">
                                            <img src="../../admin/public/assest/icons/trash-bin.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <?php endif; ?>
                            <?php endif; ?>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<script src="./site/public/js/checkout.js" type="module"></script>

</html>