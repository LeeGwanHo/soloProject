<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>관호 페이지</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/css/style.css?after4">
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/member/css/member.css?after4">
		<script src="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/member/js/member_modify.js"></script>
		<script src="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/js/slide.js" defer></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body onload="slide_func()">
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/lkhtest/solopage/header.php"; ?>
		</header>
        <?php
            include_once $_SERVER['DOCUMENT_ROOT']."/lkhtest/solopage/db/db_connect.php";
            $sql = "select * from members where id='$userid'";
			//쿼리문을 실행 ->결과값을 레코드셋 저장
            $result = mysqli_query($con, $sql);
			//레코드 셋에서 첫번째 레코드를 연관배열 저장($row)
            $row = mysqli_fetch_array($result);

            $pass = $row["pass"];
            $name = $row["name"];

            $email = explode("@", $row["email"]);
            $email1 = $email[0];
            $email2 = $email[1];

            mysqli_close($con);
        ?>
		<section>
            
			<div id="main_content">
				<div id="join_box">

					<h2>회원 정보 수정</h2>
					<form name="member_form" method="post" action="member_modify.php">
						<table>
							<tr>
								<th>사용자 ID</th>
								<td><?= $userid ?>	<input type="hidden" name="id" value="<?=$userid?>">
							</tr>
							<tr>
								<th>비밀번호</th>
								<td><input type="password" name="pass" value="<?= $pass ?>">
									<!--									4~12자리의 영문,숫자,특수문자(!, @, $, %, ^,&,*)만 가능-->
								</td>
							</tr>
							<tr>
								<th>비밀번호 확인</th>
								<td colspan="2"><input type="password" name="pass_confirm" value="<?= $pass ?>"></td>
							</tr>
							<tr>
								<th>성명</th>
								<td><input type="text" name="name" value="<?= $name ?>">
								</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><input type="text" name="email1" value="<?= $email1 ?>">@<input type="text" name="email2" value="<?= $email2 ?>">

								</td>
							</tr>
						</table>
						<br>
						<div>
							<input type="submit" value="수정">
							<input type="button" value="취소" onclick="location.href='http://<?=$_SERVER['HTTP_HOST']?>/ka_web_page/index.php'">
						</div>
					</form>
				</div> <!-- join_box -->
			</div> <!-- main_content -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/lkhtest/solopage/footer.php"; ?>
		</footer>
	</body>
</html>

