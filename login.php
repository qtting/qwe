<?php
session_start();
$_SESSION['id']=null;
$_SESSION['admin'] = null;
$id = $code = "";    
$id = test_input($_POST["id"]);         
$pwd = test_input($_POST["pwd"]);


    function test_input($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
    }

    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("select users_code from uses_tbl where users_id = :id "); 
    $stmt->bindvalue(':id',$id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($pwd,$result['users_code']))
    {
      $_SESSION['admin'] = true;
      $_SESSION['id'] = $id;
      echo "<script>alert('登录成功,'+$id);window.location.href='myhome.html'</script>";
    }
    else {
      echo "<script>alert('请输入正确的密码或用户名');window.location.href='login.html'</script>";
    }
   
$pdo = null;
    ?>