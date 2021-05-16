<?php
    namespace arkenzo\Framework\Controller;

    use arkenzo\Framework\Controller\Controller;
    class AboutController extends Controller{
        public function index(){
            require $this->intro();
        }

        public function intro(){
            require $this->headerView;
            require $this->viewFolder . 'About/home.php';
            require $this->footerView;
        }

        public function history(){
            require $this->headerView;
            require $this->viewFolder . 'About/history.php';
            require $this->footerView;
        }

        public function map(){
            require $this->headerView;
            require $this->viewFolder . 'About/map.php';
            require $this->footerView;
        }
    }