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

class Advice extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this -> load -> model('advice_model');
    $data['advices'] = $this -> advice_model -> get_advice_info();
    $this -> load -> view('admin/list_advice', $data);
  }
  public function view($advice_id) {
    $this -> load -> model('advice_model');
    $data['advice'] = $this -> advice_model -> get_by_id($advice_id);
    $this -> load -> view('admin/view_advice', $data);
  }

}
