<?php
class Customer
{
    protected $TenTK;
    protected $MatKhau;
    protected $LoaiTK;
    protected $TinhTrang;

    function __construct($TenTK, $MatKhau, $LoaiTK, $TinhTrang)
    {
        $this->TenTK = $TenTK;
        $this->MatKhau = $MatKhau;
        $this->LoaiTK = $LoaiTK;
        $this->TinhTrang = $TinhTrang;
    }

    function getTenTK()
    {
        return $this->TenTK;
    }

    function getMatKhau()
    {
        return $this->MatKhau;
    }

    function getLoaiTK()
    {
        return $this->LoaiTK;
    }

    function getTinhTrang()
    {
        return $this->TinhTrang;
    }
}