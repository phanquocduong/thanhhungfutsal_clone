<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm sản phẩm</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-add-product" method="POST" enctype="multipart/form-data">
                                    <label>Mã danh mục</label>
                                    <select name="cate" id="cate" class="form-control">
                                        <?php foreach($data as $item): ?>
                                            <option value="<?=$item['madm']?>"><?=$item['tendm']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" name="name" class="form-control"> 
                                    <label>Giá hiện tại</label>
                                    <input required type="number" name="priceCurrent" class="form-control">
                                    <label>Giá cũ</label>
                                    <input required type="number" name="priceOld" class="form-control">
                                    <label>Phần trăm giảm giá</label>
                                    <input required type="number" name="percent" class="form-control">
                                    <label>Ảnh sản phẩm</label>
                                    <input required type="file" name="imageMain" class="form-control">
                                    <label>Mới ra mắt?</label>
                                    <select name="new" class="form-control">
                                        <option value="1">Là sản phẩm mới ra mắt</option>
                                        <option value="0">Không phải sản phẩm mới ra mắt</option>
                                    </select>
                                    <label>Kích thước</label>
                                    <input required type="text" name="size" class="form-control">
                                    <label>Mô tả ngắn</label>
                                    <input required type="text" name="short-desc" class="form-control">
                                    <label>Mô tả chi tiết</label>
                                    <input required type="text" name="desc-details" class="form-control">
                                    <label>Ảnh mô tả 1</label>
                                    <input type="file" name="imageExtra1" class="form-control">
                                    <input type="file" name="imageExtra2" class="form-control">
                                    <input type="file" name="imageExtra3" class="form-control">
                                    <label>Ảnh mô tả 2</label>
                                    <input type="file" name="imageExtra4" class="form-control">
                                    <input type="file" name="imageExtra5" class="form-control">
                                    <input type="file" name="imageExtra6" class="form-control">
                                    <button type="submit" name="submit">Thêm sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    </div>