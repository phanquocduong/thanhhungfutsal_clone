<?php
    class OrderController {
        private $order;

        function __construct() {
            $this->order = new OrderModel();
        }

        private function renderView($view, $data = []) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        public function viewOrderDetails() {
            $data['order'] = $this->order->getOrder($_GET['id']);
            $data['order-details'] = $this->order->getOrderDetails($_GET['id']);
            $this->renderView('order-details', $data);
        }
    }
?>