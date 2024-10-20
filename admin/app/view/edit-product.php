<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chỉnh sửa sản phẩm</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-edit-product&id=<?=$data['product']['masp']?>" method="POST" enctype="multipart/form-data">
                                    <label>Mã danh mục</label>
                                    <select name="cate" class="form-control">
                                        <?php foreach($data['category'] as $item): ?>
                                            <option value="<?=$item['madm']?>" <?=$item['madm'] == $data['product']['madm'] ? 'selected' : ''?>><?=$item['tendm']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="<?=$data['product']['tensp']?>"> 
                                    <label>Giá hiện tại</label>
                                    <input type="number" name="priceCurrent" class="form-control" value="<?=$data['product']['giahientai']?>">
                                    <label>Giá cũ</label>
                                    <input type="number" name="priceOld" class="form-control" value="<?=$data['product']['giacu']?>">
                                    <label>Phần trăm giảm giá</label>
                                    <input type="number" name="percent" class="form-control" value="<?=$data['product']['phantramgiamgia']?>">
                                    <label>Ảnh sản phẩm</label>
                                    <img src="../public/upload/<?=$data['product']['anhsp']?>" style="width:100px; display:block;"><br>
                                    <input type="file" name="imageMain" class="form-control">
                                    <label>Mới ra mắt?</label>
                                    <select name="role" class="form-control">
                                        <option value="1" <?= $data['product']['moiramat'] == 1 ? 'selected' : '' ?>>Là sản phẩm mới ra mắt</option>
                                        <option value="0" <?= $data['product']['moiramat'] == 0 ? 'selected' : '' ?>>Không phải sản phẩm mới ra mắt</option>
                                    </select>
                                    <label>Kích thước</label>
                                    <input type="text" name="size" class="form-control" value="<?=$data['product']['motangan']?>">
                                    <label>Mô tả ngắn</label>
                                    <input type="text" name="short-desc" class="form-control" value="<?=$data['product']['motangan']?>">
                                    <label>Mô tả chi tiết</label>
                                    <input type="text" name="desc-details" class="form-control" value="<?=$data['product']['motachitiet']?>">
                                    <label>Ảnh mô tả 1</label>
                                    <div class="image-extra__box" style="display:flex;">
                                        <?php 
                                            if ($data['product']['anhmota1'] != ''): 
                                                $array = explode(",", $data['product']['anhmota1']);
                                                foreach ($array as $item):
                                        ?>      
                                                    <img src="../public/upload/<?=$item?>" style="width:100px; display:block; margin: 0 0 10px 20px;"><br>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </div>
                                    <input type="file" name="imageExtra1" class="form-control">
                                    <input type="file" name="imageExtra2" class="form-control">
                                    <input type="file" name="imageExtra3" class="form-control">
                                    <label>Ảnh mô tả 2</label>
                                    <div class="image-extra__box" style="display:flex;">
                                        <?php 
                                            if ($data['product']['anhmota2'] != ''): 
                                                $array = explode(",", $data['product']['anhmota2']);
                                                foreach ($array as $item):
                                        ?>      
                                                    <img src="../public/upload/<?=$item?>" style="width:100px; display:block; margin: 0 0 10px 20px;"><br>
                                        <?php
                                                endforeach;
                                            endif;
                                        ?>
                                    </div>
                                    <input type="file" name="imageExtra4" class="form-control">
                                    <input type="file" name="imageExtra5" class="form-control">
                                    <input type="file" name="imageExtra6" class="form-control">
                                    <button type="submit" name="submit">Lưu thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>