<?

    include "lib.php";

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    $uid = mysqli_real_escape_string($connect,$uid);
    $pwd = mysqli_real_escape_string($connect,$pwd);

    $query = "select * from members where uid='$uid' and pwd=password('$pwd')";

    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if($data){

        $_SESSION['isLogin'] = time();

    ?>
        <!-- 로그인 성공 시 게시판으로 이동하게 한다. -->
        <script>
            location.href='../board/list.php';
        </script>

    <?

    } else {
        echo "
        <script>
        alert('로그인 정보가 올바르지 않습니다.');
        history.back(1);
        </script>";
    }
