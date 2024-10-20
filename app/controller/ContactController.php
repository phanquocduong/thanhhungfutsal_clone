<?php
    class ContactController {
        private function renderView($view) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        public function viewContact() {
            $this->renderView('contact');
        }
    }
?>