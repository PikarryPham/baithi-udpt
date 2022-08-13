<?php
class DashboardController
{
	function list()
	{
		// var_dump($_GET);
		// $orderRepository = new OrderRepository();
		// $from_date = (!empty($_GET["from_date"]) ? $_GET["from_date"] : date("Y-m-d")) . " 00:00:00";
		// $to_date = (!empty($_GET["to_date"]) ? $_GET["to_date"] : date("Y-m-d")) . " 23:59:59";

		// $conds = [
		// 	"created_date" => [
		// 		"type" => "BETWEEN",
		// 		"val" => "'$from_date' AND '$to_date'",
		// 	]
		// ];

		//SELECT * order WHERE created_date BETWEEN '2020-01-01' AND '2020-12-30'

		// $orders = $orderRepository->getAll();
		// header('Content-Type: application/json; charset=utf-8');

		require "view/list.php";
	}

	function json()
	{
		// var_dump($_GET);
		$orderRepository = new OrderRepository();
		// $from_date = (!empty($_GET["from_date"]) ? $_GET["from_date"] : date("Y-m-d")) . " 00:00:00";
		// $to_date = (!empty($_GET["to_date"]) ? $_GET["to_date"] : date("Y-m-d")) . " 23:59:59";

		// $conds = [
		// 	"created_date" => [
		// 		"type" => "BETWEEN",
		// 		"val" => "'$from_date' AND '$to_date'",
		// 	]
		// ];

		//SELECT * order WHERE created_date BETWEEN '2020-01-01' AND '2020-12-30'
		$orders = $orderRepository->getAll();
		$as = [];
		foreach ($orders as $order) {
			$serviceRepository = new ServiceRepository;
			$service = $serviceRepository->find($order->MaDV);
			$a["MaDH"] = $order->MaDH;
			$a["TenKH"] = $order->TenKH;
			$a["DienThoai"] = $order->DienThoai;
			$a["DiaChi"] = $order->DiaChi;
			$a["ThoiGianBD"] = $order->ThoiGianBD;
			$a["TrangThai"] = $order->TrangThai;
			$a["ThoiGianKT"] = $order->ThoiGianKT;
			$a["TenDV"] = $service->TenDV;
			$a["SoLuong"] = $order->SoLuong;
			$a["ThanhTien"] = $order->ThanhTien;
			$a["GhiChu"] = $order->GhiChu;
			$a["MaDangKy"] = $order->MaDangKy;
			$as[] = $a;
		}

		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($as);
	}

	function getByRangeDate()
	{
		// echo ($_GET["from_date"]);
		// echo ($_GET["to_date"]);
		$from_date = $_GET["from_date"] ?? null;
		$from_date = strtotime($from_date);
		$from_date = date("Y-m-d", $from_date);

		$to_date = $_GET["to_date"] ?? null;
		$to_date = strtotime($to_date);
		$to_date = date("Y-m-d", $to_date);

		// echo ($to_date);
		// echo ($from_date);
		$conds = "ThoiGianBD BETWEEN '$from_date' AND '$to_date'";

		// if ($from_date | $to_date) {
		// 	$start = $from_date;
		// 	$end = $to_date;
		// 	$conds = [
		// 		"ThoiGianBD" => [
		// 			"type" => "BETWEEN",
		// 			"val" => "'$start' AND '$end'"
		// 		]
		// 	];
		// if ($end == null) {
		// 	$conds = [
		// 		"ThoiGianBD" => [
		// 			"type" => ">=",
		// 			"val" => $start
		// 		]
		// 	];
		// } 

		// } //SELECT * ... WHERE ThoiGianBD BETWEEN $start AND $end
		$orderRepository = new OrderRepository;
		$orders = $orderRepository->getByCond($conds);
		echo json_encode($orders);
	}

