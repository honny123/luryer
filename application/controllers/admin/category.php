<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Article Controller
 * --------------------------------------
 * Author       : $Author$
 * Revision     : $Revision$
 * Date         : $Date$
 * Position     : $HeadURL$
 *
 */

class Category extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('category_model');
	}

	public function index() {	 
		$data['rows'] = $this -> category_model -> get_all();
		$this -> load -> view('admin/list_category',$data);
	}
	public function add(){
		$data['cates'] = $this -> category_model -> get_cates();
		$this -> load -> view('admin/add_category', $data);
	}
	public function post(){
		$cateId = $this->input->post('cateId');
		$cate['category_title'] = $this->input->post('catename');
		$cate['relate_id'] = $this->input->post('type_id');
		if($cateId==""){
			$this->category_model->save($cate);	
		}else{
			$this->category_model->change($cateId,$cate);
		}
		redirect('admin/category/');
	}
	public function edit($cate_id){
		$data['cate'] = $this->category_model->get_category($cate_id);
		$data['cates'] = $this -> category_model -> get_cates();
		$this->load->view('admin/edit_category',$data);
	}
	public function remove() {
    $cateIds = $this -> input -> get('cateIds');
    if (is_array($cateIds)) {
      $str = implode(',', $cateIds);
    } else {
      $str = $cateIds;
    }
    $result = $this -> category_model -> delete($str);
    echo $result ? "success" : "failure";
  }
}
