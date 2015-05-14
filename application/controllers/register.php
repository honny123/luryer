<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function sendMail()
	{
		
		
		$adress = $this->input->get("adress");
		$activeCode = rand(10000000,99999999);
		$this->load->model('member_model');
	    $this->load->library('email');
	    //$this->email->initialize($config);
	    $sendMessage = "尊敬的".$adress.":\r\n感谢您注册裸游网，点击下面链接激活账户。\r\n".site_url('active?adress='.$adress.'&code='.$activeCode)."\r\n"."\r\n(如果不能直接点击地址，请将地址复制到地址栏中.)";
		$this->email->from('luryer@yeah.net', '裸游网');
		$this->email->to($adress); 		
		$this->email->subject('裸游网账户激活');
		$this->email->message($sendMessage); 		
		$this->email->send();
		//var_dump($adress);
	    if ($this->email->send()) {
			$this->member_model->addMail($adress,$activeCode);
	    	echo 'success';
	    } else {
	   		 echo 'false';
	    }
		
		
		
		
	}
	public function unique(){
		$adress = $this->input->get('adress');
		$this->load->model('member_model');
		$result = $this -> member_model->getEmail($adress);
		if($result>0){
			echo 'fail';
		}else{
			echo "success";
		}
	}
	public function savePass(){
		$password = $this->input->get('password');
		$mail = $this->input->get('mail');
		$code = $this->input->get('code');
		$this->load->model('member_model');
		$password = md5($password);
		$result = $this->member_model->savePassword($mail,$code,$password);
		if($result > 0){
			echo 'success';
		}else{
			echo "fail";
		}
	}
	public function checkuser(){
		$username = $this->input->get('username');
		$password = $this->input->get('password');
		$isRemember = $this->input->get('isRemember');
		$this->load->model('member_model');
		$password = md5($password);
		$user = $this->member_model->checkuser($username,$password);
		if($user){
			if($isRemember == 1){
				$this->input->set_cookie('remember',$user->member_id,1209600);
			}
			$this -> session -> set_userdata('logged_user', $user);
			echo 'success';
		}else{
			echo "fail";
		}
	}
}
