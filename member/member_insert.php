<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/lkhtest/solopage/db/db_connect.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/lkhtest/solopage/db/create_table.php";
    create_table($con, 'members');//회원가입테이블
    create_table($con, 'delete_members');//회원탈퇴 저장테이블(트리거)

    //*******************
    //입력된 데이타 체크
    //*******************
    $id = input_set($_POST["id"]);
    $pass = input_set($_POST["pass"]);
    $name = input_set($_POST["name"]);
    $email1 = input_set($_POST["email1"]);
    $email2 = input_set($_POST["email2"]);
    $email = $email1 . "@" . $email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    //************************************ 
    //입력된 데이타 패턴체크(이름, 이메일)
    //************************************
    $pattern = "/[가-힣]+/"; // 한글 소리 마디
    if (!preg_match($pattern, $name)) {
        alert_back($name."형식에 맞지 않음");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        alert_back($email."형식에 맞지 않음");
        exit;
    }
    //******************
    //트랜잭션 처리 시작
    //******************
    $success = true;  //트랜잭션 플래그선정
    $result = mysqli_query($con, "SET AUTOCOMMIT=0");       //반드시 자동커밋을 0으로 설정해야됨
    $result = mysqli_query($con, "START TRANSACTION");      //트랜잭션 시작
    
    $sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
    $sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

    $result = mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
   
    if(!$result) $success = false;  //오류발생으로 플래그값을 false 선정

    if($success == false){
        $result = mysqli_query($con,"ROLLBACK");
        alert_back("삽입중에 문제발생으로 ROLLBACK");
    }else{
        $result = mysqli_query($con,"COMMIT");
    }
    $result = mysqli_query($con, "SET AUTOCOMMIT=1");   //반드시 자동커밋을 1으로 설정 트랜잭션 처리완료

    //*******************
    //데이타베이스 CLOSE
    //*******************
    mysqli_close($con);

    echo "
         <script>
              location.href = 'http://{$_SERVER['HTTP_HOST']}/lkhtest/solopage/index.php';
         </script>
     ";
?>

