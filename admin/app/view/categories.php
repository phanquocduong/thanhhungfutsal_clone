<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách danh mục</h4>
                                <div>
                                    <a href="index.php?page=add-category"><button type="button" class="btn btn-primary">
                                        Thêm danh mục
                                    </button></a>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Mã</th>
                                    	<th>Tên</th>
                                    	<th>Hình ảnh</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $item): ?>
                                            <tr>
                                                <td><?=$item['madm']?></td>
                                                <td id="name"><?=$item['tendm']?></td>
                                                <td><img src="../public/upload/categories/<?=$item['anhdm']?>" alt="" id="image" height="80px"></td>
                                                <td><a href="index.php?page=edit-category&id=<?=$item['madm']?>">Sửa</a> | <a onclick="deleteCategory(<?=$item['madm']?>)" href="#">Xóa</a></td>
                                            </tr>
                                        <?php endforeach; ?> 
                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination-list">
                                <?php
                                    $current_page = isset($_GET['num']) ? (int)$_GET['num'] : 1;
                                    $previous_page = $current_page - 1;
                                    $next_page = $current_page + 1;
                                ?>
                                <li class="pagination-item">
                                    <a href="index.php?page=categories&num=<?=$previous_page?>" class="pagination-link <?= $current_page == 1 ? 'none' : '' ?>">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                </li>
                                <?php 
                                    if ($numberPages > 1):
                                        for ($i = 1; $i <= $numberPages; $i++):
                                ?>
                                            <li class="pagination-item">
                                                <a href="index.php?page=categories&num=<?=$i?>" class="pagination-link <?= $i == $current_page ? 'active' : '' ?>">
                                                    <?=$i?>
                                                </a>
                                            </li>
                                <?php 
                                        endfor; 
                                    endif;
                                ?>
                                <li class="pagination-item">
                                    <a href="index.php?page=categories&num=<?=$next_page?>" class="pagination-link <?= $current_page == $numberPages ? 'none' : '' ?>">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

        
