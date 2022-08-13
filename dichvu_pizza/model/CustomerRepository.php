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
        $TenTK = $data["TenTK"];
        $MatKhau = $data["MatKhau"];
        $LoaiTK = '';
        $TinhTrang = '';
        // if ($this->TimTenTK($TenTK)) {
        //     echo ('Tài khoản đã tồn tại');
        // };
        $sql = "INSERT INTO taikhoan (TenTK, MatKhau, LoaiTK, TinhTrang) VALUES ('$TenTK', '$MatKhau', '$LoaiTK', '$TinhTrang')";
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
        $TenTK = $data['TenTK'];
        $MatKhau = MD5($data['MatKhau']);
        $sql = "SELECT * FROM taikhoan WHERE TenTK='$TenTK' AND MatKhau='$MatKhau'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TenTK = $row["TenTK"];
                $MatKhau = $row["MatKhau"];
                $LoaiTK = $row["LoaiTK"];
                $TinhTrang = $row["TinhTrang"];
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
        $sql = "SELECT * FROM taikhoan WHERE TenTK='$TenTK' AND MatKhau='$MatKhau'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $TenTK = $row["TenTK"];
                $MatKhau = $row["MatKhau"];
                $LoaiTK = $row["LoaiTK"];
                $TinhTrang = $row["TinhTrang"];
                $customer = new Customer($TenTK, $MatKhau, $LoaiTK, $TinhTrang);
            }
            return $customer;
        } else {
            return false;
        }
    }
}