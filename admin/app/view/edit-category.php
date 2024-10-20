<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Chỉnh sửa danh mục</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-edit-category&id=<?=$data['madm']?>" method="POST" enctype="multipart/form-data">
                                    <label for="">Tên danh mục</label>
                                    <input required type="text" name="name" id="name" class="form-control" value="<?=$data['tendm']?>"> 
                                    <label for="">Ảnh danh mục</label>
                                    <img src="../public/upload/categories/<?=$data['anhdm']?>" style="width:100px; display:block;"><br>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <button type="submit" name="submit">Lưu thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>