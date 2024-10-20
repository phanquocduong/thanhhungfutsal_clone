<?php
    class AdOrderController {
        private $order;

        function __construct() {
            $this->order = new OrderModel();
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

        private function viewOrders($view, $condition = '', $params = [], $order = '') {
            $num = $_GET['num'] ?? 1;
            $start = ($num - 1) * 28;
            $data = $this->order->getOrders($condition, $params, $order, $start, 28);
            $quantity = $this->order->getOrderCount($condition, $params);
            $numberPages = ceil($quantity / 28);
            $this->renderView($view, $data, $numberPages);
        }

        function viewOrderList() {
            $this->viewOrders('orders');
        }

        function viewOrder() {
            $data['order'] = $this->order->getOrder($_GET['id']);
            if ($data == null) {
                echo '<script>window.location.href = "index.php?page=orders";</script>';
            }
            $data['orderDetails'] = $this->order->getOrderDetails($_GET['id']);
            $this->renderView('order', $data);
        }

        function handleUpdateOrderStatus() {
            if (isset($_POST['submit'])) {
                $result = $this->order->updateOrderStatus($_GET['id'],$_POST['status']);
                if ($result) { 
                    echo '<script>alert("Cập nhật trạng thái đơn hàng thành công")</script>';
                    echo '<script>window.location.href = "index.php?page=orders";</script>';
                } else {
                    echo '<script>alert("Có lỗi không mong muốn xảy ra. Vui lòng thử lại sau!")</script>';
                }
            }
        }
    }
?>