<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="grid">
    <div class="grid__row">
        <div class="grid__column-7">
            <div class="main-payment">
                <h1 class="main-payment__header">Giày đá banh chính hãng</h1>
                <div class="main-payment__content">
                    <h2 class="section-title">Thông tin giao hàng</h2>
                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
                        <div class="customer-info">
                            <i class="customer-info__icon fa-solid fa-user-large"></i>
                            <div class="customer-info__body">
                                <p class="customer-info__body-title"><?=$_SESSION['user']['ho'] . ' ' . $_SESSION['user']['ten']?> (<?=$_SESSION['user']['email']?>)</p>
                                <a href="index.php?page=logout" class="customer-info__body-logout">Đăng xuất</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <p class="section-content">
                            Bạn đã có tài khoản?
                            <a href="index.php?page=login" class="section-content__login-link">Đăng nhập</a>
                        </p>
                    <?php endif; ?>
                    <form action="index.php?page=handlepayment" method="POST">
                        <input required name="fullname" type="text" class="form-name-control" placeholder="Họ và tên" value="<?=(isset($_SESSION['user']) && !empty($_SESSION['user'])) ? $_SESSION['user']['ho'] . ' ' . $_SESSION['user']['ten'] : ''?>">
                        <div class="payment-form-group">
                            <input required name="email" type="email" class="form-email-control" placeholder="Email" value="<?=(isset($_SESSION['user']) && !empty($_SESSION['user'])) ? $_SESSION['user']['email'] : ''?>">
                            <input required name="tel" type="tel" class="form-tel-control" placeholder="Số điện thoại" value="<?=(isset($_SESSION['user']) && !empty($_SESSION['user'])) ? $_SESSION['user']['sodienthoai'] : ''?>">
                        </div>
                        <div class="form-address-box">
                            <input required name="address" type="text" class="form-address-control" placeholder="Địa chỉ" value="<?=(isset($_SESSION['user']) && !empty($_SESSION['user'])) ? $_SESSION['user']['diachi'] : ''?>">
                        </div>
                        <h2 class="section-title">Phương thức thanh toán</h2>
                        <label for="cod" class="method-label">
                            <input required id="cod" type="radio" name="method" class="form-method-control" value="Tiền mặt">
                            <div class="methods-content">
                                <img src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=6" alt="" class="methods-content__img">
                                <span class="methods-content__title">Thanh toán khi giao hàng (COD)</span>
                            </div>
                        </label>
                        <label for="transfer" class="method-label">
                            <input required id="transfer" type="radio" name="method" class="form-method-control" value="Chuyển khoản">
                            <div class="methods-content">
                                <img src="https://hstatic.net/0/0/global/design/seller/image/payment/other.svg?v=6" alt="" class="methods-content__img">
                                <span class="methods-content__title">Chuyển khoản qua ngân hàng</span>
                            </div>
                        </label>
                        <label for="fundiin" class="method-label">
                            <input required id="fundiin" type="radio" name="method" class="form-method-control" value="Fundiin">
                            <div class="methods-content">
                                <img src="https://assets.fundiin.vn/merchant/logo_image.png?20230102" alt="" class="methods-content__img">
                                <span class="methods-content__title">
                                    Fundiin - Mua trả sau 0% lãi
                                    <img src="https://assets.fundiin.vn/merchant/promo_50percent.png" alt="" class="methods-content__title-img">
                                </span>
                            </div>
                        </label>
                        <div class="step-footer">
                            <a href="index.php?page=cart" class="step-footer__previous-link">Giỏ hàng</a>
                            <?php 
                                $grandTotal = 0;
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    $grandTotal = array_reduce($_SESSION['cart'], function($total, $item) {return $total + ($item['quantity'] * $item['price']);}, 0);
                                } else {
                                    $grandTotal = $_SESSION['buy-now']['price'] * $_SESSION['buy-now']['quantity'];
                                }
                            ?>
                            <input type="hidden" name="total" value="<?=$grandTotal?>">
                            <button name="submit" type="submit" class="step-footer__continue-btn">Hoàn tất đơn hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid__column-5 total-column">
            <div class="sidebar-payment">
                <?php 
                    $total = 0;
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                        foreach ($_SESSION['cart'] as $item):
                            $tt = $item['price'] * $item['quantity'];
                            $total += $tt;
                ?>
                            <div class="product-order">
                                <div class="product-order__thumbnail">
                                    <img src="public/upload/<?=$item['img']?>" alt="" class="product-order__img">
                                    <span class="product-order__quantity"><?=$item['quantity']?></span>
                                </div>
                                <div class="product-order__dsc">
                                    <span class="product-order__dsc-name"><?=$item['name']?></span>
                                    <span class="product-order__dsc-type"><?=$item['size']?></span>
                                </div>
                                <div class="product-order__price"><?=number_format($tt)?>đ</div>
                            </div>
                <?php 
                        endforeach;
                    else:
                ?>
                        <div class="product-order">
                            <div class="product-order__thumbnail">
                                <img src="public/upload/<?=$_SESSION['buy-now']['img']?>" alt="" class="product-order__img">
                                <span class="product-order__quantity"><?=$_SESSION['buy-now']['quantity']?></span>
                            </div>
                            <div class="product-order__dsc">
                                <span class="product-order__dsc-name"><?=$_SESSION['buy-now']['name']?></span>
                                <span class="product-order__dsc-type"><?=$_SESSION['buy-now']['size']?></span>
                            </div>
                            <div class="product-order__price"><?=number_format($_SESSION['buy-now']['price'] * $_SESSION['buy-now']['quantity'])?>đ</div>
                        </div>
                <?php endif; ?>
                <div class="total-payment">
                    <span class="total-payment__title">Tổng cộng</span>
                    <span class="total-payment__price">
                        <span class="total-payment__price-unit">VND</span>
                        <span class="total-payment__price-main"><?=(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) ? number_format($total) : number_format($_SESSION['buy-now']['price'] * $_SESSION['buy-now']['quantity'])?>đ</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>