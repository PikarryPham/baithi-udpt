<?php
class CustomerRepository
{
    // public function TimTenTK($TenTK)
    // {

    //     global $conn;
    //     $sql = "SELECT * FROM `customer` WHERE `TenTK` = '$TenTK'";

    //     $result = $conn->query($sql);
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $customer = new Customer($row["TenTK"], $row["MatKhau"], $row["LoaiTK"], $row["TinhTrang"]);
    //         }
    //         return $customer;
    //     } else {
    //         return false;
    //     }
    // }

    function save($data)
    {
        global $conn;
        $TenTK = $data["UserName"];
        $MatKhau = $data["Password"];
        $LoaiTK = '';
        $TinhTrang = '';
        // if ($this->TimTenTK($TenTK)) {
        //     echo ('Tài khoản đã tồn tại');
        // };
        $sql = "INSERT INTO account (UserName, Password, AccountType, Status) VALUES ('$TenTK', '$MatKhau', '$LoaiTK', '$TinhTrang')";
        if ($conn->query($sql)) {
            return true;
        } else {
            $this->error =  "Error: " . $sql . PHP_EOL . $conn->error;
            return false;
        }
    }
    function login($data)
    {
        global $conn;
        $TenTK = $data['UserName'];
        $MatKhau = MD5($data['Password']);
        $sql = "SELECT * FROM account WHERE UserName='$TenTK' AND Password='$MatKhau'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TenTK = $row["UserName"];
                $MatKhau = $row["Password"];
                $LoaiTK = $row["AccountType"];
                $TinhTrang = $row["Status"];
                $customer = new Customer($TenTK, $MatKhau, $LoaiTK, $TinhTrang);
            }
            return $customer;
        } else {
            return false;
        }
    }
    function findUsernameAndPassword($TenTK, $MatKhau)
    {
        global $conn;
        $sql = "SELECT * FROM account WHERE UserName='$TenTK' AND Password='$MatKhau'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['login'] = true;
                $_SESSION['UserName'] = $row['UserName'];
                $_SESSION['AccountType'] = $row['AccountType'];
            }
            return true;
        } else {
            return false;
        }
    }
}