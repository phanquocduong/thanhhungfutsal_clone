<?php
    class AdCategoryController {
        private $category;
        private $product;
        function __construct() {
            $this->category = new CategoryModel();
            $this->product = new ProductModel();
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

        private function viewCategories($view, $condition = '', $params = [], $order = '') {
            $num = $_GET['num'] ?? 1;
            $start = ($num - 1) * 28;
            $data = $this->category->getCategories($condition, $params, $order, $start, 28);
            $quantity = $this->category->getCategoryCount($condition, $params);
            $numberPages = ceil($quantity / 28);
            $this->renderView($view, $data, $numberPages);
        }

        function viewCategoryList() {
            $this->viewCategories('categories');
        }

        function viewAddCategory() {
            $this->renderView('add-category');
        }

        function handleAddCategory() {
            if (isset($_POST['submit'])) {
                $result = $this->category->addCategory($_POST['name'], $_FILES['image']['name']);
                if ($result) {
                    $uploadSuccess = true;
                    if ($_FILES['image']['name'] != '') {
                        $uploadSuccess &= move_uploaded_file($_FILES['image']['tmp_name'], '../public/upload/categories/'.$_FILES['image']['name']);
                    }
                    if ($uploadSuccess) {
                        echo '<script>alert("Thêm danh mục thành công")</script>';
                        echo '<script>window.location.href = "index.php?page=categories";</script>';
                    } else {
                        echo '<script>alert("Có lỗi khi tải lên hình ảnh. Vui lòng thử lại sau!")</script>';
                    }
                } else {
                    echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }

        function viewEditCategory() {
            $data = $this->category->getCategory($_GET['id']);
            if ($data == null) {
                echo '<script>window.location.href = "index.php?page=categories";</script>';
            }
            $this->renderView('edit-category', $data);
        }

        function handleEditCategory() {      
            if (isset($_POST['submit'])) {
                $data = $this->category->getCategory($_GET['id']);
                if ($_FILES['image']['name'] != '') {
                    $img = $_FILES['image']['name'];
                } else {
                    $img = $data['anhdm'];
                }
                $result = $this->category->editCategory($_GET['id'], $_POST['name'], $img);
                if ($result) {
                    $uploadSuccess = true;
                    if ($_FILES['image']['name'] != '') {
                        $uploadSuccess &= move_uploaded_file($_FILES['image']['tmp_name'], '../public/upload/categories/'.$_FILES['image']['name']);
                    }
                    if ($uploadSuccess) {
                        echo '<script>alert("Chỉnh sửa danh mục thành công")</script>';
                        echo '<script>window.location.href = "index.php?page=categories";</script>';
                    } else {
                        echo '<script>alert("Có lỗi khi tải lên hình ảnh. Vui lòng thử lại sau!")</script>';
                    }
                } else {
                    echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }

        function handleDeleteCategory() {
            if (isset($_GET['id'])) {
                $data = $this->category->getCategory($_GET['id']);
                if ($data == null) {
                    echo '<script>window.location.href = "index.php?page=categories";</script>';
                    return;
                }
                $checkProducts = $this->product->getProducts("WHERE madm = ".$_GET['id']."");
                if (count($checkProducts)>0) {
                    echo '<script>alert("Danh mục hiện có '.count($checkProducts).' sản phẩm, không thể xóa!")</script>';
                    echo '<script>window.location.href = "index.php?page=categories";</script>';
                } else {
                    $result = $this->category->deleteCategory($_GET['id']);
                    if ($result) {
                        $file = '../public/upload/categories/'.$data['anhdm'];
                        if (is_file($file) && !empty($data['anhdm'])) {
                            unlink($file);
                        }
                        echo '<script>alert("Xóa danh mục thành công")</script>';
                        echo '<script>window.location.href = "index.php?page=categories";</script>';
                    } else {
                        echo '<script>alert("Có lỗi đã xảy ra. Vui lòng thử lại sau!")</script>';
                    }
                }   
            }
        }
    }
?>