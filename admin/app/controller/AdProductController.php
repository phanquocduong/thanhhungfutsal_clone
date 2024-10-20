<?php
    class AdProductController {
        private $product;
        private $category;

        function __construct() {
            $this->product = new ProductModel();
            $this->category = new CategoryModel();
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

        private function viewProducts($view, $condition = '', $params = [], $order = '') {
            $num = $_GET['num'] ?? 1;
            $start = ($num - 1) * 28;
            $data = $this->product->getProducts($condition, $params, $order, $start, 28);
            $quantity = $this->product->getProductCount($condition, $params);
            $numberPages = ceil($quantity / 28);
            $this->renderView($view, $data, $numberPages);
        }
        
        function viewProductList() {
            $this->viewProducts('products');
        }

        function viewAddProduct() {
            $data = $this->category->getCategories();
            $this->renderView('add-product', $data);
        }

        function handleAddProduct() {
            if (isset($_POST['submit'])) {
                $arrDescImage1 = [$_FILES['imageExtra1']['name'],$_FILES['imageExtra2']['name'],$_FILES['imageExtra3']['name']];
                $arrDescImage2 = [$_FILES['imageExtra4']['name'],$_FILES['imageExtra5']['name'],$_FILES['imageExtra6']['name']];
                $descImage1 = '';
                $descImage2 = '';
                foreach ($arrDescImage1 as $item) {
                    if ($item != '') {
                        if ($descImage1 == '') {
                            $descImage1 .= $item;
                        } else {
                            $descImage1 .= ',' . $item;
                        }
                    }
                }
                foreach ($arrDescImage2 as $item) {
                    if ($item != '') {
                        if ($descImage2 == '') {
                            $descImage2 .= $item;
                        } else {
                            $descImage2 .= ',' . $item;
                        }
                    }
                }
                $result = $this->product->addProduct(
                            $_POST['cate'], 
                            $_POST['name'],
                            $_POST['priceCurrent'],
                            $_POST['priceOld'],
                            $_POST['percent'],
                            $_FILES['imageMain']['name'],
                            $_POST['new'],
                            $_POST['size'],
                            $_POST['short-desc'],
                            $_POST['desc-details'],
                            $descImage1,
                            $descImage2);
                if ($result) {
                    $uploadSuccess = true;
                    if ($_FILES['imageMain']['name'] != '') {
                        $uploadSuccess &= move_uploaded_file($_FILES['imageMain']['tmp_name'], '../public/upload/'.$_FILES['imageMain']['name']);
                    }
                    for ($i = 1; $i <= 6; $i++) {
                        $imageKey = "imageExtra" . $i;
                        if ($_FILES[$imageKey]['name'] != '') {
                            $uploadSuccess &= move_uploaded_file($_FILES[$imageKey]['tmp_name'], '../public/upload/'.$_FILES[$imageKey]['name']);
                        }
                    }
                    if ($uploadSuccess) {
                        echo '<script>alert("Thêm sản phẩm thành công")</script>';
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        echo '<script>alert("Có lỗi khi tải lên hình ảnh. Vui lòng thử lại sau!")</script>';
                    }
                } else {
                    echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }

        function viewEditProduct() {
            $data['product'] = $this->product->getProduct($_GET['id']);
            if ($data['product'] == null) {
                echo '<script>window.location.href = "index.php";</script>';
                return;
            }
            $data['category'] = $this->category->getCategories();
            $this->renderView('edit-product', $data);
        }

        function handleEditProduct() {
            if (isset($_POST['submit'])) {
                $data['product'] = $this->product->getProduct($_GET['id']);

                // Xử lý ảnh sản phẩm tải lên
                if ($_FILES['imageMain']['name'] != '') {
                    $imgMain = $_FILES['imageMain']['name'];
                } else {
                    $imgMain = $data['product']['anhsp'];
                }

                // Xử lý ảnh phụ (ảnh mô tả 1)
                $descImage1 = '';
                if ($data['product']['anhmota1'] != '') {
                    $arrDescImage1 = explode(",", $data['product']['anhmota1']);
                    for ($i = 1; $i <= 3; $i++) {
                        if (isset($arrDescImage1[$i-1])) {
                            if ($_FILES["imageExtra$i"]['name'] != '') {
                                $arrDescImage1[$i-1] = $_FILES["imageExtra$i"]['name'];
                            }
                        } else {
                            if ($_FILES["imageExtra$i"]['name'] != '') {
                                array_push($arrDescImage1, $_FILES["imageExtra$i"]['name']);
                            }
                        }
                    }   
                    $descImage1 = implode(",", $arrDescImage1);
                } else {
                    $arrDescImage1 = [$_FILES['imageExtra1']['name'],$_FILES['imageExtra2']['name'],$_FILES['imageExtra3']['name']];
                    foreach ($arrDescImage1 as $item) {
                        if ($item != '') {
                            if ($descImage1 == '') {
                                $descImage1 .= $item;
                            } else {
                                $descImage1 .= ',' . $item;
                            }
                        }
                    }
                }

                // Xử lý ảnh phụ (ảnh mô tả 2)
                $descImage2 = '';
                if ($data['product']['anhmota2'] != '') {
                    $arrDescImage2 = explode(",", $data['product']['anhmota2']);
                    for ($i = 4; $i <= 6; $i++) {
                        if (isset($arrDescImage2[$i-4])) {
                            if ($_FILES["imageExtra$i"]['name'] != '') {
                                $arrDescImage2[$i-4] = $_FILES["imageExtra$i"]['name'];
                            }
                        } else {
                            if ($_FILES["imageExtra$i"]['name'] != '') {
                                array_push($arrDescImage2, $_FILES["imageExtra$i"]['name']);
                            }
                        }
                    }
                    $descImage2 = implode(",", $arrDescImage2);
                } else {
                    $arrDescImage2 = [$_FILES['imageExtra4']['name'],$_FILES['imageExtra5']['name'],$_FILES['imageExtra6']['name']];
                    foreach ($arrDescImage2 as $item) {
                        if ($item != '') {
                            if ($descImage2 == '') {
                                $descImage2 .= $item;
                            } else {
                                $descImage2 .= ',' . $item;
                            }
                        }
                    }
                }

                // Update product in the database
                $result = $this->product->editProduct(
                            $_GET['id'],
                            $_POST['cate'], 
                            $_POST['name'],
                            $_POST['priceCurrent'],
                            $_POST['priceOld'],
                            $_POST['percent'],
                            $imgMain,
                            $_POST['new'],
                            $_POST['size'],
                            $_POST['short-desc'],
                            $_POST['desc-details'],
                            $descImage1,
                            $descImage2);

                // Handle result and file uploads
                if ($result) {
                    $uploadSuccess = true;
                    if ($_FILES['imageMain']['name'] != '') {
                        $uploadSuccess &= move_uploaded_file($_FILES['imageMain']['tmp_name'], '../public/upload/'.$_FILES['imageMain']['name']);
                    }
                    for ($i = 1; $i <= 6; $i++) {
                        $imageKey = "imageExtra" . $i;
                        if ($_FILES[$imageKey]['name'] != '') {
                            $uploadSuccess &= move_uploaded_file($_FILES[$imageKey]['tmp_name'], '../public/upload/'.$_FILES[$imageKey]['name']);
                        }
                    }
                    if ($uploadSuccess) {
                        echo '<script>alert("Chỉnh sửa sản phẩm thành công")</script>';
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        echo '<script>alert("Có lỗi khi tải lên hình ảnh. Vui lòng thử lại sau!")</script>';
                    }
                } else {
                    echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }

        function handleDeleteProduct() {
            if (isset($_GET['id'])) {
                $data = $this->product->getProduct($_GET['id']);
                if ($data == null) {
                    echo '<script>window.location.href = "index.php";</script>';
                    return;
                }
                $result = $this->product->deleteProduct($_GET['id']);
                if ($result) {
                    $fileMain = '../public/upload/'.$data['anhsp'];
                    if (is_file($fileMain) && !empty($data['anhsp'])) {
                        unlink($fileMain);
                    }
                    $imgExtra1 = explode(",", $data['anhmota1']);
                    foreach ($imgExtra1 as $item) {
                        $fileExtra = '../public/upload/'.$item;
                        if (is_file($fileExtra) && !empty($item)) {
                            unlink($fileExtra);
                        }
                    }
                    $imgExtra2 = explode(",", $data['anhmota2']);
                    foreach ($imgExtra2 as $item) {
                        $fileExtra = '../public/upload/'.$item;
                        if (is_file($fileExtra)) {
                            unlink($fileExtra);
                        }
                    }
                    echo '<script>alert("Xóa sản phẩm thành công")</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    echo '<script>alert("Có lỗi đã xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }
    }
?>