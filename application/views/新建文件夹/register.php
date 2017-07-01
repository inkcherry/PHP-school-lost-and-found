<html>
<head>
	<title></title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
    <script type="text/javascript">


   function checkpassword(){
   	var cp= document.getElementById("cpassword");
   	var p=document.getElementById("password");
   	if(cp.value!=p.value)
   	{   document.getElementById("box6").innerHTML="两次输入密码不同";
   		cp.style.border="1px solid red";
      return false;
   	}
    else {
    	var p=document.getElementById("box6");
     	p.innerHTML="";
      cp.style.border="";
     	return true;
     }
   }
   function isChinese(temp)       //如果是中文就返回true
            {  
            var re=/[^\u4e00-\u9fa5]/;
            if(re.test(temp)) return false;  
            return true;  
            }  

   function judgename(){
    var p=document.getElementById("name");
    // alert(p.value.length);
    if((isChinese(p.value)==false)||p.value.length<2||p.value.length>4)
      // &&p.value.length>1&&p.value.length<5
    {
      document.getElementById("box0").innerHTML="请输入正确姓名";
      p.style.border="1px solid red";
      return false;
    }
    else{
      document.getElementById("box0").innerHTML="";
       p.style.border="";
      return true;
    }
   }


   function judgepassword(){
    var p=document.getElementById("password");
    if(p.value.length<6||p.value.length>16)
    {
      document.getElementById("box5").innerHTML="密码必须大于十位且小于六位";
       p.style.border="1px solid red";
    }
    else{
      document.getElementById("box5").innerHTML="";
       p.style.border="";
    }
   }

   function checkp_num(){
    var p=document.getElementById("p_num");
    var reg=/^1[345678]\d{9}$/;
          if(!(reg.test(p.value))) { 
            document.getElementById("box1").innerHTML="请输入正确的手机号码";
         p.style.border="1px solid red";
    } 
    else {   p.style.border="";
     document.getElementById("box1").innerHTML="";

    }


   }
    	</script>



<style type="text/css">
/*  
    
    #form1{
    	text-align:center;
    	background-color: red;
    	position: relative;
    }
  
   
    .div1{
    	margin-top:20px;
    	position: absolute;
    	right: 0;
    }*/
      .label1{
    	font-family:SimHei ;
    	font-color:;
    	font-size:20;
    }
    .input1{
    	background-color:#CCBBFF;

    }
      #mainbody{
    	background-color:#778899 ;
    }
      #form1{
      	display: inline-block;
    	/*text-align:center;*/
    	
    	position: relative;
    	left: 50%;
    	transform:translateX(-50%);
    }
    #header{
      text-align:center;
    }
    .div1{
    	
    	text-align: right;
    	margin-top: 15px;
    	position: relative;
    }
     .box{
     	font-family:Microsoft YaHei;
     	color:red;
     	font-size:15;
    	display:inline;
    	position: absolute;
    	right:-13px;
    	transform:translateX(100%);

    }
    #select1{
      width:173px;
      background-color:#CCCCFF;
    }
</style>


<body id="mainbody">
  <div id="header"><a href="j">导航1</a>|<a href="2">导航2</a>|<a href="j">导航3</a>|<a href="j">导航4</a> <br><br><br><br><br><br><br><br></div>
	<form id="form1" method="post" action="c_register">
     
<h1 style="color:#2F4F4F ;text-align:center">  注册</h1>

     <div class="div1">
       <label class="label1"> name:</label>   <input id="name" class="input1" type="text" name="uname" onblur="judgename()"><div id="box0"  class="box" onselectstart='return false' style="-moz-user-select:none;">
     </div>

  <div class="div1">
          <label class="label1" onselectstart='return false' style="-moz-user-select:none;">Phone_num:</label>
           <input id="p_num" type="text" class="input1" name="p_num" onblur="checkp_num()">
            <div id="box1" class="box"  onselectstart='return false' style="-moz-user-select:none;"></div>
    </div>

    <div class="div1">
       <lable class="label1" onselectstart='return false' style="-moz-user-select:none;">学院</label>
    <select id="select1" name="college">
  <option value ="计算机院">计算机院</option>
  <option value ="工程院">工程院</option>
  <option value="啊啊啊啊啊学院">啊啊啊啊啊学院</option>
  <option value="mm学院">mm学院</option>
</select></div>

		<div class="div1 ">
		     <label class="label1">password:</label>
          <input id="password" class="input1" type="password" name="password" onblur="judgepassword()">
          <div id="box5" class="box" onselsectstart='return false' style="-moz-user-select:none;"></div>
		</div>


		<div class="div1">
		     <lable class="label1" onselectstart='return false' style="-moz-user-select:none;">checkpassword:</label> 
          <input id="cpassword" class="input1" type="password" name="cpassword"   onblur="checkpassword()">
          <div id="box6"  class="box" onselectstart='return false' style="-moz-user-select:none;"></div>
    </div>
   
   <div class="div1">
         <lable class="label1" onselectstart='return false' style="-moz-user-select:none;">验证码:</label>
          <input id="cpassword" class="input1" type="password" name="cpassword"   >
          <div id="box7"  class="box" onselectstart='return false' style="-moz-user-select:none;">
          </div>
   </div>

   <div class="div1">
		     <input type="submit" style="text-align:right;position:relative" value="提交">
       </div>
     
	</form>

</body>
</html>