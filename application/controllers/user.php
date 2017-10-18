<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// public function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('user_model');
	// }

	
	// public function c_startl(){
	// 	$this->load->view('login');
	// }

	public function c_startr(){
		$this->load->view('register');

	}
	public function c_startu(){
		$this->load->view('upload');
	}
	public function c_startm(){
		$this->load->view('main');
	}
	public function c_startt(){
		$this->load->view('test');
	}
    public function c_exit()
    {
    	  unset($_SESSION['id']);
    	  unset($_SESSION['name']); 
        
    $this->load->view('index');
    }
	public function c_startp(){
		if(!isset($_SESSION['name']))
		{
			$this->load->view('index');
		}
		else
		{   $flag=$_GET['flag'];
			$data=array('flag'=>$flag);
			$this->load->view('pfound',$data);
		}
	}
	public function c_startlostlist(){
	   if(!isset($_SESSION['name']))
	   	$this->load->view('index');
	   else{
		$this->load->view('lostlist');}
	}


	public function c_startfoundlist()
	{
        if(!isset($_SESSION['name']))
	   	$this->load->view('index');
	   else{
		$this->load->view('foundlist');}
	}


	public function c_startd(){
		$this->load->view('detail');
	}
	public function c_starth(){
		$this->load->view('history');
	}
	public function c_starti(){
		$this->load->view('index');
	}
	


	public function c_checklogin(){
		$this->load->model('user_model');
		$p_num=$this->input->post("p_num");
		$password=$this->input->post("password");
		$captcha=$this->input->post("captcha");
	
	$data=$this->user_model->m_checklogin($p_num,$password);
	if($data[0]<0)
		{echo $data[0];}
	else { 
		$_SESSION['id']=$data[0];
		$_SESSION['name']=$data[1];
		echo $data[1];
	    }
	}


	public function c_register(){
       
    $result="";
    $captcha=$this->input->post("captcha");
    if($captcha!=$_SESSION['captch_code'])
    	{$result=$result."验证码错误";
         echo $result;}
    else {

    	$p_num=$this->input->post("p_num");
		$uname=$this->input->post("uname");
		$college=$this->input->post("college");
		$password=$this->input->post("password");
        $is_do=true;
    	$name_want = '/^[\x{4e00}-\x{9fa5}]{2,5}+$/u';
		$num_want = '/^\d{11}$/';
		$pass_want = '/^[A-Za-z0-9]{6,18}+$/u';
		$matches = array();
     
		if(!preg_match($name_want, $uname, $matches)){
			$result = $result."姓名不合法\n";
			$is_do = false;
		}
		if(!preg_match($num_want, $p_num, $matches)){
			$result = $result."手机号位数不对\n";
			$is_do = false;
		}
		if(!preg_match($pass_want, $password, $matches)){
			$result = $result."密码太长或太短\n";
			$is_do = false;
		}
       
       if($is_do)
		{
	    $this->load->model('user_model');
		$result=$this->user_model->m_register($p_num,$uname,$password,$college);
		}
		echo $result;
	}
	}

	public function c_upload(){

		if($_FILES["file"]["error"]>0){
  $data =array('error'=>$_FILES["file"]["error"]);}
  else{
    $time=date("Ymdhisa");
    $name="upload/".$time.".jpg";                    //文件路径，即时时间为文件名
    move_uploaded_file($_FILES["file"]["tmp_name"],$name); //将产生服务器文件副本正式存储
    $data2=array('fnmar'=>$name);
$user_id=$_SESSION['id'];
$filename=$name;
$lostname=$this->input->post("lostname");
$phone_number=$this->input->post("phone_number");
$lostmessage=$this->input->post("lostmessage");
$losttime=$this->input->post("losttime");
$place=$this->input->post("place");

$res=$this->user_model->m_filemessage($filename,$lostname,$lostmessage,$phone_number,$losttime,$place,$user_id);
}
       $src='./'.$name;    //  设置图片路径
   $info=getimagesize($src)  ;  //给GD库基本信息
   $type=image_type_to_extension($info[2],false) ;  //获取图像类型
   $fun="imagecreatefrom{$type}";     //将fun设置成一个自动检测函数 包涵"imagecreatefromjpg(),imagecreatefrompreg()"
   $image=$fun($src);         //掉用相应的函数
   $font="./system/fonts/texb.ttf";  //设置字体的路径
   $content=$name;
   $col=imagecolorallocatealpha($image,255,255,255,50);   // 生成图片函数参数 （图片  文字三原色 文字透明度）
   imagettftext($image,20,0,20,30,$col,$font,$content);        //浏览器输出
// header("Content-type:",$info['mime']);
//  $func="image{$type}";    //识别函数类型
//  $func($image);     //
// $func($image,'newimage',$type)//将image保存到本地原来路径下newimage路径下
// //imagedestroy($image);   //销毁内存中图片
   imagejpeg($image,$name);
   
}
public  function c_upload2(){
	if($_FILES['picture']['error'] > 0){
			echo "图片上传失败";
		}else if($_FILES["picture"]["type"] == 'image/bmp' || $_FILES["picture"]["type"] == 'image/gif' || $_FILES["picture"]["type"] == 'image/jpeg' || $_FILES["picture"]["type"] == 'image/png' || $_FILES["picture"]["type"] == 'image/tiff'){
			$time = date("Ymdhisa");
			$name = "upload/".$time.".jpg";
			move_uploaded_file($_FILES['picture']['tmp_name'],$name);
			$_SESSION['picture'] = $name;
			echo "上传成功";
		}else{
			echo "图片上传失败";
		}
}
public function c_publish(){
	$this->load->model('user_model');
	$lostname=$this->input->post('lostname');
	$type=$this->input->post('type');
	$ps=$this->input->post('ps');
	$place=$this->input->post('place');
	$descripe=$this->input->post('descripe');
	$flag=$this->input->post('flag');
	$fname=$_SESSION['picture'];
	$user_id=$_SESSION['id'];
	$_SESSION['picture']=NULL;
	$data=$this->user_model->m_publish($lostname,$type,$ps,$place,$descripe,$fname,$user_id,$flag);
	echo $data;
}

