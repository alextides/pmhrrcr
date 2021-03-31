<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	private $errmsg = "";

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		// echo "<pre>";print_r($this->session->userdata());exit;
		$data["title"] = "Dashboard | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Dashboard";
		$this->load_page2("dashboard", $data, "i_footer.php", "");
	}

	// File upload
	public function fileUpload()
	{

		if (!empty($_FILES['file']['name'])) {

			// Set preference
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '1024'; // max_size in kb
			$config['file_name'] = $_FILES['file']['name'];

			//Load upload library
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('file')) {
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}
	}
}
