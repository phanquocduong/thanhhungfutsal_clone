<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="form-container">
    <form class="form-small" method="POST" action="index.php?page=handlelogin">
        <h4 class="form-title">Đăng nhập</h4>
        <?php if(isset($_SESSION['error'])): ?>
            <div class="errors">
                <ul>
                    <li><?=$_SESSION['error']?></li>
                </ul>
            </div>
        <?php 
            unset($_SESSION['error']);
            endif; 
        ?>
        <div class="email-form">
            <label for="customer_email" class="form-label">EMAIL</label>
            <input required type="email" id="customer_email" name="email" class="form-control" placeholder="Nhập Email của bạn">
        </div>
        <div class="password-form">
            <label for="customer_password" class="form-label">MẬT KHẨU</label>
            <input required type="password" id="customer_password" name="password" class="form-control" placeholder="Nhập Mật khẩu">
        </div>
        <div class="form-action">
            <button name="submit" class="form-btn-small">Đăng nhập</button>
            <div class="switch-form-box">
                Bạn chưa có tài khoản?
                <a href="index.php?page=register" class="switch-form-box__link">Đăng ký ngay</a>
            </div>
            <a href="" class="forgot-pass__link">Quên mật khẩu?</a>
        </div>
    </form>
</div>