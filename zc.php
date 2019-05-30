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
  .c03{text-align:center;
      font-size:2em;}
  .button{
    border: 2px solid black;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
  }
  .button:hover{

  }
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
                $iderr = "只允许数字"; //记得做搜索，看ID是否重复//ID是否允许字母，长度是否限制
                }
          }
          if (empty($_POST["code"])) {
            $codeerr = "Please input your code";
          } else {
            if (!preg_match("/^[0-9]*$/",$id)) {
                $iderr = "只允许数字"; //把密码搞复杂，不能只有数字
                }
            $code = test_input($_POST["code"]);
          }
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
<h1 class='c01'>Welcome to Todolist</h1>
<p class='c03' >Please fill out a form.</p>
<br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class='c02'> 
   <p class='c02'>Your id: <input type="text" name="id">
   <span class="error">* <?php echo $iderr;?></span></p>
   <br/>
   <p class='c02'>Your code: <input type="text" name="code">
   <span class="error">* <?php echo $codeerr;?></span></p>
   <br><br> 
<button>

  </button>
</form>
<?php
global $id,$code;
$pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $sql = "INSERT users_tbl (users_id,users_code) VALUES ('$id','$code')";
    $pdo->exec($sql);
$pdo = null;
?>
</body>