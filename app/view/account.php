<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="account-container">
    <div class="grid">
        <h3 class="account-title">Tài khoản của bạn</h3>
        <div class="grid__row">
            <div class="grid__column-8">
                <div class="customer-order">
                    <table class="customer-order-table">
                        <thead>
                            <tr>
                                <th class="customer-order-table__heading">Mã đơn hàng</th>
                                <th class="customer-order-table__heading">Ngày đặt</th>
                                <th class="customer-order-table__heading">Thành tiền</th>
                                <th class="customer-order-table__heading">Vận chuyển</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data['orders'] as $item):
                                    $originalDate = $item['ngaydathang'];
                                    $date = new DateTime($originalDate);
                                    $formatDate = $date->format('d/m/Y');
                            ?>
                                    <tr>
                                        <td class="customer-order-table__body">
                                            <a href="index.php?page=order-details&id=<?=$item['madh']?>" class="order-details-link">#<?=$item['madh']?></a>
                                        </td>
                                        <td class="customer-order-table__body">
                                            <span><?=$formatDate?></span>
                                        </td>
                                        <td class="customer-order-table__body">
                                            <span><?=number_format($item['tongtien'])?>đ</span>
                                        </td>
                                        <td class="customer-order-table__body">
                                            <span><?=$item['trangthai']?></span>
                                        </td>
                                    </tr> 
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid__column-4">
                <div class="user-box">
                    <div class="user-box__title">Thông tin tài khoản</div>
                    <div class="user-box__content">
                        <div class="detail-wrap">
                            <div class="detail-item">
                                <span class="detail-key">Họ tên:</span>
                                <span class="detail-value"><?=$_SESSION['user']['ho'] . ' ' . $_SESSION['user']['ten']?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-key">Điện thoại:</span>
                                <span class="detail-value"><?=$_SESSION['user']['sodienthoai']?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-key">Email:</span>
                                <span class="detail-value"><?=$_SESSION['user']['email']?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-key">Địa chỉ:</span>
                                <span class="detail-value"><?=$_SESSION['user']['diachi']?></span>
                            </div>
                        </div>
                        <a href="index.php?page=update-account" class="update-account-link">Sửa<i class="update-account-link__icon fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>