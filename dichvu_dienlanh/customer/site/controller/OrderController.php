<?php
class OrderController
{
    function home()
    {
        require './site/view/home.php';
    }

    function add()
    {
        $serviceRepository = new ServiceRepository;
        $services = $serviceRepository->getAll();
        // var_dump($service);
        require './site/view/add.php';
    }

    function save()
    {
        // var_dump($_POST);
        //Create order
        $data = array();
        $data['TenKH'] = $_POST['TenKH'];
        $data['DienThoai'] = $_POST['DienThoai'];
        $data['DiaChi'] = $_POST['DiaChi'];
        $data['MaDV'] = $_POST['MaDV'];
        $data['SoLuong'] = $_POST['SoLuong'];
        $data['GhiChu'] = $_POST['GhiChu'];

        $serviceRepository = new ServiceRepository;
        $service = $serviceRepository->find($data['MaDV']);
        // var_dump($service);
        $data['ThanhTien'] = $service->DonGia * $data['SoLuong'];


        // $data['ThanhTien'] = $_POST['ThanhTien'];
        $data['ThoiGianBD'] = date("Y-m-d H:m:s");

        $orderRepository = new OrderRepository();
        $MaDH = $orderRepository->save($data);
        if ($MaDH) {
            // echo ('Thành công');
            $_SESSION['sussess'] = 'Bạn đã tạo thành công đơn hàng!';
            // echo ($MaDH);
        } else {
            $_SESSION['error'] = 'Tạo đơn hàng không thành công!';
        }
        header("location:/?c=order&a=edit&MaDH=$MaDH");
    }

    // function find()
    // {
    //     $orderRepository = new OrderRepository();

    //     $search = $_GET['search'] ?? null;
    //     if ($search) {
    //         $order = $orderRepository->find($search);
    //     } else {
    //         $orders = $orderRepository->getAll();
    //     }
    // }

    function edit()
    {
        $orderRepository = new OrderRepository();

        $MaDH = $_GET['MaDH'] ?? null;
        if ($MaDH) {
            $order = $orderRepository->find($MaDH);
            $serviceRepository = new ServiceRepository;
            $services = $serviceRepository->find($order->MaDV);
        } else {
            // $orders = $orderRepository->getAll();
        }
        header('location: /?c=order&a=edit');
        // require './site/view/edit.php';
    }

    function update()
    {
        $MaDH = $_POST['MaDH'];
        $TenKH = $_POST['TenKH'];
        $DienThoai = $_POST['DienThoai'];
        $DiaChi = $_POST['DiaChi'];
        $MaDV = $_POST['MaDV'];
        $SoLuong = $_POST['SoLuong'];
        // $price_of_unit = $_POST['price_of_unit'];
        $GhiChu = $_POST['GhiChu'];
        $ThanhTien = $_POST['ThanhTien'];
        // $ThoiGianBD = date("Y-m-d H:m:s");

        $orderRepository = new OrderRepository();
        $order = $orderRepository->find($MaDH);

        $order->MaDH = $MaDH;
        $order->TenKH = $TenKH;
        $order->DienThoai = $DienThoai;
        $order->DiaChi = $DiaChi;
        $order->MaDV = $MaDV;
        $order->SoLuong = $SoLuong;
        $order->GhiChu = $GhiChu;
        $order->ThanhTien = $ThanhTien;

        if ($orderRepository->update($order)) {
            $_SESSION['success'] = 'Bạn đã cập nhật thành công';
        } else {
            $_SESSION['error'] = 'Cập nhật lỗi';
        }
        // header('location:/?c=order&a=edit');

        header("location:/?c=order&a=edit&MaDH=$order->MaDH");
    }
    function destroy()
    {
        if (isset($_GET['MaDH'])) {
            $MaDH = $_GET['MaDH'];
            $orderRepository = new OrderRepository();
            $order = $orderRepository->find($MaDH);
            if ($order->TrangThai != 'DAKHOITAO') {
                $_SESSION['error'] = 'Bạn không thể hủy đơn hàng. Đơn hàng đang được xử lý';
                return false;
            }
            if ($orderRepository->destroy($MaDH)) {
                $_SESSION['cuccess'] = 'Bạn không đã hủy đơn hàng thành công';
                header('location:/?c=order&a=edit');
                return true;
            } else {
                header('location:/?c=order&a=edit');

                return false;
            }
        }

        // include '/?c=order';
    }
}