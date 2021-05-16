<?php
namespace arkenzo\Framework\Controller;

use arkenzo\Framework\Controller\Controller;

class NullController extends Controller
{
    public function index($msg)
    {
        require $this->headerView;
        require $this->viewFolder . 'errorPage.php';
        require $this->footerView;
    }
}