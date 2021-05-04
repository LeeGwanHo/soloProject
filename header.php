<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>

<div id="top">
<a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/index.php" id="logo"><img src="http://<?=$_SERVER['HTTP_HOST']?>/lkhtest/solopage/image/logo_main_left_top.png" alt="축구1"></a>
    <h3><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/index.php">SOCCER PAGE</a></h3>
    <ul id="toplist">
    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/index.php">메인</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/memo/message_box.php?mode=rv">쪽지</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/board/board_list.php">게시판</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/image_board/board_list.php">이미지</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/notice/notice_list.php">공지사항</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/lkhtest/solopage/free/list.php">QnA</a></li>
    </ul>
    <ul id="toplist2">
        

        <?php
            if(!$userid) {
                ?>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/member/member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/login/login_form.php">로그인</a></li>
                <?php
            } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
                ?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/login/logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/member/member_modify_form.php">정보 수정</a></li>
	            <li> | </li>
	            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/member/member_delete_form.php">회원 탈퇴</a></li>
                <?php
            }
        ?>
        <?php
            if($userlevel==1) {
                ?>
                <li> | </li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/lkhtest/solopage/admin/admin.php">관리자 모드</a></li>
                <?php
            }
        ?>
    </ul>
</div>