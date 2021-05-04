<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>관호 페이지</title>
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/css/style.css?after4">
        <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/login/css/login.css?after5">
	    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="js/login.js"></script>
	    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/js/slide.js" defer></script>
    </head>
    <body>
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/lkhtest/solopage/header.php"; ?>
        </header>
        <section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/lkhtest/solopage/main_bar.php"; ?>
            <div id="main_content">
                <div id="login_box">
                    <div id="login_title">
                        <span>로그인</span>
                    </div>
                    <div id="login_form">
                        <form  name="login_form" method="post" action="login.php">
                            <ul>
                                <li><input type="text" name="id" placeholder="아이디" ></li>
                                <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                            </ul>
                            <div id="login_btn">
                                <a href="#"><img src="../image/login.png" onclick="check_input()"></a>
                            </div>
                        </form>
                    </div> <!-- login_form -->
                </div> <!-- login_box -->
            </div> <!-- main_content -->
        </section>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/lkhtest/solopage/footer.php"; ?>
        </footer>
    </body>
</html>

