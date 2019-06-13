<?php
session_start();
$_SESSION['id']=null;
$_SESSION['admin'] = null;
$id = $code = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["id"])) {
            echo "<script>alert('用户名不能为空');window.location.href='login.html'</script>";
          }else{
            $id = test_input($_POST["id"]);
          }
          if (empty($_POST["pwd"])) {
            echo "<script>alert('请输入密码');window.location.href='login.html'</script>";
          } else {
            $pwd = test_input($_POST["pwd"]);
          }
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
  
    $pdo = null;
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
    $stmt = $pdo->prepare("select users_code from uses_tbl where users_id = :id "); 
    $stmt->bindvalue(':id',$id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($pwd,$result['users_code']))
    {
      $_SESSION['admin'] = true;
      $_SESSION['id'] = $id;
      echo "<script>alert('登录成功');window.location.href='home.html'</script>";
    }
    else {
      echo "<script>alert('请输入正确的密码或用户名');window.location.href='login.html'</script>";
    }
   
$pdo = null;
    ?>