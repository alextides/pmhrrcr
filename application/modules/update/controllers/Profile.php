<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

	private $errmsg = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$data["title"] = "Update Profile | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Update Profile";
		$this->load_page2("profile", $data);
	}
}
