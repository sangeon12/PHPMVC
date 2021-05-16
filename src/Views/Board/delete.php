<?php
    echo "<script>
        if(confirm('삭제하시겠습니까?') == true){
            alert('삭제되었습니다.');
            location.href='/board/delete/". $idx . "';
        }else{
            alert('취소되었습니다');
            location.href='/board/index';
        } 
    </script>";