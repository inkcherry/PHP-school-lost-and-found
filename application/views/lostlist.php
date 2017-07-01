<!DOCTYPE html>
<html lang="en">
<base href="http://localhost/realone/css/lostlist/"/>
<head>

    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" type="text/css" href="icon/iconfont.css">
    <script type="text/javascript" src="http://localhost/realone/js/jquery.js"></script>
</head>
<script type="text/javascript">
var page=1;
var lof=1;
var thetype="";
var place="";
var thefind="";
$(document).ready(function(){
   
     ninep();
  })
var res_tmp;
function ninep(i=0)
{   page=page+i;
  var data={page:page,thetype:thetype,place:place,thefind:thefind,flag:"1"};

      $.getJSON({
    method:"post",
    url:"http://localhost/realone/index.php/user/c_ninepic",
    data:data,
   success:function(res)
   {     
     res_tmp=res;
         // document.getElementById("ida1").innerHTML="<img src='http://localhost/realone/upload/1.png'>";
        var a1s=document.getElementsByClassName("dark");
                // document.getElementById("dark1").innerHTML="<span>"+res[0].name+"同学<br>于"+res[0].time+res[0].place+"<br>丢失"+res[0].lostname+"<span>";
        for(var i=0;i<res[0]['num'];i++)
        {   
        var m='t'+i;
          a1s[i].innerHTML="<span>"+res[i].name+"同学<br>于"+res[i].place+"<br>丢失"+res[i].lostname+"<span>";   
          document.getElementById(m).style.background='no-repeat url(http://localhost/realone/'+res[i].fname+')';          
        }
        if(res[0]['num']==0)
        {
          alert("暂无更多信息")
          if(page>1)
          page=page-1;    //过页减
        }
        else if (res[0]['num']<9)
        {  
           for(var i=res[0]['num'];i<9;i++)
           {
              var m='t'+i;
            a1s[i].innerHTML="<span>暂无更多信息<span>";   
            document.getElementById(m).style.background='no-repeat url(http://localhost/realone/upload/moren.png)';  
           }
        }      
   },

   error:function(err)
   {     
    console.log(err);
   }
   })
  }

function forpage(i)
{  if(page==1)
  {
    alert("已经在第一页");
    page=page+1;

  }
  else{
    ninep(i);
   }
}

  function detail(i)
  {  
    window.location.assign('http://localhost/realone/index.php/user/c_detail?id='+res_tmp[i].id+'&flag=1');
  }
  function forfind()
  {
      thefind=$('#sear').val();
     
     ninep();
  }


</script>
<body>
<div id="header">
    <div class="wp">
        <div id="logo"></div>
        <span class="cn">失物列表</span>
        <p class="en">the lost</p>
        <div id="search">
           <input type="text" id="sear" >
           <div class="button" onclick="forfind()">
               <i class="iconfont icon-fangdajing"></i>
           </div> 
        </div>
    </div>
</div>
<div id="form">
    <div class="wp">
       <div class="box">
           <ul class="top">
               <li class="head">失物地点</li>
               <li onclick="place='';ninep();">全部</li>
               <li onclick="place='锦绣楼';ninep();">锦绣楼</li>
               <li onclick="place='丹青楼';ninep();">丹青楼</li>
               <li onclick="place='城栋楼';ninep();">成栋楼</li>
               <li onclick="place='宿舍楼';ninep();">宿舍楼</li>
               <li onclick="place='新食堂';ninep();">新食堂</li>
               <li onclick="place='老食堂';ninep();">老食堂</li>
               <li onclick="place='校园路段';ninep();">校园路段</li>
               <li onclick="place='其他';ninep();">其他</li>
           </ul>
           <ul class="bottom">
               <li class="head">物品类型</li>
               <li onclick="thetype='';ninep();">全部</li>
               <li onclick="thetype='U盘';ninep();">U盘</li>
               <li onclick="thetype='手机';ninep();">手机</li>
               <li onclick="thetype='钥匙';ninep();">钥匙</li>
               <li onclick="thetype='一卡通';ninep();">一卡通</li>
               <li onclick="thetype='钱包';ninep();">钱包</li>
               <li onclick="thetype='书籍';ninep();">书籍</li>
               <li onclick="thetype='证件';ninep();">证件</li>
               <li onclick="thetype='其他';ninep();">其他</li>
           </ul>
       </div> 
    </div>
</div>
<div id="table">
    <div class="wp">
            <ul>
               <li id="t0" class="li11" onclick="detail(0)"><div class="dark" id="dark1">
                   <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
               </div></li>
                <li id="t1" class="middle  li11" onclick="detail(1)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="t2" class="li11" onclick="detail(2)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li  id="t3" class="li11" onclick="detail(3)"><div class="dark">
                   <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
               </div></li>
                <li id ="t4" class="middle li11" onclick="detail(4)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="t5" class="li11" onclick="detail(5)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="t6" class="lidown  li11" onclick="detail(6)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li id="t7" class="middle lidown" onclick="detail(7)"><div class="dark">
                    <span >
                       XXX同学
                    <br>
                       于XXX日 XX楼
                   <br>
                       丢失XXX
                   </span>
                </div></li>
                <li  id="t8" class="lidown" onclick="detail(8)"><div class="dark">
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
           
    </div>
</div>
<div id="footer">
<div class="wp">
<div class="box">
 <div class="arrowleft" onclick="forpage(-1)">
                <div class="imgleft" ></div>
                <p>上一页</p>
            </div>
            <div class="arrowright" onclick="ninep(1)">
                <div class="imgright" ></div>
                <p>下一页</p>
            </div>
    </div>
 </div>
</div>
</body>
</html>