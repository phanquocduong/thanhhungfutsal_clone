<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Đơn hàng</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-update-order-status&id=<?=$data['order']['madh']?>" method="POST" enctype="multipart/form-data">
                                    <label>Trạng thái</label> 
                                    <select name="status" class="form-control">
                                        <option value="Chờ xác nhận" <?=$data['order']['trangthai'] == "Chờ xác nhận" ? 'selected' : ''?>>Chờ xác nhận</option>
                                        <option value="Chờ lấy hàng" <?=$data['order']['trangthai'] == "Chờ lấy hàng" ? 'selected' : ''?>>Chờ lấy hàng</option>
                                        <option value="Chờ giao hàng" <?=$data['order']['trangthai'] == "Chờ giao hàng" ? 'selected' : ''?>>Chờ giao hàng</option>
                                        <option value="Đã giao" <?=$data['order']['trangthai'] == "Đã giao" ? 'selected' : ''?>>Đã giao</option>
                                        <option value="Đã hủy" <?=$data['order']['trangthai'] == "Đã hủy" ? 'selected' : ''?>>Đã hủy</option>
                                        <option value="Trả hàng" <?=$data['order']['trangthai'] == "Trả hàng" ? 'selected' : ''?>>Trả hàng</option>
                                    </select>
                                    <br>
                                    <button type="submit" name="submit">Cập nhật trạng thái</button>
                                    <br> <br>
                                    <label>Mã khách hàng</label>
                                    <input type="number" class="form-control" value="<?=$data['order']['makh']?>" readonly> 
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" value="<?=$data['order']['hotenkh']?>" readonly> 
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?=$data['order']['email']?>" readonly> 
                                    <label>Tổng tiền</label>
                                    <input type="text" class="form-control" value="<?=number_format($data['order']['tongtien'])?>đ" readonly> 
                                    <label>Phương thức thanh toán</label>
                                    <input type="text" class="form-control" value="<?=$data['order']['phuongthucthanhtoan']?>" readonly> 
                                    <label>Số điện thoại</label>
                                    <input type="tel" class="form-control" value="<?=$data['order']['sodienthoai']?>" readonly> 
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" value="<?=$data['order']['diachi']?>" readonly> 
                                    <label>Ngày đặt hàng</label>
                                    <input type="text" class="form-control" value="<?=$data['order']['ngaydathang']?>" readonly> 
                                </form>
                            </div>
                            <div class="header">
                                <h4 class="title">Chi tiết đơn hàng</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã SP</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Kích thước</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['orderDetails'] as $item): ?>
                                            <tr>
                                                <td><?=$item['masp']?></td>
                                                <td><?=$item['tensp']?></td>
                                                <td><img src="../public/upload/<?=$item['anhsp']?>" alt="" id="image" height="80px"></td>
                                                <td><?=$item['kichthuoc']?></td>
                                                <td><?=$item['soluong']?></td>
                                                <td><?=number_format($item['dongia'])?>đ</td>
                                                <td><?=number_format($item['dongia'] * $item['soluong'])?>đ</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>