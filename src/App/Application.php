<?php
    namespace arkenzo\Framework\App;

    // arkenzo\Framework\board => arkenzo\Framework\Controller\BoardController
    class Application
    {
        private static $controllerPrefix = '\\arkenzo\\Framework\\Controller\\';
        private static $controllerPostfix = 'Controller';
        private $controller = null;
        private $action = null;

        public function __construct()
        {
            $url = "";
            if(isset($_GET['url'])) {
                // /board/ =>  /board
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
            }
            // /board/1/2 => board   1    2
            $params = explode('/', $url);
            $counts = count($params);
            $controllerName = Application::$controllerPrefix . 'Home' . Application::$controllerPostfix;
            
            if(isset($params[0])) {
                if($params[0]) {
                    // boardController => BoardController
                    $controllerName = Application::$controllerPrefix . ucfirst($params[0]) . Application::$controllerPostfix;
                }
            }

            $this->action = 'index';
            // board/read/1
            try{
                if(class_exists($controllerName)) {
                    $this->controller = new $controllerName();
                }else {
                    throw new \Exception('해당 요청은 처리할 수 없습니다.');
                }
                if(isset($params[1])) {
                    if($params[1]) $this->action = $params[1];
                }
                // board/read/1/2/3
                if(!method_exists($this->controller, $this->action)) {
                    throw new \Exception('해당 요청을 처리할 함수가 없습니다.');
                }

                switch($counts) {
                    case '0' :
                    case '1' :
                    case '2' :
                        $this->controller->{$this->action}();
                        break;
                    case '3' :
                        $this->controller->{$this->action}($params[2]);
                        break;
                    case '4' :
                        $this->controller->{$this->action}($params[2],$params[3]);
                        break;                        
                    case '5' :
                        $this->controller->{$this->action}($params[2],$params[3],$params[4]);
                        break;     
                    default :   
                        throw new \Exception('해당 페이지가 존재하지 않습니다.');
                        break;
                }


            }catch(\Exception $e){
                $this->controller = new \arkenzo\Framework\Controller\NullController();
                $this->controller->index($e->getMessage());
            }




        }
    }