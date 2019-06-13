<?php
if($_SESSION['admin'])
{
    $date = $todoname =$comment= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["date"])) {
            echo "<script>alert('截止时间不能为空');window.location.href='establish.html'</script>";
          }else{
            $date =$_POST["date"];
          }

          if (empty($_POST["todoname"])) {
            echo "<script>alert('请输入任务名称');window.location.href='establish.html'</script>";
          } else {
            $todoname =$_POST["todoname"];
          }
    }

    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $pdo ->prepare('INSERT INTO task_tbl(`users_id`,`todoname`,`date`,`comment`) VALUES (:id,:todoname,:dates,:comment)');
    $q -> bindValue(':id', $_SESSION['id']); 
    $q -> bindValue(':todoname', $todoname); 
    $q -> bindValue(':dates', $date); 
    $q -> bindValue(':comment', $comment); 
    $q -> execute();
    echo "<script>alert('添加成功')</script>";
    }
   
$pdo = null;
}
?>