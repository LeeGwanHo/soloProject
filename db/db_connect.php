<?php
    date_default_timezone_set("Asia/Seoul");
    $server_name = "localhost";
    $user_name = "root";
    $pass = "123456";
    $db_name = "sample1";

    $con = mysqli_connect($server_name, $user_name, $pass);
    $query = "create database if not exists sample1";
    // 쿼리문을 실행하고 결과값이 오류가 나오면 프로그램 정지 후 메세지 출력
    // 쿼리문 실행
    $result = $con->query($query) or die($con->error);
    // db선택
    $con->select_db($db_name) or die($con->error);
    // 결과가 잘못 되었을경우 경고후 뒤로가기
    function alert_back($message){
        echo("
			<script>
			alert('$message');
			history.go(-1)
			</script>
			");
    }

    function input_set($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>