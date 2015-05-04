<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function sendMail()
	{
		$adress = $this->input->get("adress");
		$this->load->model('member_model');
		$activeCode = rand(10000000,99999999);
		$config['adress'] = $adress;
		$config['activeCode'] = $activeCode;
		$this->load->helper('sendmail');
		$result = sendmail($config);
		print_r($result);
		die;
		// $this->member_model->addMail($adress,$activeCode);
		// //以下设置Email参数  
        // $config['protocol'] = 'smtp';  
        // $config['smtp_host'] = 'smtp.yeah.net';  
		// $config['smtp_port'] = 25;
        // $config['smtp_user'] = 'luryer@yeah.net';  
        // $config['smtp_pass'] = 'wlsh.425071817';  
        // $config['charset'] = 'utf-8';
		// $config['wordwrap'] = TRUE;
		// $this->load->library('email',$config);
		// $sendMessage = '尊敬的'.$adress.":\n感谢您注册裸游网，点击下面链接激活账户。\n".site_url('active?adress='.$adress.'&code='.$activeCode);
		// $this->email->from('luryer@yeah.net', '裸游网');
		// $this->email->to($adress); 		
		// $this->email->subject('裸游网账户激活');
		// $this->email->message($sendMessage); 		
		// $this->email->send();
		// echo $this->email->print_debugger();
		// if($this->email->send()){
			// echo "success";
		// }else{
			// echo "fail";
		// }
	}
	public function unique(){
		$adress = $this->input->get('adress');
		$this->load->model('member_model');
		$result = $this -> member_model->getEmail($adress);
		if($result > 0){
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
