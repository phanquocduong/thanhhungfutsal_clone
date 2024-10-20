<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="container">
    <div class="grid">
        <div class="product-details-wrap">
            <div class="grid__row">
                <div class="grid__column-6">
                    <div class="product-images">
                        <?php if ($data['product']['anhmota1'] != ''): ?>
                            <div class="extra-images">
                                <?php 
                                    $imgArr = explode(",", $data['product']['anhmota1']);
                                    array_unshift($imgArr, $data['product']['anhsp']); 
                                    $imgArrJson = json_encode($imgArr);
                                ?>
                                <script>
                                    var imgArr = <?php echo $imgArrJson; ?>;
                                </script>
                                <div onclick="up()" class="change-img-btn">
                                    <i class="change-img-btn__icon fa-solid fa-angle-up"></i>
                                </div>
                                <?php 
                                    foreach($imgArr as $item): 
                                ?>
                                    <img onclick="changeMainImage(this)" src="public/upload/<?=$item?>" alt="" class="extra-images__item">
                                <?php 
                                    endforeach;
                                ?>
                                <div onclick="down()" class="change-img-btn swipe-down-btn">
                                    <i class="change-img-btn__icon fa-solid fa-angle-down"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="main-image-wrap <?= $data['product']['anhmota1'] == '' ? 'main-image-wrap--full-width' : ''?>">
                            <img src="public/upload/<?=$data['product']['anhsp']?>" alt="" class="main-image-item">
                            <?php if ($data['product']['giacu'] != 0): ?>
                                <div class="sale-off__tag">-<?=$data['product']['phantramgiamgia']?>%</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="grid__column-6">
                    <h1 class="product-name"><?=$data['product']['tensp']?></h1>
                    <ul class="product-type__list">
                        <li class="product-type__item">Loại: <?=$data['product']['tendm']?></li>
                        <li class="product-type__item">Mã SP: <?=$data['product']['masp']?></li>
                    </ul>
                    <div class="price-group">
                        <span class="current-price"><?=number_format($data['product']['giahientai'])?>đ</span>
                        <?php if ($data['product']['giacu'] != 0): ?>
                            <span class="old-price"><?=number_format($data['product']['giacu'])?>đ</span>
                            <div class="economical-price">
                                (Tiết kiệm <span class="economical-price__press"><?=number_format($data['product']['giacu'] - $data['product']['giahientai'])?>đ</span>)
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="fundiin-heading">
                        <span class="fundiin-heading__tile">
                            Trả sau <span class="fundiin-heading__tile-price"><?=number_format($data['product']['giahientai'] / 2)?>đ</span> x2 kỳ với
                        </span>
                        <div class="fundiin-action">
                            <img src="https://assets.fundiin.vn/merchant/logo_transparent.png" alt="" class="fundiin-action__img">
                            <a href="" class="fundiin-action__link">
                                <i class="fa-solid fa-circle-question"></i>
                            </a>
                        </div>
                    </div>
                    <div class="fundiin-panel">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66.71 66.71" width="55" height="55"><defs><style>.promo-cls-1{fill:#fff;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="promo-cls-1" d="M41.46,40.39a3.4,3.4,0,0,0-2.76,1.26,4.86,4.86,0,0,0-1,3.25,5,5,0,0,0,1,3.31,3.4,3.4,0,0,0,2.76,1.26,3.48,3.48,0,0,0,2.79-1.26,4.86,4.86,0,0,0,1.07-3.31,4.77,4.77,0,0,0-1.07-3.25A3.48,3.48,0,0,0,41.46,40.39Z"></path><path class="promo-cls-1" d="M23.89,26.77a3.51,3.51,0,0,0,2.79-1.23,4.81,4.81,0,0,0,1.07-3.28A4.91,4.91,0,0,0,26.68,19a3.47,3.47,0,0,0-2.79-1.25A3.42,3.42,0,0,0,21.12,19a5,5,0,0,0-1,3.31,4.9,4.9,0,0,0,1,3.28A3.46,3.46,0,0,0,23.89,26.77Z"></path><path class="promo-cls-1" d="M65.23,29.78,58.42,23V13.35a5.05,5.05,0,0,0-5.05-5.06H43.74L36.93,1.48a5.06,5.06,0,0,0-7.15,0L23,8.29H13.35a5.05,5.05,0,0,0-5.06,5.06V23L1.48,29.78a5.06,5.06,0,0,0,0,7.15l6.81,6.81v9.63a5.06,5.06,0,0,0,5.06,5.06H23l6.81,6.8a5,5,0,0,0,7.15,0l6.81-6.8h9.63a5.06,5.06,0,0,0,5.05-5.06V43.74l6.81-6.81A5,5,0,0,0,65.23,29.78Zm-48.62-4a9.62,9.62,0,0,1-.6-3.5,9.83,9.83,0,0,1,.6-3.53,7.15,7.15,0,0,1,4.18-4.27,8.61,8.61,0,0,1,3.15-.57,7.72,7.72,0,0,1,5.66,2.2,8.31,8.31,0,0,1,2.21,6.17,8.23,8.23,0,0,1-2.21,6.11,7.72,7.72,0,0,1-5.66,2.2A8.41,8.41,0,0,1,20.79,30a7.21,7.21,0,0,1-4.18-4.24Zm8.58,27H19.35l20.86-38.4H46Zm22-1.71a7.82,7.82,0,0,1-5.69,2.2,8.14,8.14,0,0,1-3.1-.58,7.39,7.39,0,0,1-2.5-1.62,7.27,7.27,0,0,1-1.67-2.64,9.83,9.83,0,0,1-.6-3.53,9.62,9.62,0,0,1,.6-3.5,7.18,7.18,0,0,1,4.17-4.23,8.14,8.14,0,0,1,3.1-.58,7.82,7.82,0,0,1,5.69,2.2,8.2,8.2,0,0,1,2.24,6.11A8.27,8.27,0,0,1,47.15,51.07Z"></path></g></g></svg>
                        <span class="fundiin-panel__dsc-wrap">
                            Giảm giá đến <strong class="fundiin-panel__percent-discount">100K</strong> khi thanh toán qua Fundiin.
                            <a href="" class="fundiin-panel__see-more-link">xem thêm</a>
                        </span>
                    </div>
                    <div class="size-selection">
                        <h4 class="size-selection__title">Kích thước:</h4>
                        <ul class="size-selection__list">
                            <?php
                                $array = explode(",", $data['product']['kichthuoc']);
                                foreach($array as $key => $item): 
                            ?>
                                    <li class="size-selection__item">
                                        <input onclick="updateSelectedSize('<?=$item?>')" class="size-selection__item-radio-check" type="radio" name="size" id="size_<?=$item?>" value="<?=$item?>" <?= $key == 0 ? 'checked' : '' ?>>
                                        <label for="size_<?=$item?>" class="size-selection__item-title"><?=$item?></label>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="size-dsc">
                            <h4 class="size-dsc__title">
                                <a href="" class="size-dsc__title-link">Bảng quy đổi size</a>
                                <span>|</span>
                                <a href="" class="size-dsc__title-link">Hướng dẫn đo size giày</a>
                            </h4>
                        </div>
                    </div>
                    <div class="add-basket-action">
                        <div class="quantity-selection">
                            <span class="quantity-selection__title">Số lượng:</span>
                            <div class="quantity-selection__action">
                                <input onclick="decreaseQuantityInDetail()" type="button" class="quantity-selection__action-minus" value="-">
                                <input type="text" class="quantity-selection__action-edit" value="1">
                                <input onclick="increaseQuantityInDetail()" type="button" class="quantity-selection__action-add" value="+">
                            </div>
                        </div>
                        <div class="add-basket-btn">
                            <form action="index.php?page=handle-addcart" method="POST">
                                <input type="hidden" name="masp" value="<?=$data['product']['masp']?>">
                                <input type="hidden" name="tensp" value="<?=$data['product']['tensp']?>">
                                <input type="hidden" name="anhsp" value="<?=$data['product']['anhsp']?>">
                                <input type="hidden" name="giahientai" value="<?=$data['product']['giahientai']?>">
                                <input type="hidden" name="kichthuoc" class="selected_size" value="<?=$array[0]?>">
                                <input type="hidden" name="soluong" class="selected_quantity" value="1">
                                <input class="add-basket-btn__title" type="submit" name="addtocart" value="Thêm vào giỏ">
                            </form>
                        </div>
                    </div>
                    <form action="index.php?page=handle-buy-now" method="POST">
                        <input type="hidden" name="masp" value="<?=$data['product']['masp']?>">
                        <input type="hidden" name="tensp" value="<?=$data['product']['tensp']?>">
                        <input type="hidden" name="anhsp" value="<?=$data['product']['anhsp']?>">
                        <input type="hidden" name="giahientai" value="<?=$data['product']['giahientai']?>">
                        <input type="hidden" name="kichthuoc" class="selected_size" value="<?=$array[0]?>">
                        <input type="hidden" name="soluong" class="selected_quantity" value="1">
                        <input type="submit" class="buy-now-btn" name="buy-now" value="MUA NGAY">
                    </form>
                    <div class="stores-address">
                        <h4 class="stores-address__heading">
                            <img src="https://theme.hstatic.net/200000278317/1000929405/14/logo_store.png?v=999" alt="" class="stores-address__heading-icon">
                            Có TẠI 3 CỬA HÀNG
                        </h4>
                        <ul class="stores-address__list">
                            <li class="stores-address__item">
                                <img src="https://theme.hstatic.net/200000278317/1000929405/14/icon_store.png?v=999" alt="" class="stores-address__item-icon">
                                27 Đường D52, P. 12, Q. Tân Bình, TP. HCM | Hotline: 0901 377 722
                            </li>
                            <li class="stores-address__item">
                                <img src="https://theme.hstatic.net/200000278317/1000929405/14/icon_store.png?v=999" alt="" class="stores-address__item-icon">
                                32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | HOTLINE: 0901 710 730
                            </li>
                            <li class="stores-address__item">
                                <img src="https://theme.hstatic.net/200000278317/1000929405/14/icon_store.png?v=999" alt="" class="stores-address__item-icon">
                                48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | HOTLINE: 0901 710 780
                            </li>
                        </ul>
                    </div>
                    <div class="product-policy">
                        <div class="product-policy__item">
                            <img src="https://theme.hstatic.net/200000278317/1000929405/14/pd_policy_1_img.png?v=999" alt="" class="product-policy__item-img">
                            <div class="product-policy__item-info">
                                <h3 class="product-policy__item-info-heading">ƯU ĐÃI TẶNG KÈM</h3>
                                <span class="product-policy__item-info-body">Tặng kèm vớ dệt kim và balô chống thấm đựng giày cho mỗi đơn hàng Giày đá bóng.</span>
                            </div>
                        </div>
                        <div class="product-policy__item">
                            <img src="https://theme.hstatic.net/200000278317/1000929405/14/pd_policy_2_img.png?v=999" alt="" class="product-policy__item-img">
                            <div class="product-policy__item-info">
                                <h3 class="product-policy__item-info-heading">ĐỔI HÀNG DỄ DÀNG</h3>
                                <span class="product-policy__item-info-body">Hỗ trợ khách hàng đổi size hoặc mẫu trong vòng 7 ngày. (Sản phẩm chưa qua sử dụng).</span>
                            </div>
                        </div>
                        <div class="product-policy__item">
                            <img src="https://theme.hstatic.net/200000278317/1000929405/14/pd_policy_3_img.png?v=999" alt="" class="product-policy__item-img">
                            <div class="product-policy__item-info">
                                <h3 class="product-policy__item-info-heading">CHÍNH SÁCH GIAO HÀNG</h3>
                                <span class="product-policy__item-info-body">COD Toàn quốc | Freeship toàn quốc khi khách hàng thanh toán chuyển khoản trước với đơn hàng Giày đá bóng trên 1 triệu.</span>
                            </div>
                        </div>
                        <div class="product-policy__item">
                            <img src="https://theme.hstatic.net/200000278317/1000929405/14/pd_policy_4_img.png?v=999" alt="" class="product-policy__item-img">
                            <div class="product-policy__item-info">
                                <h3 class="product-policy__item-info-heading">THANH TOÁN TIỆN LỢI</h3>
                                <span class="product-policy__item-info-body">Chấp nhận các loại hình thanh toán bằng thẻ, tiền mặt, chuyển khoản.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-dsc">
                <ul class="tab-title__list">
                    <li class="tab-title__item tab-title__item--active">
                        <a href="" class="tab-title__item-link">MÔ TẢ SẢN PHẨM</a>
                    </li>
                    <li class="tab-title__item">
                        <a href="" class="tab-title__item-link">CHÍNH SÁCH BẢO HÀNH</a>
                    </li>
                    <li class="tab-title__item">
                        <a href="" class="tab-title__item-link">LỜI KHUYÊN CHỌN GIÀY</a>
                    </li>
                </ul>
                <div class="tab-title__content">
                    <?php
                        $array = explode('\n', $data['product']['motangan']);
                        foreach($array as $item): 
                    ?>
                        <p>
                            <span><?=$item?></span>
                        </p>
                    <?php endforeach; ?>
                    <p>
                        <span><strong>Thông số kỹ thuật:</strong></span>
                    </p>
                    <?php
                        $array = explode('\n', $data['product']['motachitiet']);
                        foreach($array as $item): 
                    ?>
                        <p>
                            <span><?=$item?></span>
                        </p>
                    <?php 
                        endforeach; 
                        if ($data['product']['anhmota2'] != ''): 
                            $array = explode(",", $data['product']['anhmota2']);
                            foreach($array as $item): 
                    ?>
                        <p>
                            <img src="public/upload/<?=$item?>" alt="">
                        </p>
                    <?php 
                            endforeach;
                        endif; 
                    ?>
                    <p>
                        <span>Sản phẩm đang có mặt tại <strong>Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:</strong></span>
                    </p>
                    <p class="margin-4">
                        <span>Thanh Hùng Futsal Store I: <strong>27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722</strong></span>
                    </p>
                    <p class="margin-4">
                        <span>Thanh Hùng Futsal Store II: <strong>32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730</strong></span>
                    </p>
                    <p class="margin-4">
                        <span>Thanh Hùng Futsal Store III: <strong>48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780</strong></span>
                    </p>
                </div>

                <div class="related-products">
                    <h2 class="related-products__title">SẢN PHẨM LIÊN QUAN</h2>
                    <div class="grid__row">
                        <?php foreach($data['relatedProducts'] as $item): ?>
                            <div class="grid__column-3">
                                <a href="index.php?page=detail&id=<?=$item['masp']?>" class="product-item">
                                    <div class="product-item__img"
                                        style="background-image: url('public/upload/<?=$item['anhsp']?>');">
                                    </div>
                                    <h4 class="product-item__name"><?=$item['tensp']?></h4>
                                    <div class="product-item__price">
                                        <span class="product-item__price-current"><?=number_format($item['giahientai'])?>đ</span>
                                        <?php if ($item['giacu'] != 0): ?>
                                            <span class="product-item__price-old"><?=number_format($item['giacu'])?>đ</span>
                                        <?php endif; ?>
                                        <div class="fundiin">
                                            <span class="fundiin-title">hoặc <span class="fundiin-price"><?=number_format($item['giahientai'] / 2)?>đ</span> x2 kỳ với <span class="fundiin-press">Fundiin</span></span>
                                        </div>
                                    </div>
                                    <?php if ($item['phantramgiamgia'] != 0): ?>
                                        <div class="product-item__sale-off">-<?=$item['phantramgiamgia']?>%</div>
                                    <?php 
                                        endif; 
                                        if ($item['moiramat'] == 1):
                                    ?>
                                        <div class="product-item__newly">MỚI RA MẮT</div>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="see-more-btn">
                        <?php if ($data['product']['madm'] == 1): ?>
                            <a href="index.php?page=tfshoes" class="see-more-btn__link">Xem thêm</a>
                        <?php elseif ($data['product']['madm'] == 2): ?>
                            <a href="index.php?page=icshoes" class="see-more-btn__link">Xem thêm</a>
                        <?php else: ?>
                            <a href="index.php?page=accessories" class="see-more-btn__link">Xem thêm</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>