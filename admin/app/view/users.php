<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh sách người dùng</h4>
                        <div>
                            <a href="index.php?page=add-user"><button type="button" class="btn btn-primary">
                                Thêm người dùng
                            </button></a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Mã</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Phân quyền</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $item): ?>
                                    <tr>
                                        <td>
                                            <?=$item['matk']?>
                                        </td>
                                        <td>
                                            <?=$item['ho'] . ' ' . $item['ten']?>
                                        </td>
                                        <td>
                                            <?=$item['email']?>
                                        </td>
                                        <td>
                                            <?=$item['quyen'] == 1 ? 'Admin' : 'User'?>
                                        </td>
                                        <td><a href="index.php?page=edit-user&id=<?=$item['matk']?>">Sửa</a> | <a onclick="deleteUser(<?=$item['matk']?>)" href="#">Xóa</a></td>
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
                            <a href="index.php?page=users&num=<?=$previous_page?>" class="pagination-link <?= $current_page == 1 ? 'none' : '' ?>">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </li>
                        <?php 
                            if ($numberPages > 1):
                                for ($i = 1; $i <= $numberPages; $i++): 
                        ?>
                                    <li class="pagination-item">
                                        <a href="index.php?page=users&num=<?=$i?>" class="pagination-link <?= $i == $current_page ? 'active' : '' ?>">
                                            <?=$i?>
                                        </a>
                                    </li>
                        <?php 
                                endfor; 
                            endif;
                        ?>
                        <li class="pagination-item">
                            <a href="index.php?page=users&num=<?=$next_page?>" class="pagination-link <?= $current_page == $numberPages ? 'none' : '' ?>">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>