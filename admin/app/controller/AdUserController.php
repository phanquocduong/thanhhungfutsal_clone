<?php
    class AdUserController {
        private $user;

        function __construct() {
            $this->user = new UserModel();
            $this->checkAdminAccess();
        }

        private function checkAdminAccess() {
            if (!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 1)) {
                echo '<script>window.location.href = "../index.php";</script>';
                exit;
            }
        }

        function renderView($view, $data = [], $numberPages = null) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        private function viewUsers($view, $condition = '', $params = [], $order = '') {
            $num = $_GET['num'] ?? 1;
            $start = ($num - 1) * 28;
            $data = $this->user->getUsers($condition, $params, $order, $start, 28);
            $quantity = $this->user->getUserCount($condition, $params);
            $numberPages = ceil($quantity / 28);
            $this->renderView($view, $data, $numberPages);
        }

        function viewUserList() {
            $this->viewUsers('users');
        }

        function viewAddUser() {
            $this->renderView('add-user');
        }

        function handleAddUser() {
            if (isset($_POST['submit'])) {
                $password = $_POST['password'];
                if (strlen($password) < 8) {
                    echo '<script>alert("Mật khẩu phải có ít nhất 8 ký tự!")</script>';
                    echo '<script>window.location.href = "index.php?page=add-user";</script>';
                    return;
                }
                $tel = $_POST['tel'];
                if (strlen($tel) < 10 || strlen($tel) > 11 || !ctype_digit($tel) || !preg_match('/^(03|07|08|09)\d+$/', $tel)) {
                    echo '<script>alert("Số điện thoại không hợp lệ!")</script>';
                    echo '<script>window.location.href = "index.php?page=add-user";</script>';
                    return;
                }
                $checkMail = $this->user->checkMail($_POST['email']);
                if ($checkMail) {
                    echo '<script>alert("Email đã tồn tại, vui lòng nhập email khác!")</script>';
                    echo '<script>window.location.href = "index.php?page=add-user";</script>';
                    return;
                } else {
                    $result = $this->user->addUser(
                        $_POST['last-name'], 
                        $_POST['first-name'], 
                        $_POST['email'], 
                        $password, 
                        $tel, 
                        $_POST['address'], 
                        $_POST['role']);
                    if ($result) {
                        echo '<script>alert("Thêm người dùng thành công")</script>';
                        echo '<script>window.location.href = "index.php?page=users";</script>';
                    } else {
                        echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                    }
                }
            }
        }

        function viewEditUser() {
            $data = $this->user->getUser($_GET['id']);
            if ($data == null) {
                echo '<script>window.location.href = "index.php?page=users";</script>';
            }
            $this->renderView('edit-user', $data);
        }

        function handleEditUser() {
            if (isset($_POST['submit'])) {
                $password = $_POST['password'];
                if (strlen($password) < 8) {
                    echo '<script>alert("Mật khẩu phải có ít nhất 8 ký tự!")</script>';
                    echo '<script>window.location.href = "index.php?page=edit-user&id='.$_GET['id'].'";</script>';
                    return;
                }
                $tel = $_POST['tel'];
                if (strlen($tel) < 10 || strlen($tel) > 11 || !ctype_digit($tel) || !preg_match('/^(03|07|08|09)\d+$/', $tel)) {
                    echo '<script>alert("Số điện thoại không hợp lệ!")</script>';
                    echo '<script>window.location.href = "index.php?page=edit-user&id='.$_GET['id'].'";</script>';
                    return;
                }
                $result = $this->user->editUser(
                    $_GET['id'],
                    $_POST['last-name'], 
                    $_POST['first-name'], 
                    $_POST['email'], 
                    $password, 
                    $tel, 
                    $_POST['address'], 
                    $_POST['role']);
                if ($result) {
                    echo '<script>alert("Chỉnh sửa người dùng thành công")</script>';
                    echo '<script>window.location.href = "index.php?page=users";</script>';
                } else {
                    echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }

        function handleDeleteUser() {
            if (isset($_GET['id'])) {
                $data = $this->user->getUser($_GET['id']);
                if ($data == null) {
                    echo '<script>window.location.href = "index.php?page=users";</script>';
                    return;
                }
                $result = $this->user->deleteUser($_GET['id']);
                if ($result) {
                    echo '<script>alert("Xóa người dùng thành công")</script>';
                    echo '<script>window.location.href = "index.php?page=users";</script>';
                } else {
                    echo '<script>alert("Có lỗi đã xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }

        function logout() {
            $this->user->logout();
            echo '<script>window.location.href = "../index.php";</script>';
        }
    }
?>