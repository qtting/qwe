<?php
session_start();
if($_SESSION['admin'])
{
        function testdata($data)
        {
        $data = trim($data);
        $data = stripslashes($data); 
        return $data;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
                if (empty($_REQUEST["date"])) {
                echo "<script>alert('请输入截止日期');window.location.href='homes.php'</script>";
                } 
        }
        //$num = $_SESSION['number'];
        $number = $_POST['number'];
        $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
        $pdo->exec('set names utf8');
        //echo $number;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="UPDATE task_tbl set todoname = '{$_POST['todoname']}' where number = '{$number}'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $sql="UPDATE task_tbl set date = '{$_POST['date']}' where number = '{$number}'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $sql="UPDATE task_tbl set comment='{$_POST['comment']}' where number = '{$number}'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        //$affect_row = $stmt->rowCount();
        echo "<script>alert('修改成功');window.location.href='homes.php'</script>";
        $pdo = null;  
}
else    echo "<script>alert('请先登录');window.location.href='login.php'</script>";
?>