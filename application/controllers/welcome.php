<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$remember = $this->input->cookie('remember',TRUE);
		if($remember){
			$this->load->model('member_model');
			$user = $this->member_model->getById($remember);
			$this -> session -> set_userdata('logged_user', $user);
		}
		$this->load->model('article_model');
		$this->load->model('category_model');
		$hot_article = $this->article_model->getHotArticle();
		$cateArr = array();
		$cates = $this->category_model->get_cates();
		foreach($cates as $cate){
			$subCate = $this->category_model->getSubCate($cate->category_id);
			if(count($subCate) == 0){
				array_push($cateArr,$cate);
			}else{
				$cateArr = array_merge($cateArr, $subCate);
			}
		}
		foreach ($cateArr as $ct) {
			$ct->articles = $this->article_model->getArticleByCate($ct->category_id);
		}
		$data['hot_article'] = $hot_article;
		$data['cates'] = $cateArr;
		$this->load->view('index',$data);
	}
	public function newarticle(){
		$this->load->model('category_model');
		$cates = $this->category_model->get_cates();
		$cateArr=array();
		foreach($cates as $cate){
			$subCate = $this->category_model->getSubCate($cate->category_id);			
			if(count($subCate) == 0){
				array_push($cateArr,$cate);
			}else{
				$cateArr = array_merge($cateArr, $subCate);
			} 
		}
		$data=array(
			'cates'=>$cateArr
		);
		$this->load->view('newarticle',$data);
	}
	public function up_cover(){
		$this->load->view('up_cover');
	}
	public function pre_picture(){
		$this->load->view('pre_picture');
	}
	public function do_upload(){
		$config['upload_path'] = "./uploads/article/";
    	$config['allowed_types'] = 'gif|jpg|png|jpeg';
    	$config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999) ;
		$this->load->library('upload',$config);
		
		if($this->upload->do_upload()){
			$uplist=$this->upload->data();
			$this->session->set_userdata("upload_pic",$uplist);
			$this->load->view('up_cover');
		}

	}
	public function card_submit(){
		$this->load->library("image_lib");
		$this->load->model('article_model');
		$memberId = $this->input->post('memberId');		
		$title=$this->input->post('title');
		$sort=$this->input->post('sort');
		$content=$this->input->post('content');
		$upload_pic=$this->session->userdata('upload_pic');
		//配置图片处理
	    $config['image_library'] = 'gd2';
	    $config['source_image'] = $upload_pic['full_path'];
	    $config['thumb_marker'] = '';
	    $config['create_thumb'] = TRUE;
	    $config['maintain_ratio'] = TRUE;
	    $config['master_dim'] = 'width';
	    $config['width'] = 235;
	    $config['height'] = 160;
	    $this->image_lib->initialize($config);
	    $this->image_lib->resize();
	
		date_default_timezone_set('PRC');
		$time=date('Y-m-d H:i:s');
		$cover=$upload_pic['file_name'];
		$data=array(
			'article_title'=>$title,
			'article_content'=>$content,
			'cover'=>$cover,
			'category_id'=>$sort,
			'article_date'=>$time,
			'member_id'=>$memberId,
			'is_delete'=>'0',
			'is_top'=>'0'
		);	
		$result=$this->article_model->insert_article($data);
		
		if($result > 0){
			redirect('./article/'.$result);
		}
	}
	public function search(){
		$categoryId = $this->input->post('cate');
		$keyword = $this->input->post('keyword');
		if($keyword){
			$this->load->model('article_model');
			$articles = $this->article_model->getSearch($categoryId,$keyword);
			if($categoryId != 0){
				foreach ($articles as $article) {
					$article->category_title = array();
					$article->last_reply = $this->article_model->getLastReply($article->article_id);
				}	
			}else{
				foreach ($articles as $article) {
					$article->last_reply = $this->article_model->getLastReply($article->article_id);
				}
			}
			$data['articles'] = $articles;	
		}else{
			$data['articles'] = array();
		}
		$this->load->view('search',$data);
	}
	public function register(){
		$data['result'] = 0;
		$this->load->view('register',$data);
	}
	public function login(){
		$this->load->view('login');
	}
	public function logout(){
		$this->session->unset_userdata("logged_user");
		 redirect("./");
		
	}
	public function code(){
		$this->load->library("creatcode");
	}
	public function checkcode(){
	    session_start();
	    if((strtoupper($_POST["code"])) == strtoupper(($_SESSION["VerifyCode"]))){
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function advice(){
		$this->load->view('advice');
	}
	public function saveAdvice(){
		$comment = $this->input->post('comment');
		$tel = $this->input->post('tel');
		$email = $this->input->post('email');
		$memberId = $this->input->post('memberId');
		$this->load->model("advice_model");
		date_default_timezone_set('PRC');
		$advice_time = date('Y-m-d H:i:s');
		$data = array(
			'advicer' =>$memberId,
			'advice_date'=>$advice_time,
			'advice_content'=>$comment,
			'advice_email'=>$email,
			'advice_phone'=>$tel
		);
		$result = $this->advice_model->saveAdvice($data);
		if($result>0){
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function member(){
		$memberId = $this->uri->segment(2);
		$this->load->model('member_model');
		$this->load->model('article_model');
		$user = $this->member_model->getById($memberId);
		$article = $this->article_model->getArticleByUser($memberId);
		$data = array('member'=>$user,'article'=>$article);
		$this->load->view('member',$data);
	}
	public function uploadify(){
		$config['upload_path'] = "./uploads/member/";
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999) ;
	    $this -> load -> library('upload', $config);	
	    $field_name = "Filedata";
	    $this -> upload -> do_upload($field_name);	
	    $upload_data =  $this->upload->data();
		$this->load->model('member_model');
		$logged_user = $this->session->userdata('logged_user');
		$this->member_model->savePhoto($logged_user->member_id,$upload_data['file_name']);
		echo json_encode($upload_data);
	}
	public function packImg(){
		$this->load->library('image_lib');
		$x = $this->input->get('x');
		$y = $this->input->get('y');
		$w = $this->input->get('w');
		$h = $this->input->get('h');
		$pw = $this->input->get('pw');
		$ph = $this->input->get('ph');
		$this->load->model('member_model');
		$logged_user = $this->session->userdata('logged_user');
		$photo = $this->member_model->getPhoto($logged_user->member_id);
		$arr=explode('.',$photo->photo);
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/member/'.$photo->photo;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $pw;
		$config['height'] = $ph;	
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
		$config['image_library'] = 'gd2';
		//$config['library_path'] = '/usr/X11R6/bin/';
		$config['source_image'] = './uploads/member/'.$arr[0].'_thumb.'.$arr[1];
		$config['maintain_ratio'] = FALSE;
		$config['x_axis'] = $x;
		$config['y_axis'] = $y;	
		$config['width'] = $w;
		$config['height'] = $h;
		$this->image_lib->initialize($config); 
		if($this->image_lib->crop()){
			$result = $this->member_model->saveThumbPhoto($logged_user->member_id,$arr[0].'_thumb_thumb.'.$arr[1]);
			if($result>0){
				$arr = array('thumbPhoto' =>$arr[0].'_thumb_thumb.'.$arr[1] );
				echo json_encode($arr);
			}else{
				$arr = array('thumbPhoto' =>'' );
				echo json_encode($arr);
			}
		}
	}
	function saveuserInfo(){
		$username = $this->input->post('username');
		$gender = $this->input->post('gender');
		$birth = $this->input->post('birth');
		$prov = $this->input->post('prov');
		$city = $this->input->post('city');
		$town = $this->input->post('town');
		$signature = $this->input->post('bio');
		$site = $this->input->post('site');
		$preference = $this->input->post('preference');
		$homeText = $this->input->post('homeText');
		$nowHome = $prov."-".$city."-".$town;
		$memberId = $this->input->post('memberId');
		$arr = array(
		'nickname'=>$username,
		'gender'=>$gender,'birth'=>$birth,'nowHome'=>$nowHome,
		'signature'=>$signature,'website'=>$site,'preference'=>$preference,
		'homeText'=>$homeText
		);
		$this->load->model('member_model');
		$result = $this->member_model->updateInfo($memberId,$arr);
		if($result>0){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	public function aboutus(){
		$this->load->view('static/about');
	}
	public function contactus(){
		$this->load->view('static/contact');
	}
	public function advertising(){
		$this->load->view('static/advertising');
	}
	public function privacy(){
		$this->load->view('static/privacy');
	}
	public function duty(){
		$this->load->view('static/duty');
	}
	public function agreement(){
		$this->load->view('static/agreement');
	}
	public function sitemap(){
		$this->load->view('static/sitemap');
	}
	public function rules(){
		$this->load->view('static/rules');
	}
	public function company(){
		$this->load->view('static/company');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */