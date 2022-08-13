<?php
class OrderRepository
{
    protected $error;
    // function 

    function save($data)
    {
        global $conn;

        $TenKH = $data['TenKH'];
        $DienThoai = $data['DienThoai'];
        $DiaChi = $data['DiaChi'];
        $MaDV = $data['MaDV'];
        $SoLuong = $data['SoLuong'];
        // $price_of_unit = $data['price_of_unit'];
        $GhiChu = $data['GhiChu'];
        $ThanhTien = $data['ThanhTien'];
        $ThoiGianBD = $data['ThoiGianBD'];
        $TrangThai = 'DAKHOITAO';
        // $MaDangKy = $data['MaDangKy'];
        $tmp =  md5('$DienThoai');
        $MaDangKy = mt_rand(1, pow(2, 31) - 1);;
        $MaDH = mt_rand(1, pow(2, 31) - 1);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ModifiedTime = date("Y-m-d H:i:s");

        $sql = "INSERT INTO `order` (`OrderID`, `CustomerName`, `Phone`, `Address`, `CreatedTime`, `Status`, `ModifiedTime`, `ProductID`, `Quantity`, `Amount`, `Note`, `RegisterCode`) VALUES ('$MaDH','$TenKH', '$DienThoai', '$DiaChi', '$ThoiGianBD', '$TrangThai', '$ModifiedTime', '$MaDV','$SoLuong', '$ThanhTien', '$GhiChu', '$MaDangKy')";
        // var_dump($sql);    
        if ($conn->query($sql)) {
            return $MaDH;
            // return true;
        } else {
            $this->error = "SQL: $sql{$conn->error}";
            return false;
        }
    }

