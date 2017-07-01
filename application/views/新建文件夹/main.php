
<html>
<head>
<style type="text/css">
* {
	padding: 0;
	margin: 0;
}
body { text-align: center; }
div {
	width: 770px;
	margin: 100px auto;
}
a {
	float: left;
	width: 250px;
	height: 250px;
	border: solid 5px #000;
	display: block;
	line-height: 250px;
	_line-height: 40px;
	text-align: center;
	margin: 0 -5px -5px 0;
	z-index: 1;
	position: relative;
}
a:hover {
	border-color: red;
	z-index: 2;
}
.adv{
	width:100px;
	height:100px;
	background-color: red;
	float:right;
	border:solid 10px black;

}
.a1{

}
</style>
<script src="http://localhost:/realone/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		cs();
	})


function cs()
{
	
	var blank="kksadf";
   $.getJSON({
   	method:"post",
   	url:"c_ninepic",
   	data:blank,
   success:function(res)
   {    var res_tmp=res;

         // document.getElementById("ida1").innerHTML="<img src='http://localhost/realone/upload/1.png'>";
        var a1s=document.getElementsByClassName("a1");
        for(var i=0;i<a1s.length;i++)
        {
        	
        	a1s[i].innerHTML="<img src='http://localhost/realone/"+res[i].fname+"'onclick=detail("+res[i].id+")>";
        }      
   },

   error:function()
   {alert("error");}
   })
  }
  function detail(i){
  	alert(i);
     window.location.assign('c_detail?id='+i);
  }


</script>
</head>
<body><br><br><br>捡到地点
	<button style="width:100px" onclick="place='';load();">全部</button>
	<button style="width:100px" onclick="place='锦绣楼';load();">锦绣楼</button>
	<button style="width:100px" onclick="place='丹青楼';load();">丹青楼</button>
	<button style="width:100px" onclick="place='成栋楼';load();">成栋楼</button>
	<button style="width:100px" onclick="place='宿舍楼';load();">宿舍楼</button>
	<button style="width:100px" onclick="place='新食堂';load();">新食堂</button>
	<button style="width:100px" onclick="place='老食堂';load();">老食堂</button>
	<button style="width:100px" onclick="place='校园路径';load();">校园路径</button>
	<button style="width:100px" onclick="place='其他';load();">其他</button><br>
	<br>物品类型
	<button style="width:100px" onclick="item_type='';load();">全部</button>
	<button style="width:100px" onclick="item_type='U盘';load();">U盘</button>
	<button style="width:100px" onclick="item_type='手机';load();">手机</button>
	<button style="width:100px" onclick="item_type='钥匙';load();">钥匙</button>
	<button style="width:100px" onclick="item_type='一卡通';load();">一卡通</button>
	<button style="width:100px" onclick="item_type='钱包';load();">钱包</button>
	<button style="width:100px" onclick="item_type='书籍';load();">书籍</button>
	<button style="width:100px" onclick="item_type='证件';load();">证件</button>
	<button style="width:100px" onclick="item_type='其他';load();">其他</button><br>
	     
    <br>
<div> <a class="a1" id="ida1" href="#"><img src=""/></a> 
	<a class="a1" href="#"><img src="localhg"/></a> 
	<a class="a1"  href="#"><img src="l"/></a> 
	<a  class="a1" href="#"><img src=""/></a> 
	<a class="a1" href="#"><img src="l"/></a> 
	<a class="a1" href="#"><img src="l"/></a> 
	<a class="a1" href="#"><img src="1g"/></a> 
	<a class="a1" href="#"><img src="2g"/></a>
	 <a class="a1" href="#"><img src="localhost:/ag"/></a> </div>
<br>
	 <div class="adv" id="rightdiv" onclick="cs()">aaaaaaaaaa</div>
	
    
</body>
</html>

