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
		$data['user_prof'] = $this->get_users_info();
		$this->load_page2("profile", $data, "profile_footer.php", "profile_header.php");
	}
	public function get_users_info() {
		$fk_user_id = $this->session->userdata('user_details')[0]['user_id'];
		$param["select"] = "*";
		$param["where"] = array("user_id" => $fk_user_id);
		$param["join"] = array("bpmhsl_user_details" => "bpmhsl_user_details.user_details_id = bpmhsl_users.user_id");
		$res = $this->MY_Model->getRows("bpmhsl_users", $param);
		return $res;
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
		
		redirect(base_url("profile"));
	}
	

	
}
