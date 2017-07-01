<html>
<head>
	<title></title>
	<style type="text/css">


.div1{
	margin-top:16px;
	text-align:center;
}

	</style>
</head>
<body id="main"><br><br><br><br><br><br><br><br>
	

		<div id="mdiv">
<div class="div1"> 物品名称：<?php echo $res[0]['fname'];?></div>
<div class="div1"> 物品照片：<img src="http://localhost/realone/<?php echo $res[0]['fname']?>">   </div>
<br><br>
<div class="div1">物品丢失/捡到 时间:<?php echo $res[0]['time'];?></div>
<div class="div1">捡到/丢失地点  ：<?php echo $res[0]['place'];?></div>	
<div class="div1">物品重要描述  </div>
<br>
<div class="div1"><h3>发布者信息:<h3></div>
<div class="div1">发布人：</div>
<div class="div1">手机号:</div>
</div> 
</body>
</html>