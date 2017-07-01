<html>
<head>
	<title></title>
<style type="text/css">
#form1{
	   display:inline-block;
	   position:relative;
	   left:50%;
	   transform: translate(-50%);
}
#main{
	background-color: #ffe4e1;
}
#reg{
	position: relative;
	text-align: right;
}
.div1{
	text-align:right;
	margin-top:15px;
	position:relative;
}
.label1{
	font-family: SimHei;
}


</style>
</head>
<body id="main">
	<div style="text-align:center"><a href="a">导航1</a>  |  <a href="a">导航2</a>  |<a href="a">导航3</a>  |<a href="a">导航4</a>  </div>
	<br><br><br><br><br><br><br><br><br><br>
	<form id="form1" method="post"  action="c_checklogin" >
		<h1 style="color:#db7093"> 登陆</h1>
    <div class="div1"> <label class="label1">用户名</label><input class="input1" type="text" name="p_num"></input></div>
    
    <div class="div1"> <label class="label1">密码</label><input class="input1" type="passworrd" name="password"></input> </div>

     <div class="div1"><label class="label1">验证码</label><input class="input1" type="text" name=="captcha"></input></div>

     <div><img src=""></div>
     	<br>

     	<input class="input1" type="submit"  value="登陆"></input>
  <a href="c_startr" style="float:right"><label id="reg" >点击注册</label></a>


	</form>
</body>
</html>