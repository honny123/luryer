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

class Article extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this -> load -> model('article_model');
    $this -> load -> helper(array('file', 'form'));
    $this->load->library("image_lib");
  }

  public function index() {  
    $data['articles'] = $this -> article_model -> get_all();
    $this -> load -> view('admin/list_article',$data);
  }
 public function add(){
    $this->load->model("category_model");
     $data['cates'] = $this -> category_model -> get_all_cates();
     $this -> load -> view('admin/add_article', $data);
   }
  public function post() {
    $config['upload_path'] = "./uploads/article/";
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999) ;
    // $config['max_size'] = '2048';
    // $config['max_width']  = '2048';
    //$config['max_height']  = '768';

    $this -> load -> library('upload', $config);

    $field_name = "picture";
    $this -> upload -> do_upload($field_name);

    $upload_data = $this -> upload -> data();
    //配置图片处理
    $config['image_library'] = 'gd2';
    $config['source_image'] = $upload_data['full_path'];
    $config['thumb_marker'] = '';
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['master_dim'] = 'width';
    $config['width'] = 235;
    // $config['height'] = 208;

    $this->image_lib->initialize($config);
    $this->image_lib->resize();
    $this->image_lib->clear();
    $thumb_image_name = $upload_data['raw_name'].$upload_data['file_ext'];
    $this -> load -> model('article_model');
    $article_id = $this -> input -> post('articleId');
    $article = array(
      "article_title" => $this -> input -> post("title"), 
      "category_id" => $this -> input -> post('type_id'), 
      "member_id" => 0,
      "article_date" => date("Y-m-d H:i:s"),
      "is_top" => $this->input->post("is_top"),
      "article_content" => $this -> input -> post('content'),
      "is_delete"=>0,
      "picture"=>$thumb_image_name
    );
    if ($article_id == '') {//新添加
      $insert_id = $this -> article_model -> save($article);
      $this -> view($insert_id);
    } else {//修改
      $this -> article_model -> update($article_id, $article);
      $this -> view($article_id);
    }

  }
  public function view($article_id){
    $article = $this -> article_model -> get_article_info_by_id($article_id);
    $data = array('article'=>$article);
    $this -> load -> view('admin/view_article', $data);
  }
  public function remove() {
    $articleIds = $this -> input -> get('articleIds');
    if (is_array($articleIds)) {
      $str = implode(',', $articleIds);
    } else {
      $str = $articleIds;
    }
    $result = $this -> article_model -> delete($str);
    echo $result ? "success" : "failure";
  }
  public function edit($article_id){
    $data['article'] = $this -> article_model -> get_article_info_by_id($article_id);
    $this -> load -> model('category_model');
    $data['cates'] = $this -> category_model -> get_all_cates();
    $this -> load -> view('admin/edit_article', $data);
  }
}
