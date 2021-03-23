<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training_materials extends MY_Controller
{

	public function index()
	{
		$data["title"] = "Training Materials | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Training Materials";
		$this->load_page2("training_materials", $data, "tm_footer.php", "tm_header.php");
	}

	public function add_training()
	{

	}
}
