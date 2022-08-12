<?php
class RegisterController
{
    function register()
    {
        require './view/customer/register.php';
    }
    function create()
    {
        $customerRepository = new CustomerRepository();
        $data = [];
        $data['TenTK'] = $_POST["TenTK"];
        $data['MatKhau'] =  md5($_POST["MatKhau"]);


        if ($customerRepository->save($data)) {
            echo ('Tạo tài khoản Thành công!');
        } else {
            echo ('Tạo tài khoản thất bại!');
        }
        // header("location:index.php");
    }
}