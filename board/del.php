<?
    include "lib.php";

    $idx = $_POST['idx'];
    $pwd = $_POST['pwd'];


    //mysql보안을 위해 mysqli_real_escape_string()함수를 이용해야된다.
    $idx = mysqli_real_escape_string($connect,$idx);
    $pwd = mysqli_real_escape_string($connect,$pwd);

    //query문에서 password로 입력시 알아서 암호화가 진행되서 데이터베이스로 저장
    $query = "select * from my_board where idx='$idx' and pwd=password('$pwd') ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    //비밀번호가 틀렸을시 전 화면으로이동
    if(!$data[idx]){
        echo "
       <script>
       alert('비밀번호가 달라 삭제가 불가능합니다.');
       history.back(1);
       </script>
            ";
         exit;
    }

    $query = "delete from my_board where idx='$idx'";

    mysqli_query($connect,$query);
?>

<script>
    location.href='list.php';
</script>