<?php
    namespace arkenzo\Framework\Controller;

    use arkenzo\Framework\Controller\Controller;
    class SitemapController extends Controller{
        public function index(){
            require $this->headerView;
            require $this->viewFolder . 'Sitemap/sitemap.php';
            require $this->footerView;
        }
    }