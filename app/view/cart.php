<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="cart-container">
    <div class="grid">
        <div class="cart-wrap">
            <?php 
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): 
                    $total = 0;
                    $i = 0;
            ?>
                <div class="grid__row">
                    <div class="grid__column-8">
                        <div class="cart-body-left">
                            <div class="cart-body-left__heading">
                                <div class="grid__row">
                                    <div class="grid__column-1"></div>
                                    <div class="grid__column-11">
                                        <div class="grid__row">
                                            <div class="grid__column-5">Sản phẩm</div>
                                            <div class="grid__column-2">Đơn giá</div>
                                            <div class="grid__column-3">Số lượng</div>
                                            <div class="grid__column-2">Thành tiền</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-body-left__content">
                                <?php
                                    foreach ($_SESSION['cart'] as $item):
                                        $tt = $item['price'] * $item['quantity'];
                                        $total += $tt
                                ?>
                                    <div class="grid__row cart-row">
                                        <div class="grid__column-1">
                                            <a href="#" onclick="deleteProduct(<?=$i?>)" class="delete-item">
                                                <i class="delete-item__icon fa-solid fa-x"></i>
                                            </a>
                                        </div>
                                        <div class="grid__column-11">
                                            <div class="grid__row">
                                                <div class="grid__column-2">
                                                    <a href="index.php?page=detail&id=<?=$item['id']?>" class="product-link">
                                                        <img src="public/upload/<?=$item['img']?>" alt="" class="product-link__img">
                                                    </a>
                                                </div>
                                                <div class="grid__column-3">
                                                    <a href="index.php?page=detail&id=<?=$item['id']?>" class="product-link">
                                                        <h5 class="product-link__title"><?=$item['name']?></h5>
                                                    </a>
                                                    <div class="product-classify">
                                                        <span class="product-classify__title">Mã SP: <?=$item['id']?></span>
                                                        <span class="product-classify__title">Size: <?=$item['size']?></span>
                                                    </div>
                                                </div>
                                                <div class="grid__column-2">
                                                    <span class="product-price"><?=number_format($item['price'])?>đ</span>
                                                </div>
                                                <div class="grid__column-3">
                                                    <form action="index.php?page=handle-updatecart" method="POST" class="quantity-form">
                                                        <input type="hidden" name="index" value="<?=$i?>">
                                                        <div class="quantity-wrapper">
                                                            <button type="button" onclick="decreaseQuantityInCart(this)" class="quantity-minus">-</button>
                                                            <input type="text" name="quantity" class="quantity" value="<?=$item['quantity']?>">
                                                            <button type="button" onclick="increaseQuantityInCart(this)" class="quantity-plus">+</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="grid__column-2">
                                                    <span class="line-item-total" data-index="<?=$i?>"><?=number_format($tt)?>đ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="background-color: transparent; height: 50px; width: 100%;"></div>
                                    </div>
                                <?php 
                                    $i++;
                                    endforeach;
                                ?>
                            </div>

                            <div class="cart-body-left__footer">
                                <div class="grid__row">
                                    <div class="grid__column-1"></div>
                                    <div class="grid__column-11">
                                        <a href="index.php?page=allproducts" class="continue-shopping">
                                            <i class="fa-solid fa-angle-left"></i>
                                            TIẾP TỤC MUA SẮM
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__column-4">
                        <div class="cart-body-right">
                            <div class="cart-total">
                                <label for="" class="cart-total__label">Thành tiền</label>
                                <span class="cart-total__price"><?=number_format($total)?>đ</span>
                            </div>
                            <a class="payment-link" href="index.php?page=payment">
                                <button class="payment-link__btn">Thanh toán</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="cart-empty">
                    <h2 class="cart-empty__title">Giỏ hàng của bạn đang trống!</h2>
                    <a href="index.php?page=allproducts" class="continue-buy__btn">Tiếp tục mua hàng</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>