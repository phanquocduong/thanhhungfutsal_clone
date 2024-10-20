<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm người dùng</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-add-user" method="POST" enctype="multipart/form-data">
                                    <label>Họ</label>
                                    <input required type="text" name="last-name" class="form-control"> 
                                    <label>Tên</label>
                                    <input required type="text" name="first-name" class="form-control"> 
                                    <label>Email</label>
                                    <input required type="email" name="email" class="form-control"> 
                                    <label>Mật khẩu</label>
                                    <input required type="password" name="password" class="form-control"> 
                                    <label>Số điện thoại</label>
                                    <input required type="tel" name="tel" class="form-control"> 
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" class="form-control"> 
                                    <label>Phân quyền</label>
                                    <select name="role" class="form-control">
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                    <br>
                                    <button type="submit" name="submit">Thêm người dùng</button>
                                </form>
                            </div>
                        </div>
                    </div>