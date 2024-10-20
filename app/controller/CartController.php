<?php
    class CartController {
        private function renderView($view) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        public function handleAddCart() {
            if (isset($_POST['addtocart'])) {
                $id = $_POST['masp'];
                $name = $_POST['tensp'];
                $img = $_POST['anhsp'];
                $price = $_POST['giahientai'];
                $size = $_POST['kichthuoc'];
                $quantity = (int)$_POST['soluong'];
                $fg = 0;
                $i = 0;
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                foreach ($_SESSION['cart'] as $item) {
                    if ($item['id'] == $id && $item['size'] == $size) {
                        $newQuantity = $quantity + (int)$item['quantity'];
                        $_SESSION['cart'][$i]['quantity'] = $newQuantity;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                if ($fg == 0) {
                    $product = [
                        'id' => $id, 
                        'name' => $name, 
                        'img' => $img, 
                        'price' => $price, 
                        'size' => $size, 
                        'quantity' => $quantity
                    ];
                    $_SESSION['cart'][] = $product;
                }
                echo '<script>alert("Đã thêm vào giỏ hàng")</script>';
                echo '<script>window.location.href = "index.php?page=detail&id='.$id.'";</script>';
            }
        }

        public function viewCart() {
            $this->renderView('cart');
        }

        public function handleUpdateCart() {
            if (isset($_POST['index']) && isset($_POST['quantity'])) {
                $index = (int)$_POST['index'];
                $quantity = (int)$_POST['quantity'];
                if ($quantity > 0 && isset($_SESSION['cart'][$index])) {
                    $_SESSION['cart'][$index]['quantity'] = $quantity;
                }

                $cart = $_SESSION['cart'];
                $itemTotal = $cart[$index]['quantity'] * $cart[$index]['price'];
                $grandTotal = array_reduce($cart, function($total, $item) {
                    return $total + ($item['quantity'] * $item['price']);
                }, 0);

                echo json_encode([
                    'itemTotal' => $itemTotal,
                    'grandTotal' => $grandTotal
                ]);
            }
            exit;
        }

        public function handleDeleteCart() {
            if (isset($_GET['index']) && ($_GET['index'] >= 0)) {
                array_splice($_SESSION['cart'], $_GET['index'], 1);
                echo '<script>window.location.href = "index.php?page=cart";</script>';
            }
        }
    }
?>