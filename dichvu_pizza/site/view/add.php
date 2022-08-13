<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./site/public/css/checkout.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./site/public/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./site/public/css/alert.css" />
    <link rel="stylesheet" href="./site/public/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <?php require './site/layout/header.php';  ?>

    </div>
    <div id="checkout">
        <div class="checkout-container">
            <form action="?c=order&a=save" method="POST" id="checkout-form">
                <div class="service-checkout">
                    <div class="image-container">
                        <img src="./site/public/assest/images/bg3.jpg" alt="" />
                    </div>

                    <div class="service-infor">
                        <div class="form-control">
                            <label for="service-combobox">Lựa chọn dịch vụ* </label>
                            <select name="MaDV" id="service-combobox">
                                <option value="">Vui lòng chọn dịch vụ</option>
                                <?php
                                foreach ($services as $service) : ?>
                                    <option value="<?= $service->MaDV ?>"><?= $service->MaDV ?> - <?= $service->TenDV ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php foreach($services as $service) { ?>
                                <input id="service-id-<?= $service->MaDV ?>" type="hidden" value="<?php echo $service->DonGia ?>" >
                            <?php } ?>
                        </div>
                        <p class="service-price">Giá: <span id="price-per-service">0</span> vnd</p>
                    </div>

                    <div class="form-control">
                        <label for="">Số lượng* </label>
                        <input type="number" placeholder="Nhập số lượng" name="SoLuong" value="1" min="1" max="100" id="SoLuongDon"/>
                        <small class="error-msg">Số điện thoại không đúng</small>
                    </div>

                    <div class="form-control">
                        <p for="">Tổng Chi Phí:
                            <span type="text" id="gia-thanh-tien" name="ThanhTien"> 0 </span>
                            <small class="error-msg"></small>
                        </p>
                    </div>

                    <div class="total">
                        <span name="ThanhTien">Cảm ơn bạn đã lựa chọn dịch vụ </span> <span>của chúng tôi ! </span>
                    </div>

                </div>
                <div class="checkout-form-container">
                    <p>Vui lòng nhập thông tin để tiến hành đặt hàng!</p>
                    <p>Bắt buộc*</p>

                    <div class="form-control">
                        <label for="">Tên khách hàng* </label>
                        <input type="text" placeholder="Nhập tên của bạn" id="" name="TenKH" />
                        <small class="error-msg"></small>
                    </div>

                    <div class="form-control">
                        <label for="">Số điện thoại* </label>
                        <input type="text" placeholder="Nhập Số điện thoại" id="" name="DienThoai" />
                        <small class="error-msg"></small>
                    </div>

                    <div class="form-control">
                        <label for="">Địa chỉ* </label>
                        <input type="text" placeholder="Nhập Địa chỉ" id="" name="DiaChi" />
                        <small class="error-msg"></small>
                    </div>
                    <div class="form-control">
                        <label for="">Ghi chú của bạn </label>
                        <input type="text" placeholder="Ghi chú của bạn" id="" name="GhiChu" />
                        <small class="error-msg"></small>
                    </div>

                    <div class="form-control">
                        <input type="submit" />
                        <small class="error-msg"></small>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="model" class="">

        <div class="notify-success">
            <div class="close-btn">
                <img src="./site/public/assest/icons/close.png" alt="" width="35px">
            </div>
            <div class="icon-success">
                <img src="./site/public/assest/icons/checked.png" alt="" width="100px">
            </div>
            <div class="notify-content">
                <p>Cảm ơn quý khách đã sử dụng dịch vụ</p>
                <p>Chúng tôi sẽ liên hệ để xác nhận đơn hàng</p>
                <p>Mã giao dịch của bạn là:</p>
                <p>#sa3232</p>
            </div>
        </div>
    </div>
</body>
<script src="./site/public/js/checkout.js" type="module"></script>

<script>
    const loaiDV = document.getElementById("service-combobox");
    const SoLuongDon = document.getElementById("SoLuongDon");
    const ThanhTien = document.getElementById("gia-thanh-tien");
    const DonGia = document.getElementById("price-per-service");

    var typeDV = 0;
    var giaDV = 0;
    var SLDon = 1;

    function update_price(){
        ThanhTien.innerHTML = `${( giaDV * SLDon ).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}`;
    }

    loaiDV.addEventListener("change", function(e) {
        typeDV = e.target.value;
        giaDV = document.getElementById(`service-id-${typeDV}`).value;
        DonGia.innerHTML = parseInt(giaDV).toLocaleString('it-IT');
        update_price();
    })

    SoLuongDon.addEventListener("change", function(e){
        SLDon = e.target.value;
        if (SLDon > 100 || SLDon < 0){
            SoLuongDon.style.outline = "3px solid #ff3333";
        }else{
            update_price();
        }
    })

</script>

</html>