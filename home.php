<?php
session_start();
if($_SESSION['admin'])
{
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("select*from task_tbl where users_id = :id "); 
    $stmt->bindvalue(':id',$_SESSION['id']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);
    $j_result = json_encode($result);
    echo $j_result;
    $pdo = null;
    // $j_todoname = json_encode($todoname);
    // $j_comment = json_encode($comment);
    // $j_date = json_encode($date);
    // $j_con = json_encode($con);
    // $json_data = json_encode(array_merge($j_todoname,$j_comment,$j_date,$j_flag,$j_con));
    
    // echo file_put_contents($flag, $json_data);

    //echo $finish;
    // echo   
    // 完成状态，如果完成了，如果没有完成
//     if($finish == 'No')
//     {
//         //echo $finish;
//         //echo $flag;
//         if($flag%2!=0)
//             include'time1.php';
//         else include'time2.php';
//     }
//     else{
//         //echo 'budeng';
//         if($flag%2!=0)
//             include'time5.php';
//         else include'time6.php';
//     }
 }
 else echo "<script>alert('请先进行登录');window.location.href='login.html'</script>";
?>