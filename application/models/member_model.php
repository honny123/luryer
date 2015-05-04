<?php
class Member_model extends CI_Model {

  function get_member_info(){
    return $this->db->get("t_member")->result();
  }
  function get_by_id($member_id){
    return $this->db->get_where("t_member",array("member_id"=>$member_id))->row();
  } 
  function remove_member_by_id($str){
    $this->db->query("update t_member set is_delete = 1 where member_id in($str)");
    if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  function edit_member_by_id($str){
    $this->db->query("update t_member set is_delete = 0 where member_id in($str)");
    if($this->db->affected_rows()>0){
      return TRUE;
    }else{
      return FALSE;
  }
}
  //-------------------------------------font end-----------------------------------------
  function addMail($mail,$activeCode){
  	$data = array(
		'email' => $mail,
		'activeCode' => $activeCode,
		'status' => 0 
	);
  	$this -> db->insert('t_member',$data);
  }
  function changeStatus($mail,$activeCode){
  	$data = array('status'=>1);
	$this->db->update('t_member',$data,array('email'=>$mail,'activeCode'=>$activeCode));
	return $this->db->affected_rows();
  }
  function getEmail($adress){
  	return  $this->db->get_where("t_member",array('email'=>$adress))->num_rows();
  }
  function savePassword($mail,$code,$password){
  	$data = array('password'=>$password);
	$this->db->update('t_member',$data,array('email'=>$mail,'activeCode'=>$code));
	return $this->db->affected_rows();
  }
  function checkuser($username,$password){
  	return $this->db->get_where("t_member",array('email'=>$username,'password'=>$password))->row();
  }
  function getById($remember){
  	return $this->db->get_where('t_member',array('member_id'=>$remember))->row();
  }
  function savePhoto($memberId,$pic){
  	$data = array('photo'=>$pic);
  	$this->db->update("t_member",$data,array('member_id'=>$memberId));
  }
  function getPhoto($memberId){
  	$this->db->select('photo');
  	$this->db->from('t_member');
	$this->db->where('member_id',$memberId);
	return $this->db->get()->row();
  }
  function saveThumbPhoto($memberId,$thumbPhoto){
  	$data = array('thumb_photo'=>$thumbPhoto);
	$this->db->update('t_member',$data,array('member_id'=>$memberId));
	return $this->db->affected_rows();
  }
  function updateInfo($memberId,$data){
  	$this->db->where('member_id', $memberId);
	$this->db->update('t_member', $data); 
	return $this->db->affected_rows();
  }
}