	function getAll()
	{
		$orderRepository = new orderRepository();
		// constant('ITEM_PER_PAGE', 3);
		// $item_per_page = ITEM_PER_PAGE;
		$item_per_page = 3;
		$page = $_GET["page"] ?? 1;
		$conds = [];
		$sorts = [];
		//toán tử 3 ngôi thông thường
		// $category_id = !empty($_GET["category_id"]) ? $_GET["category_id"] : null;

		//toán tử 3 ngôi rút gọn
		$TrangThai = $_GET["TrangThai"] ?? null;
		if ($TrangThai) {
			$cond = "TrangThai='$TrangThai'";
			$conds[] = $cond;
		}


		//SELECT * order WHERE created_date BETWEEN '2020-01-01' AND '2020-12-30'
		$from_date = $_GET["from_date"] ?? null;
		$from_date = strtotime($from_date);
		$from_date = date("Y-m-d", $from_date);

		$to_date = $_GET["to_date"] ?? null;
		$to_date = strtotime($to_date);
		$to_date = date("Y-m-d", $to_date);

		if ($_GET["from_date"] && $_GET["to_date"]) {
			$cond = "ThoiGianBD BETWEEN '$from_date' AND '$to_date'";
			$conds[] = $cond;
		}
		//SELECT * ... WHERE ThoiGianBD BETWEEN $start AND $end

		$sort = $_GET["sort"] ?? null;
		//$sort gửi lên ThoiGianBD-date
		if ($sort) {
			$tmp = explode("-", $sort);
			$first = $tmp[0];
			$second = $tmp[1];
			$mapCol = ["ThoiGianBD" => "ASC"];

			$column = $mapCol[$first];
			$order = $second;
			$sorts = [$column => $order];
		}

		$search = $_GET["search"] ?? null;
		$cond = "TenKH LIKE '%$search%' || DienThoai LIKE '%$search%'";
		$conds[] = $cond;


		$orders = $orderRepository->getBy($conds, $sorts, $page, $item_per_page);
		$as = [];
		foreach ($orders as $order) {
			$serviceRepository = new ServiceRepository;
			$service = $serviceRepository->find($order->MaDV);
			$a["MaDH"] = $order->MaDH;
			$a["TenKH"] = $order->TenKH;
			$a["DienThoai"] = $order->DienThoai;
			$a["DiaChi"] = $order->DiaChi;
			$a["ThoiGianBD"] = $order->ThoiGianBD;
			$a["TrangThai"] = $order->TrangThai;
			$a["ThoiGianKT"] = $order->ThoiGianKT;
			$a["TenDV"] = $service->TenDV;
			$a["SoLuong"] = $order->SoLuong;
			$a["ThanhTien"] = $order->ThanhTien;
			$a["GhiChu"] = $order->GhiChu;
			$a["MaDangKy"] = $order->MaDangKy;
			$as[] = $a;
		}

		$totalOrders = $orderRepository->getBy($conds, $sorts);

		// echo json_encode(count($totalOrders));


		$pageNumber = ceil(count($totalOrders) / $item_per_page);
		// echo json_encode($pageNumber);
		// Var_dump($pageNumber);


		$aray_json = [];
		$aray_json = [
			'orders' => $as,
			'total_order' => count($totalOrders),
			'total_page' => $pageNumber
		];
		// $aray_json['orders'] = $as;
		// $aray_json['total_order'] = $totalOrders;
		// $aray_json['total_page'] = $pageNumber;

		// echo json_encode($aray_json);
		echo json_encode($as);
		// var_dump($aray_json);


		// include "view/list.php";
	}


	function edit()
	{
		$orderRepository = new OrderRepository();

		$MaDH = $_GET['MaDH'] ?? null;
		if ($MaDH) {
			$orders = $orderRepository->find($MaDH);
		}
		$order = current($orders);
		// var_dump($order);


		// echo ($order->MaDV);

		// else {
		// 	$orders = $orderRepository->getAll();
		// }
		$serviceRepository = new ServiceRepository;
		$service = $serviceRepository->find($order->MaDV);

		// var_dump($order);
		include "view/edit.php";
	}

	function update()
	{
		// var_dump($_POST);
		$MaDH = $_POST['MaDH'];
		$TrangThai = $_POST['TrangThai'];
		// $TenKH = $_POST['TenKH'];
		// $DienThoai = $_POST['DienThoai'];
		// $DiaChi = $_POST['DiaChi'];
		// $MaDV = $_POST['MaDV'];
		// $SoLuong = $_POST['SoLuong'];
		// $price_of_unit = $_POST['price_of_unit'];
		// $GhiChu = $_POST['GhiChu'];
		// $ThanhTien = $_POST['ThanhTien'];
		// $ThoiGianKT = date("Y-m-d H:m:s");

		$orderRepository = new OrderRepository();
		$orders = $orderRepository->find($MaDH);
		$order = current($orders);

		$order->TrangThai = $TrangThai;
		if ($TrangThai == 'HOANTAT') {
			$order->ThoiGianKT = date("Y-m-d H:m:s");
		} else {
			$order->ThoiGianKT = null;
		}
		if ($TrangThai == 'HUY') {
			$orderRepository = new OrderRepository();
			$orders = $orderRepository->find($MaDH);
			$order = current($orders);

			$TrangThai = $order->TrangThai;

			if ($orderRepository->destroy($MaDH)) {
				$_SESSION['success'] = 'Bạn đã hủy đơn hàng thành công';

				header('location:/admin/?c=dashboard&a=list');
				// return true;
			} else {
				$_SESSION['error'] = 'Bạn không thể hủy đơn hàng !';
				header('location:/admin/?c=dashboard&a=list');
				// return false;
			}
		}
		// $ThoiGianKT = date("Y-m-d H:m:s");

		// $order->TenKH = $TenKH;
		// $order->DienThoai = $DienThoai;
		// $order->DiaChi = $DiaChi;
		// $order->MaDV = $MaDV;
		// $order->SoLuong = $SoLuong;
		// $order->GhiChu = $GhiChu;
		// $order->ThanhTien = $ThanhTien;

		if ($orderRepository->update_status($order)) {
			$_SESSION['success'] = 'Bạn đã cập nhật trạng thái thành công';
			// echo ($_SESSION['success']);

			// return true;
		} else {
			// return false;
			$_SESSION['error'] = 'Cập nhật trạng thái thất bại';
		}
		header("location:/admin/?c=dashboard&a=list");

		// header('location:/?c=order&a=edit');
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
		$order = $orderRepository->save($data);
		if ($order) {
			echo ('Thành công');
		} else {
			echo ('Thất bại');
		}

		function display()
		{
		}



		// header("location:?c=order&a=save");
		// exit;
	}
}