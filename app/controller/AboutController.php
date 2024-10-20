<?php
    class AboutController {
        private function renderView($view) {
            $viewPath = 'app/view/' . $view . '.php';
            require_once $viewPath;
        }

        public function viewAbout() {
            $this->renderView('about');
        }
    }
?>