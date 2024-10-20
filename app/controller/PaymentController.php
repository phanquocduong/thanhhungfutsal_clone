<?php
    class PaymentController {
        private $order;

        function __construct() {
            $this->order = new OrderModel();
        }

        private function renderView($view) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        public function viewPayment() {
            $this->renderView('payment');
        }

        public function handleBuyNow() {
            if (isset($_POST['buy-now'])) {
                $id = $_POST['masp'];
                $name = $_POST['tensp'];
                $img = $_POST['anhsp'];
                $price = $_POST['giahientai'];
                $size = $_POST['kichthuoc'];
                $quantity = (int)$_POST['soluong'];
                if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                    $_SESSION['buy-now'] = [
                        'id' => $id, 
                        'name' => $name, 
                        'img' => $img, 
                        'price' => $price, 
                        'size' => $size, 
                        'quantity' => $quantity
                    ];
                } else {
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
                }
                echo '<script>window.location.href = "index.php?page=payment";</script>';
            }
        }

        public function handlePayment() {
            if (isset($_POST['submit'])) {
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    $idClient = $_SESSION['user']['matk'];
                } else {
                    $idClient = 2;
                }
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $method = $_POST['method'];
                $total = $_POST['total'];
                $idOrder = $this->order->createOrder($idClient, $fullname, $email, $tel, $address, $method, $total);
                if (isset($_SESSION['cart']) && (count($_SESSION['cart'])>0)) {
                    foreach ($_SESSION['cart'] as $item) {
                        $this->order->createOrderDetails($idOrder, $item['id'], $item['name'], $item['img'], $item['size'], $item['quantity'], $item['price']);
                    }
                    unset($_SESSION['cart']);
                    echo '<script>alert("Đặt hàng thành công, vui lòng kiểm tra email!")</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                }
            }
        }
    }
?>