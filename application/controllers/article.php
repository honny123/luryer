<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function index()
	{
		$articleId = $this->uri->segment(2);
		$this->load->model('article_model');
		$this->article_model->addView($articleId);
		$article = $this->article_model->get_article_info_by_id($articleId);
		$logged_user = $this->session->userdata('logged_user');
		if($logged_user){
			$result = $this->article_model->getLike($logged_user->member_id,$articleId);
			if($result>0){
				$isLike = 1;
			}else{
				$isLike = 0;
			}
		}else{
			$isLike = 0;
		}
		$replys = $this->article_model->getReply($articleId);
		foreach ($replys as $reply) {
			$reply->pReply = $this->article_model->getPReply($reply->relate_id);
		}
		$data = array('article'=>$article,'isLike'=>$isLike,'replys'=>$replys);
		$this->load->view('detail',$data);
		
	}
	public function addLike(){
		$memberId = $this->input->get('member');
		$articleId = $this->input->get('article');
		$this->load->model('article_model');
		$result = $this->article_model->addLike($memberId,$articleId);
		if($result>0){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	public function addReply(){
		$memberId = $this->input->post('memberId');
		$articleId = $this->input->post('articleId');
		$content = $this->input->post('content');
		$floor = $this->input->post('floor');
		$relate = $this->input->post('relate');
		date_default_timezone_set('PRC');
		$date = date('Y-m-d H:i:s');
		$this->load->model('article_model');
		$this->article_model->addReply($articleId);
		$arr = array('reply_date'=>$date,'reply_content'=>$content,'member_id'=>$memberId,'article_id'=>$articleId,'relate_id'=>$relate,'floor'=>$floor);
		$result = $this->article_model->insertReply($arr);
		if($result>0){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	public function cate(){
		$this -> load -> library('pagination');
		$this->load->model('article_model');
		$cateId = $this->uri->segment(3);
		if (!$this -> uri -> segment(4)) {
			$start = 0;
		} else {
			$start = $this -> uri -> segment(4);
		}
		$count = $this -> article_model -> getArticleCount($cateId);
		$config['base_url'] = site_url("article/cate/".$cateId);
		$config['total_rows'] = $count;
		$config['per_page'] = 20;
		$config['uri_segment'] = 4;
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['cur_tag_open'] = '<a class="ui_page_item_current">';
		$config['cur_tag_close'] = '</a>';
		$this -> pagination -> initialize($config);
		$cate = $this->article_model->getCateById($cateId);
		$articles = $this->article_model->getTopArticle($start, $config['per_page'],$cateId);
		foreach ($articles as $article) {
			$article->last_reply = $this-> article_model->getLastReply($article->article_id);
		}
		$data['cate'] = $cate;
		$data['articles'] = $articles;
		$this->load->view('cate',$data);
	}
	public function delete(){
		$this->load->model('article_model');
		$articleId = $this->input->get('articleId');
		$result = $this->article_model->deleteById($articleId);
		if($result>0){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
}
