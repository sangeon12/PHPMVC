<div class="container">
    <h2>여기는 게시판에 글을 수정하는곳입니다.</h2>
    <p>이 페이즈는 글수정하기 버튼을 눌러 접근할 수 있습니다.</p>
    <div class="board-update">
        <form action="/board/update/<?= $idx ?>" method="POST">
            <p>글 제목 : <input type="text" name="title" id="title" style="width:300px" value="<?=$board_view->title?>"></p>
            <p>글쓴이 : <input type="text" name="writer" id="writer" style="width:200px" value="<?=$board_view->writer?>"></p>
            <p>글내용 : <textarea name="content" id="content" style="width:300px; height:80px"><?=$board_view->content?></textarea></p>
            <p><input type="submit" name="submit_update_board" value="저장하기"></p>
        </form>
        
    </div>
    <button onclick="location.href='/board/index'">목록으로</button>
</div>