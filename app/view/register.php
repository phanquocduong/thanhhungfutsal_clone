<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="form-container">
    <form class="form-large" method="POST" action="index.php?page=handleregister">
        <h4 class="form-title">Đăng ký</h4>
        <?php if(isset($_SESSION['error']['unknown'])): ?>
            <div class="errors">
                <ul>
                    <li><?=$_SESSION['error']['unknown']?></li>
                </ul>
            </div>
        <?php 
            unset($_SESSION['error']);
            endif; 
        ?>
        <div class="form-group">
            <div class="form-group__half">
                <label for="last_name" class="form-label">HỌ:</label>
                <input required id="last_name" name="last_name" type="text" class="form-control" value="<?= (isset($_POST['last_name'])) ? $_POST['last_name'] : '' ?>">
            </div>
            <div class="form-group__half">
                <label for="first_name" class="form-label">TÊN:</label>
                <input required id="first_name" name="first_name" type="text" class="form-control" value="<?= (isset($_POST['first_name'])) ? $_POST['first_name'] : '' ?>">
            </div>
        </div>
        <div class="form-full">
            <label for="email" class="form-label">EMAIL:</label>
            <input required type="email" id="email" name="email" class="form-control" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
            <?php if(isset($_SESSION['error']['email'])): ?>
                <div class="form-error"><?=$_SESSION['error']['email']?></div>
            <?php endif; ?>
        </div>
        <div class="form-full">
            <label for="password" class="form-label">MẬT KHẨU:</label>
            <input required type="password" id="password" name="password" class="form-control" value="<?= (isset($_POST['password'])) ? $_POST['password'] : '' ?>">
            <?php if(isset($_SESSION['error']['password'])): ?>
                <div class="form-error"><?=$_SESSION['error']['password']?></div>
            <?php endif; ?>
        </div>
        <div class="form-full">
            <label for="repassword" class="form-label">NHẬP LẠI MẬT KHẨU:</label>
            <input required type="password" id="repassword" name="repassword" class="form-control" value="<?= (isset($_POST['repassword'])) ? $_POST['repassword'] : '' ?>">
            <?php if(isset($_SESSION['error']['repassword'])): ?>
                <div class="form-error"><?=$_SESSION['error']['repassword']?></div>
            <?php endif; ?>
        </div>
        <?php 
            if(isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            } 
        ?>
        <div class="form-action">
            <button name="submit" class="form-btn-medium">Đăng ký</button>
            <div class="switch-form-box">
                Bạn đã có tài khoản?
                <a href="index.php?page=login" class="switch-form-box__link">Đăng nhập</a>
            </div>
        </div>
    </form>
</div>