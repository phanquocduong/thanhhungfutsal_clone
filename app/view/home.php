<div class="slider">
    <i onclick="left()" class="fa-solid fa-chevron-left slider__swipe-left-icon"></i>
    <i onclick="right()" class="fa-solid fa-chevron-right slider__swipe-right-icon"></i>
    <img src="public/upload/sliders/slider1.webp" alt="" class="slider__img">
</div>

<div class="container">
    <div class="grid">
        <div class="topic">
            <h2 class="topic__title">KHAI TRƯƠNG CỬA HÀNG MỚI</h2>
            <img src="public/upload/new-store.webp" alt="" class="topic__img">
        </div>

        <div class="product">
            <div class="grid__row">
                <?php foreach($data['headerProducts'] as $item): ?>
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
        </div>
    </div>

    <div class="collection">
        <div class="grid">
            <h2 class="collection__title">BẠN ĐANG QUAN TÂM</h2>

            <div class="grid__row">
                <div class="grid__column-3">
                    <a href="index.php?page=tfshoes">
                        <img src="public/upload/categories/tf-category.webp" alt="" class="collection__img">
                    </a>
                </div>
                <div class="grid__column-3">
                    <a href="index.php?page=icshoes">
                        <img src="public/upload/categories/ic-category.webp" alt="" class="collection__img">
                    </a>
                </div>
                <div class="grid__column-3">
                    <a href="index.php?page=accessories">
                        <img src="public/upload/categories/acs-category.webp" alt="" class="collection__img">
                    </a>
                </div>
                <div class="grid__column-3">
                    <a href="index.php?page=hotsales">
                        <img src="https://theme.hstatic.net/200000278317/1000929405/14/newcoll_4_img_large.jpg?v=962" alt="" class="collection__img">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid">
        <div class="shopping-experience">
            <h2 class="shopping-experience__title">TRẢI NGHIỆM MUA SẮM TẠI CỬA HÀNG</h2>

            <div class="shopping-experience__list">
                <div class="shopping-experience__item">
                    <img src="https://theme.hstatic.net/200000278317/1000929405/14/groupbuy_1_img_compact.jpg?v=962" alt="" class="shopping-experience__item-img">
                    <div class="shopping-experience__item-name">
                        <span>Tư vấn bán hàng chuyên nghiệp.</span>
                    </div>
                </div>
                <div class="shopping-experience__item">
                    <img src="https://theme.hstatic.net/200000278317/1000929405/14/groupbuy_2_img_compact.jpg?v=962" alt="" class="shopping-experience__item-img">
                    <div class="shopping-experience__item-name">
                        <span>Hỗ trợ đo chân bằng thiết bị chuyên dụng.</span>
                    </div>
                </div>
                <div class="shopping-experience__item">
                    <img src="https://theme.hstatic.net/200000278317/1000929405/14/groupbuy_3_img_compact.jpg?v=962" alt="" class="shopping-experience__item-img">
                    <div class="shopping-experience__item-name">
                        <span>Quà tặng khi mua giày (Vớ, Balo).</span>
                    </div>
                </div>
                <div class="shopping-experience__item">
                    <img src="https://theme.hstatic.net/200000278317/1000929405/14/groupbuy_4_img_compact.jpg?v=962" alt="" class="shopping-experience__item-img">
                    <div class="shopping-experience__item-name">
                        <span>Thanh toán linh hoạt (Tiền mặt, Thẻ, Chuyển khoản).</span>
                    </div>
                </div>
                <div class="shopping-experience__item">
                    <img src="https://theme.hstatic.net/200000278317/1000929405/14/groupbuy_5_img_compact.jpg?v=962" alt="" class="shopping-experience__item-img">
                    <div class="shopping-experience__item-name">
                        <span>Hỗ trợ trả góp 0% lãi suất qua Fundiin (Thủ tục đơn giản).</span>
                    </div>
                </div>
                <div class="shopping-experience__item">
                    <img src="https://theme.hstatic.net/200000278317/1000929405/14/groupbuy_6_img_compact.jpg?v=962" alt="" class="shopping-experience__item-img">
                    <div class="shopping-experience__item-name">
                        <span>Dịch vụ giao hàng nhanh chóng (Grab & GHTK).</span>
                    </div>
                </div>
            </div>
        </div>

        <img src="https://theme.hstatic.net/200000278317/1000929405/14/home_banner_img.jpg?v=962" alt=""
            class="store-img">
                            
        <div class="product-tab">
            <h2 class="product-tab__title product-tab__title--active">GIÀY SÂN CỎ NHÂN TẠO</h2>
            <h2 class="product-tab__title"><a href="index.php?page=icshoes">GIÀY SÂN FUTSAL</a></h2>
        </div>
        <div class="grid__row">
            <?php foreach($data['footerProducts'] as $item): ?>
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
            <a href="index.php?page=tfshoes" class="see-more-btn__link">Xem thêm</a>
        </div>
    </div>
</div>