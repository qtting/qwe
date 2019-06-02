<?php
$id = $code = "";
$iderr = $codeerr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["id"])) {
            $iderr = "Please input your id";
          }else{
            $id = test_input($_POST["id"]);
          }
          if (empty($_POST["pwd"])) {
            $codeerr = "Please input your password";
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
    $stmt = $pdo->prepare("select * from uses_tbl where users_id = :id "); 
    if($stmt)
    {
      $q = $pdo ->prepare("select * from uses_tbl where users_code = :pwd ");
      if(!$q)
        {echo "<script>alert('登录成功')</script>";}
      else {echo "<script>alert('请输入正确的用户名或密码');window.location.href='login.html'</script>";}
    }
    else {
      echo "<script>alert('请输入正确的用户名或密码');window.location.href='login.html'</script>";
    }
$pdo = null;
    ?>
