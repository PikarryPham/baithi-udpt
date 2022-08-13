<?php
class Order
{
    public $MaDH;
    public $TenKH;
    public $DienThoai;
    public $DiaChi;
    public $ThoiGianBD;
    public $TrangThai;
    public $ThoiGianKT;
    public $MaDV;
    public $SoLuong;
    public $ThanhTien;
    public $GhiChu;
    public $MaDangKy;
    // public $MaDangKy;

    function __construct($MaDH, $TenKH, $DienThoai, $DiaChi, $ThoiGianBD, $TrangThai, $ThoiGianKT, $MaDV, $SoLuong, $ThanhTien,  $GhiChu, $MaDangKy)
    {
        $this->MaDH = $MaDH;
        $this->TenKH = $TenKH;
        $this->DienThoai = $DienThoai;
        $this->DiaChi = $DiaChi;
        $this->ThoiGianBD = $ThoiGianBD;
        $this->TrangThai = $TrangThai;
        $this->ThoiGianKT = $ThoiGianKT;
        $this->MaDV = $MaDV;
        $this->SoLuong = $SoLuong;
        $this->ThanhTien = $ThanhTien;
        $this->GhiChu = $GhiChu;
        $this->MaDangKy = $MaDangKy;
    }


    // function getMaDH()
    // {
    //     return $this->MaDH;
    // }
    // function getTenKH()
    // {
    //     return $this->TenKH;
    // }
    // function getDienThoai()
    // {
    //     return $this->DienThoai;
    // }
    // function getMaDV()
    // {
    //     return $this->MaDV;
    // }
    // function getSoLuong()
    // {
    //     return $this->SoLuong;
    // }
    // function getprice_of_unit()
    // {
    //     return $this->price_of_unit;
    // }
    // function getThanhTien()
    // {
    //     return $this->ThanhTien;
    // }
    // function getThoiGianBD()
    // {
    //     return $this->ThoiGianBD;
    // }
    // function getThoiGianKT()
    // {
    //     return $this->ThoiGianKT;
    // }
    // function getGhiChu()
    // {
    //     return $this->GhiChu;
    // }
    // MaDangKy
    // function getMaDangKy()
    // {
    //     return $this->MaDangKy;
    // }


    function getAge()
    {
        // $currentYear = date('Y');
        // $temp = explode('-', $this->birthday);
        // $yearBorn = $temp[0];
        // $age = $currentYear - $yearBorn;
        // return $age;

        $currentYear = date('Y');
        // strtotime ham chuyen tu string to time theo chuan yyyy-mm-dd
        $timestamp = strtotime($this->birthday);
        $yearBorn = date('Y', $timestamp);
        $age = $currentYear - $yearBorn;
        return $age;
    }
}