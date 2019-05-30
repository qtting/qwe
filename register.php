<?php
$id = $code = "";
$iderr = $codeerr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["id"])) {
            $iderr = "Please input your id";
            echo $iderr;
          } else {
            $id = test_input($_POST["id"]);
          }
          if (empty($_POST["code"])) {
            $codeerr = "Please input your code";
            echo $codeerr;
          } 
          else {
            $code = test_input($_POST["code"]);
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
    $sql = "select  *  from  uses_tbl   where  users_id = $id ";
    $result = $pdo->query($sql);
    if(!$result)
    {
      $sql = "INSERT uses_tbl (users_id,users_code) VALUES ('$id','$code')";
      echo "<script>alert('注册成功')location.href='login.html'</script>;
    }
    else {
      $result = '请换一个用户名'；
      echo $result;
    }
$pdo = null;
?>