<!DOCTYPE HTML> 
<html>
<head>
<meta charset="utf-8">
<title>ToDoList</title>
<style>
  a{text-decoration:none;
  }
  body{font-size:100%;}
  .c01{
    font-family:"Times New Roman",Times,serif;
    text-align:center;
    font-size:4em;
  }
  .c02{
    text-align:center;
  }
  body{ background: linear-gradient(to right, white , #87CEFA); }
  </style>
</head>
<body> 

<?php
$id = $code = "";
$iderr = $codeerr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["id"])) {
            $iderr = "Please input your id";
          } else {
            $id = test_input($_POST["id"]);
            if (!preg_match("/^[0-9]*$/",$id)) {
                $iderr = "只允许数字"; 
                }
          }
          if (empty($_POST["code"])) {
            $codeerr = "Please input your code";
          } else {
            $code = test_input($_POST["code"]);
          }
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $cx = $pdo->query("'select * from users where users_id='$id' and users_code='$code''");
    if($cx='False')
    {
      $cx = '请输入正确密码或用户名';
    }
    else{
      $cx = "";
    }
    $pdo = null;
    }

    function test_input($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    ?>
<br/><br/><br/><br/>
<h1 class="c01">Welcome to Todolist</h1>
<br/><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="c02">
   <p class="c02">用户名:
    <input type='text' name='id'>* 
    </p>
   <br/>
   <p class="c02"> 密码: 
    <input type="text" name="code">* 
    </p>
   <?php echo $codeerr;?>
   <br/><br/>
   <?php echo $iderr;?>
   <br/><br/>
   <!--*<?php echo $cx;?>-->
   <input type="submit" name="submit" value="Submit"> 
   <br/><br/>
</form>
<a href="zc.php" target="_blank">
<p class="c02">Don't have account?
</p></a>

</body>