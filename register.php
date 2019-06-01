<?php
$id = $pwd = "";
$iderr = $pwderr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_REQUEST["id"])) {
            $iderr = "Please input your id";
            echo $iderr;
          } else {
            $id = test_input($_REQUEST["id"]);
          }
          if (empty($_REQUEST["pwd"])) {
            $pwderr = "Please input your password";
            echo $pwderr;
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
$pdo = new PDO("mysql:host=localhost;dbname=users",'root','');//修改数据库
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("select * from users_tbl where users_id = :id "); 
    if($stmt)
    {
      $q = $pdo ->prepare('INSERT INTO users_tbl(users_id,users_code) VALUES (:id,:pwd);')
      $q -> bindValue(':users_id', $id); 
      $pwd = password_hash($pwd,PASSWORD_DEFAULT);
      $q -> bindValue(':users_code', $pwd);
      $q -> execute();   
        echo "<script>alert('注册成功')</script>";
    }
    else {
      $result = '请换一个用户名';
      echo $result;
    }
$pdo = null;
?>
