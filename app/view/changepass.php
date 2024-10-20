<div class="crossbar">
    <span class="crossbar__title">Thanh Hùng Futsal - Giày Đá Bóng Chính Hãng - 2013</span>
</div>

<div class="form-container">
    <form class="form-small" method="POST" action="index.php?page=handle-changepassword">
        <h4 class="form-title">Đổi mật khẩu</h4>
        <?php if(isset($data['notify'])): ?>
            <div class="errors">
                <ul>
                    <li><?=$data['notify']?></li>
                </ul>
            </div>
        <?php endif; ?>
        <div class="form-full">
            <label for="password" class="form-label">MẬT KHẨU HIỆN TẠI:</label>
            <input required type="password" id="current-password" name="current-password" class="form-control">
        </div>
        <div class="form-full">
            <label for="password" class="form-label">MẬT KHẨU MỚI:</label>
            <input required type="password" id="newpassword" name="newpassword" class="form-control">
        </div>
        <div class="form-full">
            <label for="password" class="form-label">NHẬP LẠI MẬT KHẨU MỚI:</label>
            <input required type="password" id="re-newpassword" name="re-newpassword" class="form-control">
        </div>
        <div class="form-action">
            <button name="submit" class="form-btn-small">Cập nhật</button>
        </div>
    </form>
</div>