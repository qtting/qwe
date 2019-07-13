<?php
session_start();
if($_SESSION['admin'])
{
    $con = $_POST['con'];
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("select*from task_tbl where users_id = :id and con = :con"); 
    $stmt->bindvalue(':id',$_SESSION['id']);
    $stmt->bindvalue(':con',$con);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $j_result = json_encode($result);
    echo $j_result;
    $pdo = null;
 }
 else echo "<script>alert('请先进行登录');window.location.href='login.html'</script>";
?>