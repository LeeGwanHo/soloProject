<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>관호 페이지</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/lkhtest/solopage/css/style.css?after4">
		<link rel="stylesheet" href="./css/member.css">
		<script src="./js/member.js" defer></script>
		<script src="http://<?= $_SERVER["HTTP_HOST"] ?>/lkhtest/solopage/js/slide.js" defer></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	
	<body onload="slide_func()">
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/lkhtest/solopage/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT']."/lkhtest/solopage/main_bar.php"; ?>
			<div id="main_content">
				<div id="join_box">
					<h2>회원 가입</h2>
					<form name="member_form" method="post" action="./member_insert.php">
						<table>
							<tr>
								<th>사용자 ID</th>
								<td><input type="text" name="id">
									<input type="button" value="중복 확인" onclick="check_id()"></td>
							</tr>
							<tr>
								<th>비밀번호</th>
								<td><input type="password" name="pass">
								</td>
							</tr>
							<tr>
								<th>비밀번호 확인</th>
								<td colspan="2"><input type="password" name="pass_confirm"></td>
							</tr>
							<tr>
								<th>성명</th>
								<td><input type="text" name="name">
								</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><input type="text" name="email1">@<input type="text" name="email2">
								</td>
							</tr>
						</table>
						<br>
						<div>
							<input type="button" value="회원가입" onClick="check_input()">
							<input type="button" value="초기화" onClick="reset_form()">
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

