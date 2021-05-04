<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/lkhtest/solopage/db/db_connect.php";
    $id = $_POST["id"];

    $sql = "delete from members  where id='$id'";
    $value = mysqli_query($con, $sql) or die('error : ' . mysqli_error($con));
    if($value){
        echo "<script>
            alert('고객님 감사했습니다');
        </script>";
    }else {
        echo "<script>
            alert('고객님 탈퇴 실패했습니다');
        </script>";
    }
    include_once $_SERVER['DOCUMENT_ROOT'] . "/lkhtest/solopage/login/logout.php";
?>






