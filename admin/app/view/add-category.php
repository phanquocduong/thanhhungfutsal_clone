<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm danh mục</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="index.php?page=handle-add-category" method="POST" enctype="multipart/form-data">
                                    <label for="name">Tên danh mục</label>
                                    <input required type="text" name="name" id="name" class="form-control"> 
                                    <label for="image">Ảnh danh mục</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <button type="submit" name="submit">Thêm danh mục</button>
                                </form>
                            </div>
                        </div>
                    </div>