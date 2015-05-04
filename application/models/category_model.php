<?php
class Category_model extends CI_Model {
	
	function get_all(){
		$categorys = $this->db->get('t_category')->result();	
		foreach ($categorys as $cate) {
			$relateId = $cate->relate_id;
			if($relateId == 0){
				$cate->category_belong = '一级类型';
			}else{
				$this->db->select('category_title');
				$this->db->from('t_category');
				$this->db->where('category_id',$relateId);
				$cate->category_belong = $this->db->get()->row()->category_title;
			}
		}
		return $categorys;
	}
	function get_cates(){
		return $this->db->get_where('t_category',array('relate_id'=>0))->result();
	}
	function get_all_cates(){
    return $this->db->get('t_category')->result();
  }
	function save($data){
		$this->db->insert('t_category',$data);
	}
	function get_category($cate_id){
		return $this->db->get_where('t_category',array('category_id'=>$cate_id))->row();
	}
	function change($cateId,$cate){
		$this->db->where('category_id',$cateId);
		$this->db->update("t_category",$cate);
	}
	public function delete($cate_id){//删除种类
    $this->db->query("delete from t_category where category_id in($cate_id)");  
      if($this->db->affected_rows()>0){
         return TRUE;
      }
      return FALSE;
  }
	public function getSubCate($pId){
		return $this->db->get_where('t_category',array('relate_id'=>$pId))->result();
	}
	
}
