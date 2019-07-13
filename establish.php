<?php
session_start();
if($_SESSION['admin'])
{
    $date = $todoname =$comment= "";
    $date =$_POST["date"];  
    $todoname =$_POST["todoname"];  
    $comment =$_POST["comment"];  
    $con =$_POST["con"];

    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo ->prepare('INSERT INTO task_tbl(`users_id`,`todoname`,`date`,`comment`,`con`,`finish`) VALUES (:id,:todoname,:dates,:comment,:con,:finish)');
    $q -> bindValue(':id', $_SESSION['id']); 
    $q -> bindValue(':todoname', $todoname); 
    $q -> bindValue(':dates', $date); 
    $q -> bindValue(':comment', $comment); 
    $q -> bindValue(':con', $con);
    $q -> bindValue(':finish', 'No'); 
    $q -> execute();
    echo "<script>alert('添加成功');window.location.href='homes.html'</script>";
    
   
$pdo = null;
}
else echo "<script>alert('请先进行登录');window.location.href='establish.html'</script>";
?>