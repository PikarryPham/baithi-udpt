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
            <div class="menu-item"><a href="#">Dịch vụ</a></div>
            <div class="menu-item"><a href="/?c=order&a=edit">Chi tiết đơn hàng</a></div>
            <div class="menu-item"><a href="#">Liên hệ</a></div>
            <div class="menu-item"><a href="#">Đăng nhập</a></div>
        </div>
    </div>
    <?php require './site/layout/header.php'; ?>


    <div class="main-cotainer">
        <div class="button-option-container">

            <div class="ripple-button button-option">
                <form action="/?c=order&a=edit" method="GET">
                    <!-- <a href="/?c=order&a=edit">Tra cứu đơn hàng</a></div> -->
                    <button type="submit"> Tra cứu đơn hàng </button>
                    <input type="hidden" name="c" value="order">
                    <input type="hidden" name="a" value="edit">


                </form>
            </div>

            <div class="ripple-button button-option">
                <button><a href="/?c=order&a=add">Đặt dịch vụ Online</a> </button>
            </div>

            <div class="button-option">
                <button> Đăng nhập </button>
            </div>

            <div class="button-option">
                <button class="ripple-button">Liên hệ 0357 8888 9999</button>
            </div>

        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./site/public/assest/images/bg1.jpg" />
                    <div class="text-content">
                        <h2 class="title">Sữa chữa điện gia dụng <span>Service</span></h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Ratione consequatur, dolorum in omnis nostrum iusto porro
                            ipsa expedita consequuntur saepe. Dignissimos iure magni
                            molestias reprehenderit laudantium optio odit, eos assumenda!
                        </p>
                        <a href="/?c=order&a=add">
                            <button class="book-service ripple-button">
                                Sử dụng dịch vụ
                            </button>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./site/public/assest/images/bg5.jpg" />
                    <div class="text-content">
                        <h2 class="title">Sửa Điện Lạnh <span>Service</span></h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Ratione consequatur, dolorum in omnis nostrum iusto porro
                            ipsa expedita consequuntur saepe. Dignissimos iure magni
                            molestias reprehenderit laudantium optio odit, eos assumenda!
                        </p>
                        <a href="/?c=order&a=add">
                            <button class="book-service ripple-button">
                                Sử dụng dịch vụ
                            </button>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./site/public/assest/images/bg3.jpg" />
                    <div class="text-content">
                        <h2 class="title">Lắp đặt sữa chữa mạng Wifi internet <span>Service</span></h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Ratione consequatur, dolorum in omnis nostrum iusto porro
                            ipsa expedita consequuntur saepe. Dignissimos iure magni
                            molestias reprehenderit laudantium optio odit, eos assumenda!
                        </p>
                        <a href="/?c=order&a=add">
                            <button class="book-service ripple-button">
                                Sử dụng dịch vụ
                            </button>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="./site/public/assest/images/bg4.jpg" />
                    <div class="text-content">
                        <h2 class="title">Lắp đặt sữa chữa ống nước <span>Service</span></h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Ratione consequatur, dolorum in omnis nostrum iusto porro
                            ipsa expedita consequuntur saepe. Dignissimos iure magni
                            molestias reprehenderit laudantium optio odit, eos assumenda!
                        </p>
                        <a href="/?c=order&a=add">
                            <button class="book-service ripple-button">
                                Sử dụng dịch vụ
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slider-thumbs">
            <div class="swiper-wrapper thumbs-container">
                <img src="./site/public/assest/images/bg1.jpg" alt="" class="swiper-slide" />
                <img src="./site/public/assest/images/bg5.jpg" alt="" class="swiper-slide" />
                <img src="./site/public/assest/images/bg3.jpg" alt="" class="swiper-slide" />
                <img src="./site/public/assest/images/bg4.jpg" alt="" class="swiper-slide" />
            </div>
        </div>
    </div>
</body>
<script src="./site/public/js/index.js" type="module"></script>
<script src="./site/public/js/swiper-bundle.min.js"></script>
<script src="./site/public/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"
    integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>