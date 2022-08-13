<?php
class ServiceRepository
{
    protected $error;
    // function 
    protected function fetch($cond = null)
    {
        global $conn;
        $sql = "SELECT * FROM dichvu";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $result = $conn->query($sql);
        $students = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $MaDV = $row['MaDV'];
                $TenDV = $row['TenDV'];
                $LoaiDV = $row['LoaiDV'];
                $DonGia = $row['DonGia'];

                $service = new Service($MaDV, $TenDV, $LoaiDV, $DonGia);
                $services[] = $service;
            }
        }
        return $services;
    }

    function find($MaDV)
    {
        $cond = "MaDV=$MaDV";
        $service = $this->fetch($cond);
        // current() la ham tra ve phan tu dau tien trong danh sach
        $service = current($service);
        return $service;
    }

    function getAll()
    {
        $services = $this->fetch();
        // current() la ham tra ve phan tu dau tien trong danh sach
        // $service = current($service);
        return $services;
    }

    // function destroy($id)
    // {
    //     global $conn;
    //     $sql = "DELETE FROM student WHERE id = '$id'";
    //     if ($conn->query($sql)) {
    //         return true;
    //     }
    //     $this->error = "SQL: $sql{$conn->error}";
    //     return false;
    // }

    // function getError()
    // {
    //     return $this->error;
    // }



    // function getAll()
    // {
    //     return $this->fetch();
    // }
    // function getByPattern($search)
    // {
    //     $cond = "name LIKE '%$search%'";
    //     return $this->fetch($cond);
    // }
}