<?php
class Service
{
    public $MaDV;
    public $TenDV;
    public $LoaiDV;
    public $DonGia;

    function __construct($MaDV1, $TenDV1, $LoaiDV1, $DonGia1)
    {
        $this->MaDV = $MaDV1;
        $this->TenDV = $TenDV1;
        $this->LoaiDV = $LoaiDV1;
        $this->DonGia = $DonGia1;
    }

    function getAge()
    {
        // $currentYear = date('Y');
        // $temp = explode('-', $this->LoaiDV);
        // $yearBorn = $temp[0];
        // $age = $currentYear - $yearBorn;
        // return $age;

        $currentYear = date('Y');
        // strtotime ham chuyen tu string to time theo chuan yyyy-mm-dd
        $timestamp = strtotime($this->LoaiDV);
        $yearBorn = date('Y', $timestamp);
        $age = $currentYear - $yearBorn;
        return $age;
    }
}