<!DOCTYPE html>
<html lang="en">
<head>
   <base href="<?php echo site_url() ?>"/>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/history/index.css">
    <link rel="stylesheet" type="css/history/text/css" href="icon/iconfont.css">
    <script type="text/javascript" src="http://localhost/realone/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/realone/css/history/index.js"></script>
</head>

<script type="text/javascript">
$(document).ready(function()
{
     hpic();
}
)
var res_tmp;
function hpic()
{


$.getJSON(
{    method:"post",
    url:"http://localhost/realone/index.php/user/c_hpic",
  success:function(res)
  { res_tmp=res;
    var len_lost=res['lost'].length;
    var len_found=res['found'].length;
    var len_sum=len_lost+len_found;
    // alert(JSON.stringify(res));

for(var i=0;i<len_lost;i++)
{
    var $spanid=$("#form span").eq(i);
     $spanid.html(res['lost'][i]['name']+'同学<br>于'+res['lost'][i]['place']+'<br>丢失了'+res['lost'][i]['lostname']);




    var $liid=$("#form li").eq(i);
    $liid.css("background",'no-repeat url(<?php echo site_url()?>'+res['lost'][i]['fname']+')');



     $liid.click(function(){
      // alert("gogogo");

      // alert(res_tmp['lost'][i]['lostname']);
      // window.location.assign('http://localhost/realone/index.php/user/c_detail?id='+res['lost'][i]['id']+'&flag=1');
       });


}
for(var i=len_lost;i<len_sum;i++)
{ 
  var $spanid=$("#form span").eq(i);
     $spanid.html(res['found'][i-len_lost]['name']+'同学<br>于'+res['found'][i-len_lost]['place']+'<br>j捡到了'+res['found'][i-len_lost]['lostname']);


       var $liid=$("#form li").eq(i);
    $liid.css("background",'no-repeat url('+res['found'][i-len_lost]['fname']+')');

}

     // alert("成功");
     
     // alert(res['lost'].length);
     // alert(res[0][0]['fname']);
     // alert(res[0].length);
  // var count_l=

  //    var $spanid=$('#form sapn').eq(i);
  },
  error:function(err)
  {
     alert("error");
  }

}
)
}





//   for(var i=0;i<6;i++)
//   {
//      var $spanid=$("#form span").eq(i);
//      $spanid.html('XXX同学<br>于XXX日XX楼<br>笑了XXX');
// }
  // }


</script>

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
<div id="search">
    <div class="wp">
        <div class="left">
           <span>我的丟拾</span>
           <div class="bar"></div>
           <div class="buttonleft">丢</div>
           <div class="buttonright">拾</div>
        </div>
        <div class="right">
           <!--  <input type="text"> -->
           <!--  <div class="glass">
                <span class="iconfont icon-fangdajing"></span>
            </div> -->
        </div>
    </div>
</div>
<div id="form">
    <div class="wp">
       <div id="lost">
            <ul>

               <li><div class="dark">
                   <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
               </div></li>
                <li class="middle"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li class="lidown"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li class="middle lidown"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li class="lidown"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div>
                </li>
            </ul>
            <div class="button"></div>
        </div>
        <div class="footer">
        <div class="wrapper">
        <div class="arrowleft">
                <div class="imgleft"></div>
                <p>上一页</p>
            </div>
            
            <div class="arrowright">
                <div class="imgright"></div>
                <p>下一页</p>
            </div>
        </div>
        </div> 
    </div>
</div>
<div id="footer">
    <div class="wp">
      <span>版权申明：由信犀新媒体实验室提供技术支持</span>
      <br>
      <span>联系我们：丹青楼914实验室</span> 
    </div>
</div>
<script type="text/javascript"></script>
</body>
</html>