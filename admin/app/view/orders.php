<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh sách đơn hàng</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Mã</th>
                                <th>Email khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức thanh toán</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $item): ?>
                                    <tr>
                                        <td><?=$item['madh']?></td>
                                        <td><?=$item['email']?></td>
                                        <td><?=number_format($item['tongtien'])?>đ</td>
                                        <td><?=$item['phuongthucthanhtoan']?></td>
                                        <td><?=$item['sodienthoai']?></td>
                                        <td><?=$item['trangthai']?></td>
                                        <td><a href="index.php?page=order&id=<?=$item['madh']?>">Xem chi tiết</a></td>
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
                            <a href="index.php?page=orders&num=<?=$previous_page?>" class="pagination-link <?= $current_page == 1 ? 'none' : '' ?>">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </li>
                        <?php 
                            if ($numberPages > 1):
                                for ($i = 1; $i <= $numberPages; $i++): 
                        ?>
                                    <li class="pagination-item">
                                        <a href="index.php?page=orders&num=<?=$i?>" class="pagination-link <?= $i == $current_page ? 'active' : '' ?>">
                                            <?=$i?>
                                        </a>
                                    </li>
                        <?php 
                                endfor; 
                            endif;
                        ?>
                        <li class="pagination-item">
                            <a href="index.php?page=orders&num=<?=$next_page?>" class="pagination-link <?= $current_page == $numberPages ? 'none' : '' ?>">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>