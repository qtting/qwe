<?php
session_start();
function testdata($data)
    {
    $data = trim($data);
    $data = stripslashes($data); 
    return $data;
    }
if($_SESSION['admin']) 
{
    $id = $_SESSION['id'];
    $friends = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
          if (empty($_REQUEST["friends"])) {
            echo "<script>alert('请输入好友名称');window.location.href='makefriends.html'</script>";
          } 
          else {
            $friends = testdata($_REQUEST["friends"]);
          }
    }
    $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //检查用户所添加好友是否重复
    $stmt = $pdo->prepare("select*from friends_tbl where users_id = :id "); 
    $stmt->bindvalue(':id',$_SESSION['id']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    $fla = 0;
    foreach($result as $value){
      if($value['friends']==$friends){
        //echo '重复';
        echo "<script>alert('您已添加过该好友');window.location.href='makefriends.html'</script>";
        $fla = $fla+1;
      }

    }
    //echo $fla;
        //添加好友
        if($fla == 0)
        {
          $q = $pdo ->prepare('INSERT INTO friends_tbl(`users_id`,`friends`) VALUES (:id,:friends)');
          $q -> bindValue(':id', $id); 
          $q -> bindValue(':friends', $friends);
          $q -> execute();
          echo "<script>alert('添加成功');window.location.href='friends.php'</script>";
        }
      
}
?>