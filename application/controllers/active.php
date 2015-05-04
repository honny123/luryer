<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active extends CI_Controller {

	public function index()
	{
		$adress = $this->input->get('adress');
		$activeCode = $this->input->get('code');
		$this->load->model('member_model');
		$result = $this->member_model->changeStatus($adress,$activeCode);
		$data['result'] = $result;
		$data['mail'] = $adress;
		$data['code'] = $activeCode;
		$this->load->view('register',$data);
	}
	
}
