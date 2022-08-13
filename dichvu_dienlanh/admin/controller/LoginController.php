<?php
class LoginController
{
    //     function login()
    //     {
    //         require './Login.php';
    //     }


    //     function checkLogin()
    //     {
    //         var_dump($_POST);

    //         if (isset($_POST["TenTK"]) && isset($_POST["MatKhau"])) {
    //             $customerRepository = new CustomerRepository();

    //             $data = [];
    //             $data['TenTK'] = $_POST["TenTK"];
    //             $data['MatKhau'] =  ($_POST["MatKhau"]);

    //             if ($customerRepository->login($data)) {
    //                 $customer = $customerRepository->login($data);
    //                 $_SESSION["success"] = "Đăng nhập thành công";
    //                 $_SESSION["TenTK"] = $customer->getTenTK();
    //                 $_SESSION["MatKhau"] = $customer->getMatKhau();
    //                 header('location:/admin/');
    //             } else {
    //                 $_SESSION["error"] = ('Login thất bại!');
    //                 header('location:/admin/?c=login&a=login');
    //             }
    //         }
    //     }

    //     function logout()
    //     {
    //         session_destroy();
    //     }
    // }
    function login()
    {
        require './Login.php';
    }

    function checkLogin()
    {
        if (isset($_SESSION["TenTK"])) {
            header("location:/admin/");
        }
        $TenTK = $_POST["TenTK"];
        $MatKhau = md5($_POST["MatKhau"]);
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findUsernameAndPassword($TenTK, $MatKhau);
        if (!empty($customer)) {
            //Đã login thành công
            $_SESSION["TenTK"] =  $customer->getTenTK();
            $_SESSION["MatKhau"] = $customer->getMatKhau();
            header("location:/admin/");
        } else {
            //Login thất bại. Về login.php
            $_SESSION["error"] = "Sai username hoặc password";
            header("location:/admin/?c=login&a=login");
        }
    }

    function logout()
    {
        session_destroy();
        header("location:/admin/?c=login&a=login");
    }
}