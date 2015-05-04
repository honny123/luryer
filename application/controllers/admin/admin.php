<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * user Controller
 * --------------------------------------
 * Author       : $Author$
 * Revision     : $Revision$
 * Date         : $Date$
 * Position     : $HeadURL$
 *
 */

class Admin extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this -> load -> model('admin_model');
    $data['users'] = $this -> admin_model -> get_user_info();
    $this -> load -> view('admin/list_user', $data);
  }

  public function add() {
    $this -> load -> view('admin/add_user');
  }

  public function remove() {
    $userIds = $this -> input -> get('userIds');
    if (is_array($userIds)) {
      $str = implode(',', $userIds);
    } else {
      $str = $userIds;
    }
    $this -> load -> model('admin_model');
    $result = $this -> admin_model -> remove_user_by_id($str);
    echo $result ? "success" : "failure";
  }

  public function edit($user_id) {
    $this -> load -> model('admin_model');
    $data['user'] = $this -> admin_model -> get_by_id($user_id);
    $this -> load -> view('admin/edit_user', $data);
  }

  public function post() {
    $this->load->model('admin_model');    
    $username = $this->input->post("username");
    $password = $this->input->post("password");
    $user_id = $this->input->post("userId");
    $user = array('username'=>$username,'password'=>$password);
    if($user_id ==""){
      $this->admin_model->save($user);
    }else{
      $this->admin_model->updata_user($user_id,$user);
    }
    redirect('admin/admin/');
    

  }

  public function view($user_id) {
    $this -> load -> model('admin_model');
    $data['user'] = $this -> admin_model -> get_by_id($user_id);
    $this -> load -> view('admin/view_user', $data);
  }

}
