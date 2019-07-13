<?php
session_start();
$_SESSION['admin'] = null;
$_SESSION['id'] = null;
$id = $pwd = "";   
$id = testdata($_REQUEST["id"]);         
$pwd = testdata($_REQUEST["pwd"]);  

    function testdata($data)
    {
    $data = trim($data);
    $data = stripslashes($data); 
    return $data;
    }
   
$pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("select users_id from uses_tbl where users_id = :id "); 
    $stmt->bindvalue(':id',$id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result['users_id']!=$id)
    {
      $q = $pdo ->prepare('INSERT INTO uses_tbl(`users_id`,`users_code`) VALUES (:id,:pwd)');
      $q -> bindValue(':id', $id); 
      $pwd = password_hash($pwd,PASSWORD_DEFAULT);
      $q -> bindValue(':pwd', $pwd);
      $q -> execute();
      $_SESSION['admin'] = true;
      $_SESSION['id'] = $id;
      echo "<script>alert('注册成功，用户'+$id);window.location.href='myhome.html'</script>";
    }
    else {
        echo "<script>alert('请换一个用户名');window.location.href='register.html'</script>";
    }
$pdo = null;
?>
