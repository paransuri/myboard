<?
    session_start();
    error_reporting(1);
    ini_set("display_errors", 1);


    $connect = mysqli_connect("localhost","korea","a1234","korea");

    if(mysqli_connect_error()){
        echo "mysql 접속중 오류 발생";
        echo mysqli_connect_error();
    }