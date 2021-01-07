<?
    include "lib.php";

    $idx = $_POST['idx'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $memo = $_POST['memo'];
    $pwd = $_POST['pwd'];

    //mysql보안을 위해 mysqli_real_escape_string()함수를 이용해야된다.
    $idx = mysqli_real_escape_string($connect,$idx);
    $name = mysqli_real_escape_string($connect,$name);
    $subject = mysqli_real_escape_string($connect,$subject);
    $memo = mysqli_real_escape_string($connect,$memo);
    $pwd = mysqli_real_escape_string($connect,$pwd);


    //idx가 있을때만 수정
    if($idx){
        
        $query = "select * from my_board where idx='$idx' and pwd=password('$pwd') ";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);

        //비밀번호가 틀렸을시 전 화면으로이동
        if(!$data[idx]){
            echo "
            <script>
            alert('비밀번호가 달라 수정이 불가능합니다.');
            history.back(1);
            </script>
            ";
            exit;
        }

        $query = "update my_board set name='$name',
            subject='$subject',
            memo='$memo'
            where idx='$idx'";

        mysqli_query($connect,$query);

    } else { //idx가 없으면 삽입

    $regdate = date("Y-m-d H:i:s");
    $ip = $_SERVER[REMOTE_ADDR];

    $query = "insert into my_board(name, subject, memo, regdate, ip, pwd)
        values('$name','$subject','$memo','$regdate','$ip',password('$pwd'))";

    mysqli_query($connect,$query);
    }
?>

<script>
    location.href='list.php';
</script>