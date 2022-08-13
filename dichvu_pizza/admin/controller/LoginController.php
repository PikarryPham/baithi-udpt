<?php
class LoginController
{
    function login()
    {
        if (isset($_SESSION["login"])) {
            header("location:/admin/");
        }
        require './Login.php';
    }

    function checkLogin()
    {
        if (isset($_SESSION["login"])) {
            header("location:/admin/");
        }
        $TenTK = $_POST["TenTK"];
        $MatKhau = $_POST["MatKhau"];
        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->findUsernameAndPassword($TenTK, $MatKhau);
        if ($customer) {
            //Đã login thành công
            header("location:/admin/");
        } else {
            //Login thất bại. Về login.php
            $_SESSION["old_user_name"] = $TenTK;
            $_SESSION["error"] = "Sai username hoặc password";
            header("location: /admin/?c=login&a=login");
        }
    }

    function logout()
    {
        session_destroy();
        header("location:/admin/?c=login&a=login");
    }
}