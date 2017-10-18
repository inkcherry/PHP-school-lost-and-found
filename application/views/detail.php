<!DOCTYPE html>
<html lang="en">
<head>
   <base href="<?php echo site_url() ?>"/>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/detail/index.css">

</head>
<body>
<div id="nav">
 <div class="wp">
  <div id="logo">  
  </div>
    <p class="left">发表寻物</p>
    <p class="right">发表招领</p>
    <span id="land">
   <?php echo $_SESSION['name']; ?>你好！
    </span>
 </div>   
</div>
<div id="form">
  
        <div class="register">详情页</div>
        <div class="wp">
        <div class="line">
           <div class="left"></div>
           <div class="center">D</div>
           <div class="right"></div> 
        </div>
          <ul>
            <li>
                <span>物品名称</span>
                <input type="text" value="<?php echo $res[0]['lostname'] ?>">
            </li>
            <li > 
               <span>物品照片</span>
                <img src="<?php echo $res[0]['fname'] ?>">
            </li>
            <li > 
               <span>物品类型</span>
                <input type="text" value="<?php  echo $res[0]['type'] ?>">
                
            </li>
            <li class="text"> 
               <span>重要描述</span>
                <textarea name="" id="" cols="" rows=""><?php echo  $res[0]['description'] ?></textarea>
            </li>
            <li> 
               <span>拾取地点</span>
                <input type="text" value="<?php echo $res[0]['place'] ?>">
            </li>
            <li class="lastli"> 
               <span>备注</span>
                <textarea name="" id="" cols="" rows=""><?php echo $res[0]['ps'] ?></textarea>
            </li>
        </ul>
        <div class="buttonleft">返回</div>
    </div>
</div>
<div id="footer">
    <div class="wp">
      <span>版权申明：由信犀新媒体实验室提供技术支持</span>
      <br>
      <span>联系我们：丹青楼914实验室</span> 
    </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
</script>   
</body>
</html>