<?php
    namespace arkenzo\Framework\Controller;

    use arkenzo\Framework\Controller\Controller;
    use arkenzo\Framework\App\Model\BoardModel;

    class boardController extends Controller{
        public function index(){
            $board_list = BoardModel::getModel()->getBoardList();
            require $this->headerView;
            require $this->viewFolder . 'Board/index.php';
            require $this->footerView;
        }

        public function write(){
            require $this->headerView;
            require $this->viewFolder . 'Board/write.php';
            require $this->footerView;
        }

        public function view($idx){
            $board_view = BoardModel::getModel()->getBoardView($idx);
            require $this->headerView;
            require $this->viewFolder . 'Board/view.php';
            require $this->footerView;
        }

        public function add(){
            $_SESSION['msg'] = '글작성 실패';
            if(isset($_POST["submit_insert_board"])){
                BoardModel::getModel()->addBoard($_POST["title"], $_POST["content"], $_POST["writer"]);
                $_SESSION['msg'] = '글작성 성공';
            }
            header('location:/board/index');
        }

        public function updateBoard($idx){
            $board_view = BoardModel::getModel()->getBoardView($idx);
            require $this->headerView;
            require $this->viewFolder . 'Board/update.php';
            require $this->footerView;
        }

        public function update($idx){
            $_SESSION['msg'] = '글수정 실패';
            if(isset($_POST["submit_update_board"])){
                BoardModel::getModel()->updateBoard($idx, $_POST["title"], $_POST["writer"], $_POST["content"] );
                $_SESSION['msg'] = '글작성 성공';
            }
            header('location:/board/index');
        }

        public function deleteBoard($idx){
            require $this->viewFolder . 'Board/delete.php';
        }

        public function delete($idx){
            BoardModel::getModel()->deleteBoard($idx);
            header('location:/board/index');
        }
    }