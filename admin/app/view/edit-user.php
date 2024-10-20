<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chỉnh sửa người dùng</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-edit-user&id=<?=$data['matk']?>" method="POST" enctype="multipart/form-data">
                                    <label>Họ</label>
                                    <input required type="text" name="last-name" class="form-control" value="<?=$data['ho']?>"> 
                                    <label>Tên</label>
                                    <input required type="text" name="first-name" class="form-control" value="<?=$data['ten']?>">  
                                    <label>Email</label>
                                    <input required type="email" name="email" class="form-control" value="<?=$data['email']?>" readonly>    
                                    <label>Mật khẩu</label>
                                    <input required type="password" name="password" class="form-control" value="<?=$data['matkhau']?>"> 
                                    <label>Số điện thoại</label>
                                    <input required type="tel" name="tel" class="form-control" value="<?=$data['sodienthoai']?>"> 
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" value="<?=$data['diachi']?>"> 
                                    <label>Phân quyền</label>
                                    <select name="role" class="form-control">
                                        <option value="0" <?= $data['quyen'] == 0 ? 'selected' : '' ?>>User</option>
                                        <option value="1" <?= $data['quyen'] == 1 ? 'selected' : '' ?>>Admin</option>
                                    </select>
                                     <br>
                                    <button type="submit" name="submit">Lưu thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>