    function fetch($cond = null)
    {
        global $conn;
        $sql = "SELECT `order`.*, pizza.ComboName AS TenDV 
        FROM `order` 
        JOIN pizza ON `order`.ProductID = pizza.ProductID";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        // var_dump($sql);
        $orders = [];
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $MaDH = $row['OrderID'];
                    $TenKH = $row['CustomerName'];
                    $DienThoai = $row['Phone'];
                    $DiaChi = $row['Address'];
                    $ThoiGianBD = $row['CreatedTime'];
                    $TrangThai = $row['Status'];
                    $ThoiGianKT = $row['ModifiedTime'];
                    $MaDV = $row['ProductID'];
                    $SoLuong = $row['Quantity'];
                    $ThanhTien = $row['Amount'];
                    $GhiChu = $row['Note'];
                    $MaDangKy = $row['RegisterCode'];

                    $order = new Order($MaDH, $TenKH, $DienThoai, $DiaChi, $ThoiGianBD, $TrangThai, $ThoiGianKT, $MaDV, $SoLuong, $ThanhTien, $GhiChu, $MaDangKy);
                    $orders[] = $order;
                }
                return $orders;
            }
        } else {
            return $orders = [];
        }
    }

    function find($MaDH = null)
    {
        $cond = "OrderID = $MaDH";
        return $this->fetch($cond);
        // current() la ham tra ve phan tu dau tien trong danh sach
        // if (count($Orders)) {
        //     $Order = current($Orders);
        //     return $Order;
        // }
    }

    function getAll()
    {
        return $this->fetch();
    }
    function getByCond($cond)
    {

        // $cond = [
        //     "ThoiGianBD" => [
        //         "type" => "BETWEEN",
        //         "val" => "$start AND $end"
        //     ]
        // ];
        // $cond = "$cond[0]" . "$cond[0]['type']" . "$cond[0]['val']";
        // die($cond);
        $Orders = $this->fetch($cond);
        // die(isset($Orders));
        if (isset($Orders)){
            $Order = current($Orders);
            return $Order;
        }return null;
        // current() la ham tra ve phan tu dau tien trong danh sach
    }

    function update($order)
    {
        global $conn;

        $MaDH = $order->MaDH;
        $TenKH = $order->TenKH;
        $DienThoai = $order->DienThoai;
        $DiaChi = $order->DiaChi;
        $MaDV = $order->MaDV;
        $SoLuong = $order->SoLuong;
        $GhiChu = $order->GhiChu;
        $ThanhTien = $order->ThanhTien;

        $sql = "UPDATE order SET TenKH = '$TenKH', DienThoai = '$DienThoai', DiaChi = '$DiaChi', MaDV = '$MaDV', SoLuong = '$SoLuong', GhiChu = '$GhiChu', ThanhTien = '$ThanhTien' WHERE MaDH = '$MaDH'";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "SQL: $sql{$conn->error}";
        return false;
    }

    function update_status($order)
    {
        global $conn;
        $MaDH = $order->MaDH;
        $TrangThai = $order->TrangThai;
        $ThoiGianKT = $order->ThoiGianKT;


        $sql = "UPDATE `order` SET `Status` = '$TrangThai', ModifiedTime = ' $ThoiGianKT' WHERE OrderID = '$MaDH'";

        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "SQL: $sql{$conn->error}";
        return false;
    }

    function destroy($MaDH)
    {
        global $conn;
        $sql = "DELETE FROM `order` WHERE MaDH = '$MaDH'";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "SQL: $sql{$conn->error}";
        return false;
    }

    function getError()
    {
        return $this->error;
    }


    // function getByPattern($search)
    // {
    //     // $cond = "TenKH LIKE '%$search%'";
    //     // return $this->fetch($cond);
    // }

    // protected function fetchAll($condition = null, $sort = null, $limit = null)
    function fetchAll($condition = null, $sort = null, $limit = null)
    {
        global $conn;
        $orders = array();

        $sql = "SELECT * FROM `order`";
        if ($condition) {
            $sql .= " WHERE $condition"; //SELECT * FROM view_product WHERE name LIKE '%abc%'  AND create_date='2020-08-07'
        }


        if ($sort) {
            //SELECT * FROM view_product WHERE name LIKE '%abc%'  AND create_date='2020-08-07' ORDER BY name asc, created_date desc
            $sql .= " $sort";
        }

        if ($limit) {
            $sql .= " $limit";
            //SELECT * FROM view_product WHERE name LIKE '%abc%'  AND create_date='2020-08-07' ORDER BY name asc, created_date desc LIMIT 20, 10
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = new Order(
                    $row['OrderID'],
                    $row['CustomerName'],
                    $row['Phone'],
                    $row['Address'],
                    $row['CreatedTime'],
                    $row['Status'],
                    $row['ModifiedTime'],
                    $row['ProductID'],
                    $row['Quantity'],
                    $row['Amount'],
                    $row['Note'],
                    $row['RegisterCode']
                );
                $orders[] = $order;
            }
        }

        return $orders;
    }

    // $array_conds: lấy dịch vụ dựa theo cột
    // $array_sorts: sắp xếp tăng hay giảm
    // $page: trang thứ mấy
    // $qty_per_page: số lượng sản phẩm mỗi trang
    function getBy($array_conds = array(), $array_sorts = array(), $page = null, $qty_per_page = null)
    {
        if ($page) {
            $page_index = $page - 1;
        }


        if (count($array_conds) == 3) {
            // $condition = implode(" AND ", $array_conds);
            $condition = '(' . "$array_conds[0]" . ')' . " AND " . '(' . "$array_conds[1]" . ')' . " AND " . '(' . "$array_conds[2]" . ')';
        }
        if (count($array_conds) == 2) {
            // $condition = implode(" AND ", $array_conds);
            $condition = '(' . "$array_conds[0]" . ')' . " AND " . '(' . "$array_conds[1]" . ')';
        }
        if (count($array_conds) == 1) {
            // $condition = implode(" AND ", $array_conds);
            $condition = '(' . "$array_conds[0]" . ')';
        }

        $condition = "$condition" . ' ORDER BY ModifiedTime DESC';

        $temp = array();
        foreach ($array_sorts as $key => $sort) {
            $temp[] = "$key $sort";
        }
        $sort = null;

        if (count($array_sorts)) {
            //name asc
            //created_date desc 
            //=> ORDER BY name asc, created_date desc 
            $sort = "ORDER BY " . implode(" , ", $temp);
        }

        $limit = null;
        //Trang 3, lấy 3 phần tử
        //LIMIT 3, 1
        if ($qty_per_page) {
            $start = $page_index * $qty_per_page;
            $limit = "LIMIT $start, $qty_per_page";
        }
        return $this->fetchAll($condition, $sort, $limit);
    }
}