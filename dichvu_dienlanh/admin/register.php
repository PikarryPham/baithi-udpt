<h1>Đăng ký tài khoản</h1>
<form action="?c=register&a=create" method="POST" class="student-create-form">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên tài khoản</label>
                    <input type="text" class="form-control" placeholder="Tên tài khoản của bạn" required name="TenTK">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" required name="MatKhau">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
</form>