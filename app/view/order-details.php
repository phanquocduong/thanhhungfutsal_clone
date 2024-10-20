<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="order-details-container">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-8">
                <div class="order-head">
                    <a href="index.php?page=account" class="back-account-link">
                        <i class="back-account-link__icon fa-solid fa-chevron-left"></i>
                        Trở về tài khoản
                    </a>
                    <h3 class="order-head__title">Chi tiết đơn hàng #<?=$data['order']['madh']?></h3>
                    <?php 
                        $originalDate = $data['order']['ngaydathang'];
                        $date = new DateTime($originalDate);
                        $formatDate = $date->format('d/m/Y');
                        $formatTime = $date->format('H:i');
                    ?>
                    <span class="order-head__date">Ngày <?=$formatDate?>, lúc <?=$formatTime?></span>
                    <?php
                        $status = $data['order']['trangthai'];
                        switch ($status) {
                            case 'Chờ xác nhận':
                            case 'Chờ lấy hàng':
                            case 'Chờ giao hàng':
                                $statusClass = 'order-waiting';
                                break;
                            case 'Đã giao':
                                $statusClass = 'order-success';
                                break;
                            case 'Đã hủy':
                            case 'Trả hàng':
                                $statusClass = 'order-cancel';
                                break;
                            default:
                                $statusClass = '';
                                break;
                        }
                    ?>
                        <span class="order-head__status <?=$statusClass?>"><?=$data['order']['trangthai']?></span>
                </div>
            </div>
        </div>
        <div class="grid__row">
            <div class="grid__column-8">
                <div class="order-details">
                    <table class="order-details-table">
                        <thead>
                            <tr>
                                <th class="order-details-table__heading">Sản phẩm</th>
                                <th class="order-details-table__heading">Mã sản phẩm</th>
                                <th class="order-details-table__heading">Đơn giá</th>
                                <th class="order-details-table__heading">Số lượng</th>
                                <th class="order-details-table__heading">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $grandTotal = 0;
                                foreach ($data['order-details'] as $item): 
                                    $itemTotal = $item['dongia'] * $item['soluong'];
                                    $grandTotal += $itemTotal;
                            ?>
                                    <tr>
                                        <td class="order-details-table__body">
                                            <a href="" class="product-details-link"><?=$item['tensp']?> - <?=$item['kichthuoc']?></a>
                                        </td>
                                        <td class="order-details-table__body">#<?=$item['masp']?></td>
                                        <td class="order-details-table__body"><?=number_format($item['dongia'])?>đ</td>
                                        <td class="order-details-table__body"><?=$item['soluong']?></td>
                                        <td class="order-details-table__body"><?=number_format($itemTotal)?>đ</td>
                                    </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="total-title">Tổng tiền</td>
                                <td colspan="4" class="total-value"><?=number_format($grandTotal)?>đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grid__column-4">
                <div class="order-address">
                    <div class="order-address__title">Địa chỉ thanh toán</div>
                    <div class="order-address__content">
                        <div class="detail-item">
                            <span class="detail-key">Họ tên:</span>
                            <span class="detail-value"><?=$data['order']['hotenkh']?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-key">Điện thoại:</span>
                            <span class="detail-value"><?=$data['order']['sodienthoai']?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-key">Địa chỉ:</span>
                            <span class="detail-value"><?=$data['order']['diachi']?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>