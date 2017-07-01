<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class User_model extends CI_Model{

// public function m_checklogin($p_num,$password){
// $sql="select id from user_message where phone_num='".$p_num."'and password='".$password."'";
// $data=$this->db->query($sql);
// $db=$data->result_array($data);
// return $db;
// }

 	public function m_checklogin($p_num,$password){
 		$res=array("0","0");
 		$sql="select id,name,password from user_message where phone_num='".$p_num."'";
 		$data=$this->db->query($sql);
 		$db=$data->result_array($data);
 		if(!$db)
 			$res[0]=-1;   //错误1用户名不存在
        else if ($db[0]['password']!=$password)
        	$res[0]=-2;    //错误2密码不正确
 		else {
 			$res[0]=$db[0]['id'];
 			$res[1]=$db[0]['name'];
 		} 

 		return $res;    //res[0]是id res[1]是name
 	}

public function m_register($p_num,$uname,$password,$college){
  
  $sql0="select id from user_message where phone_num=".$p_num."";
  $data=$this->db->query($sql0);
  $db=$data->result_array($data);
if($db)
	{return "该号码被注册";}
  else{
  $sql="insert into user_message(name,phone_num,password,college) values('".$uname."','".$p_num."','".$password."','".$college."')";
  $this->db->query($sql);
  return "注册成功";
}
}


public function m_filemessage($filename,$lostname,$lostmessage,$losttime,$place,$user_id){
	$sql="insert into file_message(fname,remark,description,time,place,user_id) values('".$filename."','".$lostname."','".$lostmessage."','".$losttime."','".$place."','".$userid."')";
	$this->db->query($sql);
	return true;

}
public function m_ninepic($limst,$type,$place,$thefind,$flag){
	// $sql="select fname,id from lost_message order by id desc limit 0,9";
 if($flag==1)
  $db="lost_message";

 if($flag==2)
  	$db="found_message";
  
	if($type==""&&$place==""&&$thefind=="")
	{$sql="select ".$db.".fname,".$db.".lostname,".$db.".id,".$db.".place,".$db.".time ,user_message.name from ".$db." inner join user_message on ".$db.".user_id=user_message.id order by ".$db.".id desc limit ".$limst.",9";}
else 
{
	$sql2="";
	if($type!="")
	{
		$sql2=$sql2."and ".$db.".type='".$type."'";
	}
	if($place!="")
	{
		$sql2=$sql2."and ".$db.".place='".$place."'";
	}
	if($thefind!="")
	{
		$sql2=$sql2."and (".$db.".type like '%".$thefind."%' or ".$db.".description like '%".$thefind."%' or ".$db.".lostname like '%".$thefind."%')";

		
	}
	$sql="select ".$db.".fname,".$db.".lostname,".$db.".id,".$db.".place,".$db.".time ,user_message.name from ".$db." inner join user_message on ".$db.".user_id=user_message.id ".$sql2." order by ".$db.".id desc limit ".$limst.",9";
}
	$data=$this->db->query($sql);
	$db=$data->result_array($data);
	return $db;
}
public function m_detail($id,$flag){

   if($flag==2)
   {
   	  $db="found_message";
   }
   if($flag==1)
   {
      $db="lost_message";
   }

	$sql="select fname,ps,time,place,description,type,lostname from ".$db." where id='".$id."'";
	$data=$this->db->query($sql);
	$db=$data->result_array($data);
	return $db;
}




public function m_publish($lostname,$type,$ps,$place,$descripe,$fname,$user_id,$flag){
$thedb='found_message';
if($flag==1)
	{$thedb='lost_message';}
	$sql="insert into ".$thedb." (lostname,type,ps,place,description,fname,user_id)  values ('".$lostname."','".$type."','".$ps."','".$place."','".$descripe."','".$fname."','".$user_id."')";
    $this->db->query($sql);	
    $sql2="select ps from ".$thedb." where id=-1";
   $data=$this->db->query($sql2); 
   $db=$data->result_array($data);
   $pr=$db[0]['ps']+1;
   $sql3="update ".$thedb." set ps=".$pr." where id=-1";
   $this->db->query($sql3);		
 return "发布成功";
}
public function m_sixpic(){
    $sql="select lost_message.fname,lost_message.lostname,lost_message.id,lost_message.place,lost_message.time ,user_message.name from lost_message inner join user_message on lost_message.user_id=user_message.id order by lost_message.id desc limit 0,6";
	$data=$this->db->query($sql);                 //lost mesage 基本数据 db
	$db=$data->result_array($data);

	$sql2="select ps from lost_message where id=-1";
	$data2=$this->db->query($sql2);  
	$db2=$data2->result_array($data2);             //lost message sum数据 db2




$sqlc="select found_message.fname,found_message.lostname,found_message.id,found_message.place,found_message.time ,user_message.name from found_message inner join user_message on found_message.user_id=user_message.id order by found_message.id desc limit 0,6";
	$datac=$this->db->query($sqlc);
	$dbc=$datac->result_array($datac);       //found message基本数据  dbc

	$sqlc2="select ps from found_message where id=-1";
	$datac2=$this->db->query($sqlc2);
	$dbc2=$datac2->result_array($datac2);          //found message sum数据  dbc2

    $res=array();
$res[0]=$db;
$res[1]=$dbc;
$res[0]['ex']=$db2[0]['ps'];
$res[1]['ex']=$dbc2[0]['ps'];
	// $db['ex']=$db2[0]['ps'];
	return $res;
}

public function m_hpic()
{    $id="14";
	// $sql="select lost_message.fname,lost_message.lostname,lost_message.id,lost_message.place,lost_message.time,user_message.name from lost_message inner join user_message on lost_message.user_id=user_message.id order by lost_message.id desc limit 0,6";
	$sql="select lost_message.fname,lost_message.lostname,lost_message.id,lost_message.place,lost_message.time,user_message.name from lost_message inner join user_message on lost_message.user_id=user_message.id where(lost_message.user_id=".$id.") order by lost_message.id desc limit 0,6 ";
   $data=$this->db->query($sql);  
   $db2=$data->result_array($data);
    $lm=array('lost'=>$db2);
 if(count($db2)<6);
   {
   	$sql="select found_message.fname,found_message.lostname,found_message.id,found_message.place,found_message.time,user_message.name from found_message inner join user_message on found_message.user_id=user_message.id where(found_message.user_id=".$id.") order by found_message.id desc limit 0,6";
    $datac=$this->db->query($sql);
    $dbc2=$datac->result_array();
    // $lm=array('found'=>$dbc2);
    $lm['found']=$dbc2;
   }
   return $lm;
}
}


?>