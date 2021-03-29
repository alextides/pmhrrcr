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
		
		$data["title"] = "Profile | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Profile";
		$this->load_page2("profile", $data);
	}

	public function update_users()
	{
		$post = $this->input->post();
			if($post){
				$set = array(
                    
					"first_name" => $post["first_name"],
					"last_name" => $post["last_name"],
					"phone_number" => $post["phone_number"],
					"city" => $post["city"],
					"state" => $post["state"],
					"country" => $post["country"],
					"zip_code" => $post["zip_code"],
					
				);
				$where = array("fk_user_id" => $post["fk_user_id"]);
				$update = $this->MY_Model->update("bpmhsl_user_details", $set, $where);
				if($update) {
					$set = array(
						'username' => $post["username"],
						'email' => $post["email"],
					);
					$where = array("user_id" => $post["user_id"]);
					$update = $this->MY_Model->update("bpmhsl_users", $set, $where);
					$this->session->set_userdata('swal', 'Updated Successfully.');
				}
			}
		
		redirect(base_url("userlist/userlist"));
	}
}
