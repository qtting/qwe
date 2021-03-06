<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
<title>TODOList</title>
<style>

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
 
.container2 {            
    width: 1000px;           
    margin: 20px auto;  
    opacity:0.5;    
    }

.vertical-timeline {            
    color: #FFF;            
    font-family: "Times New Roman", "Microsoft YaHei";        
    }   

.vertical-timeline-block {            
    width: 70%;            
    border-left: 2px solid #DDD;            
    margin: 0 20px;            
    position: relative;            
    padding-bottom: 30px;        
    }      

.vertical-timeline-icon {           
        width: 40px;            
        height: 40px;            
        border-radius: 20px;            
        position: absolute;            
        left: -22px;            
        top: 14px;             
        text-align: center;            
        line-height: 40px;            
        cursor: pointer;            
        transition: all 0.2s ease;                   
    }      

.vertical-timeline-block {            
            cursor: pointer;        
    }  

.vertical-timeline-block:hover .vertical-timeline-icon {            
    width: 50px;            
    height: 50px;            
    border-radius: 25px;            
    line-height: 50px;            
    left: -27px;            
    box-shadow: 0 0 5px #CCC;            
    font-size: 25px;        
    } 

.v-timeline-icon1 {            
        background-color: #A0A0A0;        
    }        
        
.v-timeline-icon2 {            
    background-color: #4CAF50;       
    }

.vertical-timeline-icon i {            
    font-style: normal;            
    color: white;        
    }     
        
.vertical-timeline-content {                       
    margin-left: 60px;            
    padding: 20px 30px;            
    border-radius: 5px;            
    position: relative;        
    }  

    .vertical-timeline-content1 { 
    margin-left: 60px;            
    padding: 20px 30px;            
    border-radius: 5px;            
    position: relative;              
    background-color: #4CAF50;            
    } 

    .vertical-timeline-content2 { 
    margin-left: 60px;            
    padding: 20px 30px;            
    border-radius: 5px;            
    position: relative;              
    background-color: #A0A0A0;            
    } 
       
.vertical-timeline-content1:before {            
    content: '';            
    width: 0;            
    height: 0;             
    border-top: 10px solid transparent;            
    border-bottom: 10px solid transparent;            
    border-right: 10px solid #4CAF50;            
    border-left: 10px solid transparent;             
    position: absolute;            
    right: 100%;            
    top: 20px;
    }

    .vertical-timeline-content2:before {            
    content: '';            
    width: 0;            
    height: 0;             
    border-top: 10px solid transparent;            
    border-bottom: 10px solid transparent;            
    border-right: 10px solid #A0A0A0;            
    border-left: 10px solid transparent;             
    position: absolute;            
    right: 100%;            
    top: 20px;
    }

.timeline-content {            
    text-indent: 2em;        
    }   

.time-more {            
    overflow: hidden;        
    }       

.time-more .time {                      
    line-height: 40px;            
    display: inline-block;        
    } 

.time-more .more {            
    float: right;       
    }

.time-more .more a {           
    display: inline-block;            
    height: 20px;            
    padding: 8px 15px;            
    color: #FFF;            
    text-decoration: none;            
    font-size: 15px;        
    }   

.more-style1 {            
    border-radius: 5px;            
    background-color: #A0A0A0;        
    } 

.more-style1:hover {            
    background-color: black;        
    } 

.more-style2 {            
    border-radius: 5px;            
    background-color: #4CAF50;        
    }  

.more-style2:hover {            
        background-color: black;        
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
    <div class="container2">        
        <div class="vertical-timeline">            
            <div class="vertical-timeline-block">                
                <div class="vertical-timeline-icon v-timeline-icon1">                    
                    <i class="icon"><?php echo $flag;?></i>                
                </div>                 
                <div class="vertical-timeline-content1">                    
                    <h2><?php echo$todoname ?></h2>                    
                    <p class="timeline-content">  <?php echo $comment; ?>  </p>                    
                    <p class="time-more">                        
                        <span class="time">
                            <?php echo $date ?>
                        </span>                        
                            <span class="more more-style1"><a href="modification.php?number=<?php echo $number; ?>">修改</a></span>                    
                    </p>                
                </div>            
            </div>
        </div>
    </div>
    
</body>
</html>