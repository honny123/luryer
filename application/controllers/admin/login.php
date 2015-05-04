<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Login Controller
 * --------------------------------------
 * Author       : wanglongsheng
 * Date         : 2015-2-18
 *
 */

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this -> check_login()) {
			redirect('admin/dashboard');
		} else {
			$this -> load -> view('admin/login');
		}
	}

	private function check_login() {
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
		$is_logged_in = FALSE;

		if (!empty($username) && !empty($password)) {
			$this -> load -> model('admin_model');
			$admin = $this -> admin_model -> get_admin_by_name_and_pwd($username, $password);
			if ($admin) {
				$this -> session -> set_userdata('logged_user', $admin);
				$is_logged_in = TRUE;
			}
		}
		return $is_logged_in;
	}

}
