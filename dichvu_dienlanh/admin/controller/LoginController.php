<?php
class LoginController
{
    function login()
    {
        require './Login.php';
    }


    function checkLogin()
    {
        var_dump($_POST);

        if (isset($_POST["TenTK"]) && isset($_POST["MatKhau"])) {
            $customerRepository = new CustomerRepository();

            $data = [];
            $data['TenTK'] = $_POST["TenTK"];
            $data['MatKhau'] =  ($_POST["MatKhau"]);

            if ($customerRepository->login($data)) {
                $customer = $customerRepository->login($data);
                $_SESSION["success"] = "Đăng nhập thành công";
                $_SESSION["TenTK"] = $customer->getTenTK();
                $_SESSION["MatKhau"] = $customer->getMatKhau();
                // header('location:/admin/');
            } else {
                $_SESSION["error"] = ('Login thất bại!');
                // header('location:/admin/?c=login&a=login');
            }
        }
    }

    function logout()
    {
        session_destroy();
    }
}