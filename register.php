<?php
session_start();
$_SESSION['admin'] = null;
$_SESSION['id'] = null;
$id = $pwd = "";
$iderr = $pwderr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_REQUEST["id"])) {
            echo "<script>alert('请记得输入用户名呀');window.location.href='register.html'</script>";
          } else {
            $id = test_input($_REQUEST["id"]);
          }
          if (empty($_REQUEST["pwd"])) {
            echo "<script>alert('呀，没有密码是无法登录的哦');window.location.href='register.html'</script>";
          } 
          else {
            $pwd = test_input($_REQUEST["pwd"]);
          }
    }
    
    function test_input($data)
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
      echo "<script>alert('注册成功')</script>";
    }
    else {
        echo "<script>alert('请换一个用户名');window.location.href='register.html'</script>";
    }
$pdo = null;
?>
