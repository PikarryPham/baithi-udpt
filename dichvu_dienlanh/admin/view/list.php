<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../admin/public/css/orders-management-admin.css" />
    <title>Orders Management</title>
</head>

<body>
    <div id="admin-container">
        <div id="sidebar-menu">
            <div class="header-admin">
                <div class="admin-logo">Admin</div>
                <div class="avatar">
                    <img src="../../admin/public/assest/images/147144.png" alt="" />
                </div>
            </div>
            <div id="drop-menu">
                <div class="menu-item">
                    <a href="#"> Dashboard </a>
                </div>

                <div class="menu-item active">
                    <a href="/admin/?c=dashboard&a=list"> Danh sách đặt hàng </a>
                </div>

                <div class="menu-item">
                    <a href=""> Danh sách trạng thái </a>
                </div>

                <div class="menu-item">
                    <a href=""> Cài đặt </a>
                </div>

                <div class="menu-item">
                    <a href=""> Đăng xuất </a>
                </div>
            </div>
        </div>
        <div id="admin-content">
            <div class="admin-content-header">Danh sách đặt hàng</div>
            <div class="admin-content-body dashboard">
                <div class="text-filter">Bộ lọc</div>

                <form action="" id="filter-form">
                    <div class="filters">
                        <div class="filter-item">
                            <label for="">Lọc theo thời gian đặt hàng</label>
                            <div class="date-range-picker">
                                <input type="date" name="start-day" class="start-day" />
                                <span>&nbsp; đến &nbsp;</span>
                                <input type="date" name="end-day" class="end-day" />
                            </div>
                        </div>

                        <div class="filter-item">
                            <label for=""> Lọc theo trạng thái </label>
                            <select name="status" id="">
                                <option value="">Trạng thái</option>
                                <option value="DAKHOITAO">Đã khởi tạo</option>
                                <option value="DAXACNHAN">Đã xác nhận</option>
                                <option value="DANGTIENHANH">Đang tiến hành</option>
                                <option value="HOANTAT">Hoàn tất</option>
                                <option value="HUY">Hủy</option>
                            </select>
                        </div>

                        <div class="filter-item">
                            <label for=""> Tìm kiếm </label>
                            <div class="search-container">
                                <input type="text" placeholder="Nhập từ khóa !" name="order_code" />
                                <div class="search-icon">
                                    <img src="../../admin/public/assest/icons/search.png" alt="" width="20px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="table-container">
                    <div class="tbl-header">
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã đăng kí</th>
                                    <th>Tên dịch vụ</th>
                                    <th>Tên khách hàng</th>
                                    <th>SĐT</th>
                                    <th>Địa chỉ</th>
                                    <th>Thời gian đặt hàng</th>
                                    <th>Thời gian kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Lựa chọn</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tbl-content">
                        <table cellpadding="0" cellspacing="0">
                            <tbody id="tbody-order-table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="admin-content-footer">
                <div class="paginations">

                </div>
            </div>
        </div>
    </div>
</body>
<script src="../../admin/public/js/order-management.js"></script>

</html>