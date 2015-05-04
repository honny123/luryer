<?php
class Admin_model extends CI_Model {

	function get_admin_by_name_and_pwd($username, $password){
		return $this->db->get_where('t_admin',array("username"=>$username,"password"=>$password))->row();
	}
	function get_user_info(){
		return $this->db->get("t_admin")->result();
	}
	function save($user){
		$this->db->insert("t_admin",$user);	
	}
	function updata_user($user_id,$user){
		$this->db->where("admin_id",$user_id);
		$this->db->update("t_admin",$user);
	}
	function  get_by_id($user_id){
		return $this->db->get_where("t_admin",array("admin_id"=>$user_id))->row();
	}
	function remove_user_by_id($str){
		$this->db->query("delete from t_admin where admin_id in($str)");
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
}
