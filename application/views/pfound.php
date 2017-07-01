<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
header("Cache-control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.?>
    
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/realone/css/pfound/index.css">
</head>
<script type="text/javascript" src="http://localhost/realone/js/jquery.js"></script>
<script type="text/javascript">
function upload(){
   
    $.ajax({
    url:"http://localhost/realone/index.php/user/c_upload2",
    method:"post",
    data:new FormData($('#file')[0]),
    processData:false,
    contentType:false,
    success:function(data){
        alert(data);
    }, 
    error:function(){
        alert("错误");
    }

});
}
function publish(){
   
    var lostname=$('#lostname').val();
    var type=$('#ltype').val();
    // var descripe=document.getElementById('ldescripe').innerHTML;
    var descripe=$('#ldescripe').val();
    var ps=$('#lps').val();
    var place=$('#lplace').val();
    var flag=<?php echo $flag ?>;
   
   var data={lostname:lostname,type:type,descripe:descripe,place:place,ps:ps,flag:flag};
  

    $.ajax({
        method:"post",
        url:"c_publish",
        data:data,
        success:function(result){
            alert(result);

        },
        error:function(err){
           console.log(err);
        }


    });
}
</script>
<body>
<div id="nav">
 <div class="wp">
  <div id="logo">  
  </div>
    <p class="left"><a href="http://localhost/realone/index.php/user/c_startp?flag=1" style="color:black">发表寻物</a></p>
    <p class="right"><a href="http://localhost/realone/index.php/user/c_startp?flag=2" style="color:black">发表招领</a></p>
    <span id="land">
    <?php echo $_SESSION['name'] ?> 你好！
    </span>
 </div>   
</div>
<div id="form" >
        <div class="register">PUBLISH</div>
        <div class="wp">
        <div class="line">
           <div class="left"></div>
           <div class="center"><?php echo ($flag==1)?"L":"F"; ?></div>
           <div class="right"></div> 
        </div>
          <ul>
            <form id="file" enctype="multipart/form-data">
            <li>
                <span>物品名称</span>
                <input type="text" id="lostname">
            </li>
            <li class="photo"> 
               <span>物品照片</span>
               <input type="text" >
                <input type="file" style="display:none;" onchange="upload()" name="picture" id="picture">
                <div><label for="picture">拍摄上传</label></div>
            </li>
            <li id="type" > 
               <span>物品类型</span>
                <input type="text"  id="ltype" value="">
                <div class="box">
                    <div class="img"></div>
                </div>
                <ul id="slide">
                    <li>U盘</li>
                    <li>手机</li>
                    <li>钥匙</li>
                    <li>一卡通</li>
                    <li>钱包</li>
                    <li>书籍</li>
                    <li>证件</li>
                </ul>
            </li>
            <li class="text"> 
               <span>重要描述</span>
                <textarea name=""  cols="" rows="" id="ldescripe"></textarea>
            </li>
            <li id="place"> 
               <span>丢失地点</span>
                <input type="text" id="lplace">
                 <div class="box">
                    <div class="img"></div>
                </div>
                <ul id="slide1">
                    <li>锦绣楼</li>
                    <li>丹青楼</li>
                    <li>成栋楼</li>
                    <li>宿舍楼</li>
                    <li>新食堂</li>
                    <li>老食堂</li>
                    <li>校园路段</li>
                </ul>
            </li>
            <li class="lastli"> 
               <span>备注</span>
                <textarea name=""  cols="" rows="" id="lps"></textarea>
            </li>
            </form>
        </ul>
        <div class="buttonleft" onclick="publish()">发布</div>
        <div class="buttonright">取消</div>
    </div>
</div>
<div id="footer">
    <div class="wp">
      <span>版权申明：由信犀新媒体实验室提供技术支持</span>
      <br>
      <span>联系我们：丹青楼914实验室</span> 
    </div>
</div>

   <script src="http://localhost/realone/css/pfound/index.js">
</script>

</body>
</html>