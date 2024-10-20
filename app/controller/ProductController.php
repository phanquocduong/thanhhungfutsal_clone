<?php
    class ProductController {
        private $product;

        function __construct() {
            $this->product = new ProductModel();
        }

        private function renderView($view, $data, $numberPages = null) {
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

        public function viewDetail() {
            if (isset($_GET['id'])) {
                $data['product'] = $this->product->getProduct($_GET['id']);
                if ($data['product'] == null) {
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    $data['relatedProducts'] = $this->product->getRelatedProducts($data['product']['madm'], $_GET['id']);
                    $this->renderView('product-details', $data);
                }
            }
        }

        public function viewAllProducts() {
            $this->viewProducts('allproducts', '', [], 'moiramat DESC');
        }

        public function viewTfShoes() {
            $this->viewProducts('tfshoes', 'WHERE madm = 1', [], 'moiramat DESC');
        }

        public function viewIcShoes() {
            $this->viewProducts('icshoes', 'WHERE madm = 2', [], 'moiramat DESC');
        }

        public function viewAccessories() {
            $this->viewProducts('accessories', 'WHERE madm = 3', [], 'phantramgiamgia DESC');
        }

        public function viewHotSales() {
            $this->viewProducts('hotsales', 'WHERE phantramgiamgia > 0', [], 'phantramgiamgia DESC');
        }

        public function viewSearchProducts() {
            $this->viewProducts('search-products', 'WHERE tensp LIKE "%'.$_GET['keyword'].'%"', [], 'moiramat DESC');
        }
    }
?>
