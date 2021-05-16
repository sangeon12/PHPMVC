<div class="container">
    <h2>여기는 게시판입니다.</h2>
    <p>게시글이 없습니다.</p>

    <ul class="board-list">
        <?php foreach($board_list as $value){ ?>
        <li><a href="/board/view/<?=$value->idx?>">제목 : <?=$value->title?> 글쓴이 : <?=$value->writer?> 날짜 : <?=$value->wdate?></a><button onclick="location.href='/board/updateBoard/<?=$value->idx?>'">글수정</button><button onclick="location.href='/board/deleteBoard/<?=$value->idx?>'">삭제</button></li>
        <?php } ?>
    </ul>
    <button onclick="location.href='/board/write'">글쓰기</button>
    <button onclick="location.href='/board/n'"></button>
</div>
