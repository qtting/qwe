<?php
session_start();
if($_SESSION['admin'])
{
    $number = $_GET['number'];
    //echo $number;
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo ->prepare('DELETE from task_tbl where number = :number');
    $q -> bindValue(':number', $number); 
    $q -> execute();
    echo "<script>alert('删除成功');window.location.href='homes.php'</script>";  
$pdo = null;
}
else echo "<script>alert('请先进行登录');window.location.href='establish.html'</script>";
?>