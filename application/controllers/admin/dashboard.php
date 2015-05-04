<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Dashboard Controller
 * --------------------------------------
 * Author       : $Author$
 * Revision     : $Revision$
 * Date         : $Date$
 * Position     : $HeadURL$
 *
 */

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this -> load -> view('admin/dashboard');
	}

}
