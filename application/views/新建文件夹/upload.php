<html>
<head>
	<title>上传丢失物品</title>
	<style type="text/css">
	.div1{
		margin-top: 18px;
	}
	</style>
</head>
<body>
<p></p>
     <form action="c_upload" method="post" enctype="multipart/form-data" style="text-align:center">
     	<div class="div1">物品名称<input type="text"    name="lostname"  placeholder ="必填"><br></div>
     	<div class="div1">物品照片<input type="file" id="file" name="file" required="file" value="找一下文件" ><br></div>
     	<div class="div1">电话号码<input type="text"   name="phone_number"   placeholder="必填"><br></div>
        <div class="div1"><select name="place">
  <option value ="计算机院">计算机院</option>
  <option value ="工程院">工程院</option>
  <option value="啊啊啊啊啊学院">啊啊啊啊啊学院</option>
  <option value="mm学院">mm学院</option>
        </select></div>
     	<div class="div1">物品丢失/拾到时间：<input type="text" name="losttime" placeholser="必填"><br></div>
     	<div class="div1">物品重要表述<input type="block" name="lostmessage" >

     	
    <button type="submit">上传</button>
</body>
</html>