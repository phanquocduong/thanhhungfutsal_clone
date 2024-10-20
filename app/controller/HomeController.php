<?php
    class HomeController {
        private $product;

        function __construct() {
            $this->product = new ProductModel();
        }

        private function renderView($view, $data = []) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }
        
        public function viewHome() {
            $data['headerProducts'] = $this->product->getProducts('', [], 'phantramgiamgia DESC', 0, 4);
            $data['footerProducts'] = $this->product->getProducts('WHERE madm = 1', [], 'moiramat DESC', 0, 8);
            $this->renderView('home', $data);
        }
    }
?>