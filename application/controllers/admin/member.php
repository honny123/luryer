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

class Member extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this -> load -> model('member_model');
  }

  public function index() {
    $data['members'] = $this -> member_model -> get_member_info();
    $this -> load -> view('admin/list_member', $data);
  }
  public function remove() {
    $memberIds = $this -> input -> get('memberIds');
    if (is_array($memberIds)) {
      $str = implode(',', $memberIds);
    } else {
      $str = $memberIds;
    }
    $result = $this -> member_model -> remove_member_by_id($str);
    echo $result ? "success" : "failure";
  }
  public function view($member_id) {
    $data['member'] = $this -> member_model -> get_by_id($member_id);
    $this -> load -> view('admin/view_member', $data);
  }
  public function edit(){
    $memberIds = $this->input->get("memberIds");
    if (is_array($memberIds)) {
      $str = implode(',', $memberIds);
    } else {
      $str = $memberIds;
    }
    $result = $this -> member_model -> edit_member_by_id($str);
    echo $result ? "success" : "failure";
  }

}
