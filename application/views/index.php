<!DOCTYPE html>
<html lang="en">
<head>
   <base href="<?php  echo site_url() ?>">
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/index/index.css">
    <link rel="stylesheet" type="text/css" href="css/index/icon/iconfont.css">
    <script type="text/javascript" src="http://localhost/realone/js/jquery.js"></script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
  <?php if(isset($_SESSION['name'] )){ ?>
      document.getElementById('yourname').innerHTML="<?php echo $_SESSION['name'];?>";
    <?php } ?>

  sixpic();
  })
var res_tmp;

function sixpic(i=0)
{   
      $.getJSON({
    method:"post",
    url:"http://localhost/realone/index.php/user/c_sixpic",
    // data:data,
   success:function(res)
   {      var a1s=document.getElementsByClassName("dark");
          res_tmp=res;
         for(var i=0;i<6;i++)
           {
           var m='t'+i;
              a1s[i].innerHTML="<span>"+res[0][i].name+"同学<br>于"+res[0][i].place+"<br>丢失"+res[0][i].lostname+"<span>";   
          document.getElementById(m).style.background='no-repeat url(http://localhost/realone/'+res[0][i].fname+')';       
           }

              for(var i=0;i<6;i++)
           {
           var m='s'+i;
              a1s[i+6].innerHTML="<span>"+res[1][i].name+"同学<br>于"+res[1][i].place+"<br>捡到"+res[1][i].lostname+"<span>";   
          document.getElementById(m).style.background='no-repeat url(http://localhost/realone/'+res[1][i].fname+')';       
           }
           // alert(res['ex']);
          
           // alert(res['ex']);
           ball(0,res[0]['ex']);
           ball(1,res[1]['ex']);
           ball(2,666);
   },

   error:function()
   {
    alert("error");}
   })

}





// var log=$('#log');
// log.click(function(){
//   alert(111);
// })


function vvlogin()
{
  {
    var password = $('#password').val();
  
        // var password_re = $('#password').val();
       
        var p_num = $('#p_num').val();
      
        var captcha=$('#captcha').val();
         
        // var verification = $('#verification').val();
        var data = {p_num:p_num,password:password,captcha:captcha};
      

        $.ajax({
            method:"post",
            url:"index.php/user/c_checklogin",
            data:data,
            success:function(result){
                if(result =="-1"){
                    alert("用户名不存在");
                }
                 else if(result =='-2')
                  {alert("用户名和密码不匹配");}
                else {
                  alert("登陆成功");
                     document.getElementById('yourname').innerHTML=result;
                     window.location.assign('index.php/user/c_starti');
                   }
            },
            error:function(){
                alert("出错了！");
            }
        })
}
}
function jump(m)
{  
    <?php if(isset($_SESSION['name'])){ ?>
  if(m==1)
  window.location.assign('index.php/user/c_startlostlist');
else if(m==2)
  window.location.assign('index.php/user/c_startfoundlist');
  <?php }else{ ?>
    alert("请先登录");
    <?php } ?>
}
function detail(m,flag)

{
  window.location.assign('index.php/user/c_detail?id='+res_tmp[flag-1][m].id+'&flag='+flag+"'");
}

function history()
{
  <?php if(isset($_SESSION['name'])) {?>
    window.location.assign('index.php/user/c_starth');
    <?php }else { ?>
      alert("请先登录");
      <?php } ?>
}
function logindiv()
{  <?php if(!isset($_SESSION['id'])){ ?>
    $('#mengceng').css('display','block');
  $('#loading').css('display','block');
  <?php }?> 

}
function exit()
{ 
  window.location.assign('index.php/user/c_exit');  
}

</script>




<div id="mengceng"></div>
<div id="loading">
    <p id="p1">登陆</p>
    <div class='buttonclose'>关闭</div>
    <div class="three">
        <ul>
            <li>
                <p>账号</p>
                <input type="text" id="p_num">
            </li>
            <li>
                <p>密码</p>
                <input type="password" id="password">
            </li>
           <!--  <li>
                <p>验证码</p>
                <input type="text" id="captcha">
            </li> -->
        </ul>
    </div>
    <div class="cn">
      需要登陆才能发布丢失与拾到信息  
    </div>
    <div class="button" style="cursor:pointer;" onclick="vvlogin()">登陆</div>
</div>
<div id="nav">
 <div class="wp">
  <div id="logo">  
  </div>
    <p class="left" style="cursor:pointer;"><a href="index.php/user/c_startp?flag=1" style="color:black;">发表寻物</a></p>
    <p class="right" style="cursor:pointer;"><a href="index.php/user/c_startp?flag=2" style="color:black;">发表招领</a></p>
    <div id="land">
        <i class="iconfont icon-ren" onclick="logindiv()"></i>
        <span id="yourname" style="cursor:pointer;" >XXXXX</span>
    <ul>
     <li style="cursor:pointer;" onclick="history()">我的丢/拾</li>
     <li style="cursor:pointer;" onclick="exit()">退出</li> 
    </ul>
    </div>
 </div>   
</div>
<div id="background"></div>
<div id="circle">
  <div class="wp">
     <ul>
         <li>
             <div class="ball">1</div>
             <div class="smallup"></div>
             <p id="information" style="cursor:pointer;">失物信息</p>
             <div class="smalldown"></div>
         </li>
         <li>
              <div class="ball">1</div>
              <div class="smallup"></div>
             <p id="information" style="cursor:pointer;">拾获信息</p>
             <div class="smalldown"></div>
         </li>
         <li>
              <div class="ball">1</div>
              <div class="smallup"></div>
             <p id="information" style="cursor:pointer;">物归原主</p>
             <div class="smalldown"></div>
         </li>
     </ul> 
  </div>  
</div>
<div id="table">
    <div class="wp">
        <div id="lost">
            <div class="title">
                <div class="green"></div>
                <p class="top"></p>
                <p class="down">LOST</p>
            </div>
            <ul>
               <li id="t0" onclick="detail(0,1)"><div class="dark">
                   <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
               </div></li>
                <li class="middle" id="t1"  onclick="detail(1,1)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="t2" onclick="detail(2,1)"><div class="dark" >
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li class="lidown" id="t3" onclick="detail(3,1)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li class="middle lidown" id="t4" onclick="detail(4,1)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li class="lidown" id="t5" onclick="detail(5,1)"><div class="dark">
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
            <div class="button" onclick="jump(1)" style="cursor:pointer;"></div>
            <p style="cursor:pointer;" >查看更多</p>
        </div>
        <div id="found">
             <div class="title">
                <div class="green"></div>
                <p class="top"></p>
                <p class="down">FOUND</p>
            </div>
            <ul>
               <li id="s0" onclick="detail(0,2)"><div class="dark">
                   <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
               </div></li>
                <li id="s1" class="middle" onclick="detail(1,2)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="s2" onclick="detail(2,2)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="s3" class="lidown" onclick="detail(3,2)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="s4" class="middle lidown" onclick="detail(4,2)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="s5" class="lidown" onclick="detail(5,2)"><div class="dark">
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
            <div class="button" onclick="jump(2)" style="cursor:pointer;"></div>
            <p style="cursor:pointer; ">查看更多</p>
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
<script type="text/javascript">
function ball(i,value){
  var $ball=$('.ball').eq(i);
  var interval=2000/value;
  var count=0;
  var timer;
  timer=setInterval(function(){
        $ball.html(count);
        if(count<value)
        count++;
        else 
        clearInterval(timer);
      },interval);
  
  }
</script>
<!-- <script src="index.js"></script>   --> 
  <script type="text/javascript" src="css/index/index.js">
</script>
</body>
</html>