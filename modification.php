    <?php 
    session_start();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOList</title>
    <style>
    .create{
        display: block;
        background-color: #4CAF50;
        color:white;
        text-align: left;
        padding: 15px;
        text-decoration: none;
        font-size: 1em;
        margin:0;
    }
    .form{
        margin:20px;
        margin-left:200px;
        font-family:  "Times New Roman", "Microsoft YaHei";
    }
    .in{
            border: 1.8px solid #4CAF50;
            width: 900px;            
            height: 30px;            
            border-radius: 10px;            
            position: absolute;                     
            text-align: left;                        
            cursor: auto;              
    }
    .comment{
            border: 1.8px solid #4CAF50;
            width: 900px; 
            height:400px;                     
            border-radius: 10px;            
            position: absolute;                     
            text-align: left;                        
            cursor: auto
            
    }
    
    .button1{
        border: 2px solid #4CAF50;
        border-radius: 20px;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-left:1000px;
        margin-top: 130px;
        transition-duration: 0.4s;
        cursor: pointer;
        background-color:white;
        color: #4CAF50;
        }
        .button1:hover{ 
        border: 2px solid #4CAF50;
        padding: 10px 35px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-left:1000px;
        margin-top: 130px;
        transition-duration: 0.4s;
        cursor: pointer;
        background-color:#4CAF50;
        color: white;
        }
        .delete{
            width:0;
            height:0;
        }
        .button2{
        border: 2px solid #4CAF50;
        border-radius: 20px;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-left:1209px;
        margin-top: 0px;
        margin-bottom:20px;
        transition-duration: 0.4s;
        cursor: pointer;
        background-color:white;
        color: #4CAF50;
        }
        .button2:hover{ 
        border: 2px solid #4CAF50;
        padding: 10px 35px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-left:1209px;
        margin-top: 0px;
        margin-bottom:20px;
        transition-duration: 0.4s;
        cursor: pointer;
        background-color:#4CAF50;
        color: white;
        }
        
        </style>
        </head>
        <body>
            <?php
            $number = $_POST['number'];
            //$_SESSION['number']=$number;
            //echo $_SESSION['number'];
            ?>
            <?php
                 $pdo = new PDO("mysql:host=localhost;dbname=users",'root','');
                 $pdo->exec('set names utf8');
                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $stmt = $pdo->prepare("select*from task_tbl where number = :number "); 
                 $stmt->bindvalue(':number',$_GET['number']);
                 $stmt->execute();
                 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 foreach ($result as $value);
            ?>
            <div class="create">
                <p >任务修改</p>
            </div>
            
            <form class="form" method="post" action=update.php>
            <br/><br/>  
            任务名称：<input type="text" name="todoname"class="in"value = "<?php echo $value['todoname']?>"><br/>
            <br/><br/>
            截止时间：<input type="datetime-local"name ="date"class="in"value = "<?php echo $value['date'] ?>"><br/>
            <br/><br/><br/>
            任务描述：<textarea type="text" name="comment" class="comment" ><?php echo $value['comment'] ?></textarea><br/>
           <br/><br/><br/>
           <input type="text"class='delete' name="number"value="<?php echo $number?>" />
           <button type="submit" class="button1">修改</button>
            </form>
        <a href="delete.php?number=<?php echo $number; ?>" class='button2'>
            删除
        </a>
        <a href="accomplish.php?number=<?php echo $number; ?>" class='button2'>
            完成
        </a>
        </body>
        </html>
