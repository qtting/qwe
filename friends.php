<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>TODOList</title>
<style>
    .navigation{
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
    float: left;
}
.size{
    text-align:center;
    width: 400px;
    float: left;
}
.active{
    text-align:center;
    width: 400px;
    background-color: #4CAF50;
    float: left;
}
.create {
    width: 200px;
    text-align: center;
  }
  .but{
    border: 2px solid #4CAF50;
    padding: 10px 20px;
    border-radius: 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin-left: 30px;
    margin-top: 20px;
    transition-duration: 0.4s;
    cursor: pointer;
    background-color:white;
    color: #4CAF50;
}
.but:hover{ 
    border: 2px solid #4CAF50;
    padding: 10px 20px;
    border-radius: 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin-left: 30px;
    margin-top: 20px;
    transition-duration: 0.4s;
    cursor: pointer;
    background-color:#4CAF50;
    color: white;
  }
    </style>
    </head>
    <body>
            <ul class="navigation">
                <li><a href="myhome.html"class="active">我的主页</a></li>
                <li><a href="friends.php"class="size">我的朋友</a></li>
                <li><a href="login.html"class="size">退出登录</a></li>
            </ul>
            <a href="makefriends.html"class="but">添加好友</a>
            <br/><br/>
            <?php
            if($_SESSION['admin'])
                {
                //查找用户好友名称
                $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
                $pdo->exec('set names utf8');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare("select friends from friends_tbl where users_id = :id "); 
                $stmt->bindvalue(':id',$_SESSION['id']);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //这里只把好友的名称取出来，还没有和uses_tbl连起来看好友有些什么任务
                $flag = 0;
                foreach ($result as $value) {
                    $friends = $value['friends'];
                    $stmt = $pdo->prepare("select*from task_tbl where users_id = :id "); 
                    $stmt->bindvalue(':id',$friends);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($result);
                    foreach ($results as $values) {
                        $flag = $flag+1;
                        $comment = $values['comment'];
                        $todoname = $values['todoname'];
                        $date = $values['date'];
                        //$users_id = $value['users_id'];
                        $finish = $values['finish'];
                        if($finish == 'No')
                        {
                            if($flag%2!=0)
                                include'time3.php';
                            else include'time4.php';
                        }
                        else{
                            if($flag%2!=0)
                                include'time7.php';
                            else include'time8.php';
                        }
                    }
                }
                $pdo = null;
            }
            else echo "<script>alert('请先进行登录');window.location.href='establish.html'</script>";
            ?>
    </body>
    </html>