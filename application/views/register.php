<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
header("Cache-control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.?>
    <base href="http://localhost/realone/css/register/"/>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="icon/iconfont.css">

</head>
<script type="text/javascript" src="http://localhost/realone/js/jquery.js"></script>
<script type="text/javascript">

function reg()
{
    var password = $('#password').val();
    var passwordc =$('#passwordc').val();

    if(password!=passwordc)
        alert("两次输入密码不一致");
        // var password_re = $('#password').val();
      else{  var uname = $('#uname').val();
        var p_num = $('#p_num').val();
        var college = $('#college').val();
        var captcha=$('#captcha').val();
        // var verification = $('#verification').val();
        var data = {p_num:p_num,password:password,uname:uname,college:college,captcha:captcha};

        $.ajax({
            method:"post",
            url:"http://localhost/realone/index.php/user/c_register",
            data:data,
            success:function(result){
                if(result == ""){
                    alert("服务器繁忙，请稍后再试");
                }else{
            
                    alert(result);
                }
            },
            error:function(){
                alert("出错了！");
            }
        })
}}


function jumpindex()
{
    window. window.location.assign('http://localhost/realone/index.php/user/c_starti');
}
function refresh()
{ 
    document.getElementById("img1").src="http://localhost/realone/index.php/user/c_cap";
}
  </script>
<body>
<div id="nav">
 <div class="wp">
  <div id="logo">  
  </div>
    <p class="left" >发表寻物</p>
    <p class="right">发表招领</p>
    <div id="land">
        <i class="iconfont icon-ren"></i>
        <span onclick="jumpindex()">未登录</span>
    </div>
 </div>   
</div>
<div id="form">
    <div class="wp">
        <div class="register">register</div>
        <div class="line">
           <div class="left"></div>
           <div class="center">R</div>
           <div class="right"></div> 
        </div>
        <ul><form method="post" action="c_register">
            <li>
                <span>姓名</span>
                <input type="text" name="uname" id="uname">
            </li>
            <li> <span>手机号</span>
                <input type="text" name="p_num" id="p_num">
            </li>
            <li> <span>学院</span>
                <input type="text" name="college" id="college">
            </li>
            <li> <span>密码</span>
                <input type="password" name="password" id="password">
            </li>
            <li> <span>确认密码</span>
                <input type="password" name="passwordc" id="passwordc">
            </li>
            <li class="lastli" name="" > <span>验证码</span>
               <div class="brand">
                <input class="last" type="text" id='captcha'>
                <div class="get"><img id="img1" src="http://localhost/realone/index.php/user/c_cap" onclick="refresh()"></div>

                </div>
            </li></form>
        </ul>
        <div class="button" onclick="reg()">注册</div>
    </div>
</div>
<div id="footer">
    <div class="wp">
      <span>版权申明：由信犀新媒体实验室提供技术支持</span>
      <br>
      <span>联系我们：丹青楼914实验室</span> 
    </div>
</div>
</body>
</html>