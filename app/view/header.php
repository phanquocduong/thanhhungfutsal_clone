<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThanhHung Futsal - Giày đá banh chính hãng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="public/css/grid.css">
    <link rel="stylesheet" href="public/css/base.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/fonts/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="header-with-search">
                <div class="header-logo">
                    <a href="index.php" class="header-logo__link">
                        <img src="public/upload/header__logo.webp" alt="Thanh Hung Futsal" class="header-logo__img">
                    </a>
                </div>

                <div class="header-search">
                    <form action="" method="GET">
                        <input type="hidden" name="page" value="search">
                        <input type="text" name="keyword" class="header-search__input" placeholder="Bạn đang tìm kiếm ...">
                        <button type="submit" class="header-search__btn">
                            <i class="header-search__btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="header-right">
                    <ul class="header-right__list">
                        <li class="header-right__item">
                            <i class="fa-regular fa-user"></i>
                            <div class="user-action">
                                <?php if(isset($_SESSION['user']) && ($_SESSION['user']) != ""): ?>
                                    <a href="index.php?page=account" class="user-action__link">Tài khoản</a>
                                    <a href="index.php?page=logout" class="user-action__link">Đăng xuất</a>
                                <?php else: ?>
                                    <a href="index.php?page=login" class="user-action__link">Đăng nhập</a>
                                    <a href="index.php?page=register" class="user-action__link">Đăng ký</a>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li class="header-right__item">
                            <a href="index.php?page=cart" class="header-right__item-link">
                                <i class="header-cart-icon fa-solid fa-bag-shopping"></i>
                                <span class="header-cart-quantity">
                                    <?php
                                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                            end($_SESSION['cart']);
                                            $lastIndex = key($_SESSION['cart']);
                                            reset($_SESSION['cart']);
                                            echo $lastIndex + 1;
                                        } else {
                                            echo 0;
                                        }
                                    ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="navbar">
                <ul class="navbar-list">
                    <li class="navbar-item">
                        <a href="index.php" class="navbar-item__link">TRANG CHỦ</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=allproducts" class="navbar-item__link">
                            SẢN PHẨM
                            <i class="navbar-item__icon-down fa-solid fa-caret-down"></i>
                        </a>                       
                        <ul class="navbar-sub-list">
                            <li class="navbar-sub__item">
                                <a href="index.php?page=hotsales" class="navbar-sub-item__link">HOT SALES</a>
                            </li>
                            <li class="navbar-sub__item">
                                <a href="index.php?page=tfshoes" class="navbar-sub-item__link">GIÀY CỎ NHÂN TẠO</a>
                            </li>
                            <li class="navbar-sub__item">
                                <a href="index.php?page=icshoes" class="navbar-sub-item__link">GIÀY FUTSAL</a>
                            </li>
                            <li class="navbar-sub__item">
                                <a href="index.php?page=accessories" class="navbar-sub-item__link">PHỤ KIỆN</a>
                            </li>
                        </ul>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=hotsales" class="navbar-item__link">HOT SALES</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=tfshoes" class="navbar-item__link">GIÀY CỎ NHÂN TẠO</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=icshoes" class="navbar-item__link">GIÀY FUTSAL</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=accessories" class="navbar-item__link">PHỤ KIỆN</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=about" class="navbar-item__link">GIỚI THIỆU</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php?page=contact" class="navbar-item__link">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
        </div>