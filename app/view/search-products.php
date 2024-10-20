<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>   

<div class="collection-container">
    <div class="grid">
        <h1 class="search-title">Kết quả tìm kiếm: "<?=$_GET['keyword']?>"</h1>
        <div class="grid__row">
            <?php foreach($data as $item): ?>
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
        <div class="pagination">
            <?php
                $current_page = isset($_GET['num']) ? (int)$_GET['num'] : 1;
                $previous_page = $current_page - 1;
                $next_page = $current_page + 1;
            ?>
            <a href="index.php?page=search&keyword=<?=$_GET['keyword']?>&num=<?=$previous_page?>" class="pagination-link__icon-left <?= $current_page == 1 ? 'none' : '' ?>">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <?php 
            for ($i = 1; $i <= $numberPages; $i++): ?>
                <a href="index.php?page=search&keyword=<?=$_GET['keyword']?>&num=<?=$i?>" class="pagination-link <?= $i == $current_page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
            <a href="index.php?page=search&keyword=<?=$_GET['keyword']?>&num=<?=$next_page?>" class="pagination-link__icon-right <?= $current_page == $numberPages ? 'none' : '' ?>">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>