public function c_ninepic(){
	
		$res=null;
	$page=$this->input->post("page");
	$type=$this->input->post("thetype");
	$place=$this->input->post("place");
	$thefind=$this->input->post("thefind");
	$flag=$this->input->post("flag");
	$limst=($page-1)*9;
	$this->load->model('user_model');
$res=$this->user_model->m_ninepic($limst,$type,$place,$thefind,$flag);
$res[0]['num']=count($res);
	echo json_encode($res);
}
public function c_sixpic(){
   $this->load->model('user_model');
   $res=$this->user_model->m_sixpic();
   	echo json_encode($res);
}

public function c_test8()
{  $this->load->model('user_model');
   $res=$this->user_model->m_sixpic();
       print_r($res);
    
}
public function c_hpic()
{
	$this->load->model('user_model');
	$res=$this->user_model->m_hpic();
	// print_r($res);
	// echo "________________________________________________________________________________________________________________";
	echo json_encode($res);
}




public function c_test1(){
	$page=1;
	$this->load->model('user_model');
	$place="23423425235";
	$type="";
	$thefind="";
	$limst=($page-1)*9;
$data=$this->user_model->m_ninepic($limst,$type,$place,$thefind);
// $res=array('res'=>$data);
// echo count($data);
// $res['res']['little']='asdfadsf';
// print_r($res);
echo "KKKKKKKK";
echo count($data);
echo "KKKKKKKKKKK";
// print_r($data);
$data[0]['num']=count($data);
$data=NULL;
	echo json_encode($data);
	echo "mmmmmmmmmmmmmmmmmmmmmmmmmm";
	// echo $data[0];

$res=array('res'=>$data);
$data['little']=count($data);
$this->load->view("kk");
	
}
public function c_test2(){
	$this->load->model('user_model');
	$lostname="te";
	$type="te";
	$ps="te";
	$place="te";
	$descripe="te";
	$fname="te";
	$data=$this->user_model->m_publish($lostname,$type,$ps,$place,$descripe,$fname);
	print_r($data);
	$this->load->view("kk");
}
public function c_test3(){
	$this->load->model('user_model');
	$data=$this->user_model->m_sixpic();
	print_r($data);

	$this->load->view("kk");
}
public function c_test4()
{
	$this->load->model('user_model');
	$p_num=555;
	$uname="测试";
	$password="fff";
	$college="ff";
	$data=$this->user_model->m_register($p_num,$uname,$password,$college);
	print_r($data);
}
public function c_test5()
{
	$this->load->model('user_model');
	$p_num="3";
	$password="5";
	$data=$this->user_model->m_checklogin($p_num,$password);
	print_r($data);
}
public function c_history()
{
	$this->load->model('user_model');
	$thetype=$this->input->post('thetype');
	$place=$this->input->post('place');
	$page=$this->input->post('page');
	$user_id=$this->input->post('user_id');
   echo $user_id;
}
public function c_detail(){

	$this->load->model('user_model');
       $id=$_GET['id'];
       $flag=$_GET['flag'];
       $data=$this->user_model->m_detail($id,$flag);
       $data2=array('res'=>$data);
       $this->load->view('detail',$data2);
}
public function c_cap()
    {
        $image=imagecreatetruecolor(76, 40);
        $bgcolor=imagecolorallocate($image,0,0,0);   //三原色；
        imagefill($image,0,0,$bgcolor);

       $captch_code="";
for($i=0;$i<4;$i++){
        $fontsize=5;
        $fontcolor=imagecolorallocate($image, rand(170,255),rand(170,255),rand(170,255));
        $fonttype="./system/fonts/001.ttf";
        $data='abcdefghijklmnpqrstuvwxy13456789';
        $fontcontent=substr($data,rand(0,strlen($data)),1);
        $captch_code.=$fontcontent;
      $x=($i*19)+rand(-3,3);
      $y=rand(30,30);
      // imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
        imagettftext($image,20,0,$x,$y,$fontcolor,$fonttype,$fontcontent);
}
for($i=0;$i<50;$i++)
{
    $pointcolor=imagecolorallocate($image,rand(100,200),rand(100,200),rand(100,200));
    imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);
}

for($i=0;$i<2;$i++){
    $linecolor=imagecolorallocate($image, rand(8,220), rand(80,220), rand(80,220));
    imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
}
$_SESSION['captch_code']=$captch_code;                               //$_SESSION存的验证码信息
$time = date("Ymdhisa");
    header('content-type:image/png');
imagepng($image);
} 
}
