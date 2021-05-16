<?php
    namespace arkenzo\Framework\Controller;

    use arkenzo\Framework\Controller\Controller;
    class HomeController extends Controller{
        public function index(){
            require $this->headerView;
            require $this->viewFolder . 'Home/home.php';
            require $this->footerView;
        }
    }