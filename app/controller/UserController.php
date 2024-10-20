<?php
    class UserController {
        private $user;
        private $order;

        function __construct() {
            $this->user = new UserModel();
            $this->order = new OrderModel();
        }

        private function renderView($view, $data = []) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        public function viewLogin() {   
            $this->renderView('login');
        }

        public function handleLogin() {
            if (isset($_POST['submit'])) {
                $result = $this->user->login($_POST['email'], $_POST['password']);
                if ($result) {
                    echo '<script>alert("Đăng nhập thành công")</script>';
                    $_SESSION['user'] = $result;
                    if ($_SESSION['user']['quyen'] == 1) {
                        echo '<script>window.location.href = "admin/index.php";</script>';
                    } else {
                        echo '<script>window.location.href = "index.php?page=account";</script>';
                    }
                } else {
                    $_SESSION['error'] = "Thông tin đăng nhập không hợp lệ.";
                    $this->renderView('login');
                }
            }
        }

        public function viewRegister() {
            $this->renderView('register');
        }

        public function handleRegister() {
            $data['notify'] = '';
            if (isset($_POST['submit'])) {
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                if (strlen($password) < 8) {
                    $_SESSION['error']['password'] = "Mật khẩu phải có ít nhất 8 ký tự!";
                }
                if ($password !== $repassword) {
                    $_SESSION['error']['repassword'] = "Mật khẩu nhập lại không đúng!";
                }
                $checkMail = $this->user->checkMail($_POST['email']);
                if ($checkMail) {
                    $_SESSION['error']['email'] = "Email đã tồn tại, vui lòng nhập email khác!";
                }
                if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                    $this->renderView('register');
                } else {
                    $result = $this->user->register($_POST['last_name'], $_POST['first_name'], $_POST['email'], $password);
                    if ($result) {
                        echo '<script>alert("Đăng ký thành công")</script>';
                        echo '<script>window.location.href = "index.php?page=login";</script>';
                    } else {
                        $_SESSION['error']['unknown'] = "Có lỗi xảy ra. Vui lòng thử lại!";
                        $this->renderView('register');
                    }
                }
            }
        }

        public function logout() {
            $this->user->logout();
            echo '<script>window.location.href = "index.php";</script>';
        }

        public function viewAccount() {
            $data['orders'] = $this->order->getOrders('WHERE makh = '.$_SESSION['user']['matk'].'');
            $this->renderView('account', $data);
        }

        public function viewUpdateAccount() {
            $this->renderView('update-account');
        }

        public function handleUpdateAccount() {
            $data['notify'] = '';
            if (isset($_POST['submit'])) {
                $tel = $_POST['tel'];
                if (strlen($tel) < 10 || strlen($tel) > 11 || !ctype_digit($tel) || !preg_match('/^(03|07|08|09)\d+$/', $tel)) {
                    $data['notify'] = "Số điện thoại không hợp lệ!";
                    $this->renderView('account', $data);
                } else {
                    $result = $this->user->updateAccount($_SESSION['user']['matk'], $_POST['last_name'], $_POST['first_name'], $tel, $_POST['address']);
                    if ($result) {
                        $_SESSION['user']['ho'] = $_POST['last_name'];
                        $_SESSION['user']['ten'] = $_POST['first_name'];
                        $_SESSION['user']['sodienthoai'] = $tel;
                        $_SESSION['user']['diachi'] = $_POST['address'];
                        echo '<script>alert("Cập nhật thành công")</script>';
                        echo '<script>window.location.href = "index.php?page=account";</script>';
                    } else {
                        $data['notify'] = "Có lỗi xảy ra. Vui lòng thử lại!";
                        $this->renderView('account', $data);
                    }
                }
            }
        }

        public function viewChangePassword() {
            $this->renderView('changepass');
        }

        public function handleChangePassword() {
            $data['notify'] = '';
            if (isset($_POST['submit'])) {
                $currentPassword = $_POST['current-password'];
                $newPassword = $_POST['newpassword'];
                $renewPassword = $_POST['re-newpassword'];
                if ($currentPassword != $_SESSION['user']['matkhau']) {
                    $data['notify'] = "Mật khẩu hiện tại không đúng!";
                    $this->renderView('changepass', $data);
                    return;
                }
                if (strlen($newPassword) < 8) {
                    $data['notify'] = "Mật khẩu phải có ít nhất 8 ký tự!";
                    $this->renderView('changepass', $data);
                    return;
                }
                if ($newPassword !== $renewPassword) {
                    $data['notify'] = "Mật khẩu nhập lại không đúng!";
                    $this->renderView('changepass', $data);
                    return;
                }
                $result = $this->user->changePassword($_SESSION['user']['matk'], $newPassword);
                if ($result) {
                    $_SESSION['user']['matkhau'] = $newPassword;
                    echo '<script>alert("Cập nhật thành công")</script>';
                    echo '<script>window.location.href = "index.php?page=account";</script>';
                } else {
                    $data['notify'] = "Có lỗi xảy ra. Vui lòng thử lại!";
                    $this->renderView('changepass', $data);
                }
            }
        }
    }
?>