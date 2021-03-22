<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	private $errmsg = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo "<pre>";print_r($this->session->userdata());exit;
		$data["title"] = "Dashboard | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Dashboard";
		$this->load_page2("dashboard", $data, "i_footer.php", "");
	}
}
