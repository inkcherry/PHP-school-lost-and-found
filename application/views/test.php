<html>
<head>
	<title></title>
	<script type="text/javascript" src="http://localhost/realone/js/jquery.js"></script>
	<script type="text/javascript">
	function publish(){
    alert();
    var lostname=1;
    var type=2;
    var descripe=3;
   
    var place=4;
    var ps=5;
   var data={lostname:lostname,type:type,descripe:descripe,place:place,ps:ps};
  

    $.ajax({
        method:"post",
        url:"c_publish",
        data:data,
        success:function(result){
            alert(result);

        },
        error:function(){
            alert("出错了");
        }


    });
}</script>
</head>
<body>
	<button onclick="publish()">啊啊</button>

</body>
</html>