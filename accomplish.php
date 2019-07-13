<?php
session_start();
if($_SESSION['admin'])
{
    $number = $_GET['number'];
    //echo $number;
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //改变finish的值 no->yes
    $stmt = $pdo->prepare("UPDATE task_tbl set finish = 'Yes' where number = '{$number}'");
    $stmt->execute();
    echo "<script>alert('任务完成~');window.location.href='homes.php'</script>";  
$pdo = null;
}
else echo "<script>alert('请先进行登录');window.location.href='login.html'</script>";
?>