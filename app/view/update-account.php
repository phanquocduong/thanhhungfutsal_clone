<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="form-container">
    <form class="form-large" method="POST" action="index.php?page=handle-update-account">
        <h4 class="form-title">Cập nhật tài khoản</h4>
        <?php if($data != []): ?>
            <div class="errors">
                <ul>
                    <li><?=$data['notify']?></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="full-name__form">
            <div class="form-group__half">
                <label for="last_name" class="form-label">HỌ:</label>
                <input required id="last_name" name="last_name" type="text" class="form-control" value="<?=$_SESSION['user']['ho']?>">
            </div>
            <div class="form-group__half">
                <label for="first_name" class="form-label">TÊN:</label>
                <input required id="first_name" name="first_name" type="text" class="form-control" value="<?=$_SESSION['user']['ten']?>">
            </div>
        </div>
        <div class="form-full">
            <label for="password" class="form-label">MẬT KHẨU:</label>
            <input required type="password" id="password" name="password" class="form-control" value="<?=$_SESSION['user']['matkhau']?>" readonly>
        </div>
        <div class="form-full">
            <label for="tel" class="form-label">SỐ ĐIỆN THOẠI:</label>
            <input required type="tel" id="tel" name="tel" class="form-control" value="<?=$_SESSION['user']['sodienthoai']?>">
        </div>
        <div class="form-full">
            <label for="address" class="form-label">ĐỊA CHỈ:</label>
            <input required type="text" id="address" name="address" class="form-control" value="<?=$_SESSION['user']['diachi']?>">
        </div>
        <div class="form-action">
            <button name="submit" class="form-btn-medium">Lưu</button>
            <div class="switch-form-box">
                Bạn có muốn đổi mật khẩu?
                <a href="index.php?page=changepassword" class="switch-form-box__link">Thay đổi mật khẩu</a>
            </div>
        </div>
    </form>
</div>