<?php
class Advice_model extends CI_Model {

  function get_advice_info(){
    
    $this->db->order_by("advice_id","desc");
    return $this->db->get("t_advice")->result();
  }
  
  function get_by_id($advice_id){
    return $this->db->get_where("t_advice",array("advice_id"=>$advice_id))->row();
  }
  function saveAdvice($data){
  	$this->db->insert('t_advice', $data);
	return $this->db->insert_id();
  }
}
