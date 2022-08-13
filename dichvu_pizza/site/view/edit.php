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
            <div class="menu-item"><a href="/?c=order&a=add">Dịch vụ</a></div>
            <div class="menu-item"><a href="/?c=order&a=edit">Chi tiết đơn hàng</a></div>
        </div>
    </div>

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
        <?php require './site/layout/header.php'; ?>

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
                            <td style="font-size: 16px"><?= $order->MaDH ?></td>
                            <td style="font-size: 16px" ><?= $services->TenDV ?></td>
                            <td style="font-size: 16px" ><?= $order->TenKH ?></td>
                            <td style="font-size: 16px" ><?= $order->DienThoai ?></td>
                            <td style="font-size: 16px" ><?= $order->DiaChi ?></td>
                            <td style="font-size: 16px" ><?= $order->ThoiGianBD ?></td>
                            <td style="font-size: 16px" ><?= $order->TrangThai ?></td>
                            <td style="font-size: 16px" > <?= $order->SoLuong ?></td>
                            <td style="font-size: 16px" ><?= number_format($order->ThanhTien) ?>₫</td>
                            <td style="font-size: 16px" ><?= $order->GhiChu ?></td>
                            <td>
                                <div class="button-container">
                                    <div class="button-options cancel">
                                        <a href="/?c=order&a=destroy&MaDH= <?= $order->MaDH ?>">
                                            Hủy
                                        </a>
                                    </div>
                                    <br>
                                    <div class="button-options cancel">
                                        <a href="/?c=order&a=edit_order&MaDH= <?= $order->MaDH ?>">
                                            Sửa Đơn
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<script src="./site/public/js/checkout.js" type="module"></script>

</html>