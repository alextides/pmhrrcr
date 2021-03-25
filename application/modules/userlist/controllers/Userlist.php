<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlist extends MY_Controller
{

	public function index()
	{
		$data["title"] = "Manage Users | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Manage Users";
		$this->load_page2("userlist", $data, "user_footer.php", "user_header.php");
	}
    public function adduser(){
		$post = $this->input->post();
			$user_data = array(

                'username' => $post["username"],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'email' => $post["email"],
                'date_added' => date("Y-m-d"),
                'user_type' => "User",
                'user_status' => 0
            );
            $insert_user = $this->MY_Model->insert('bpmhsl_users', $user_data);
            if($insert_user){
                $user_data = array(
                'fk_user_id' => $insert_user,
                'first_name' => $post["first_name"],
				'last_name' => $post["last_name"],
				'phone_number' => $post["phone_number"],
				'city' => $post["city"],
				'state' => $post["state"],
				'country' => $post["country"],
				'zip_code' => $post["zip_code"],
            );
                $this->MY_Model->insert('bpmhsl_user_details', $user_data);
                $this->session->set_userdata('swal', 'Added successfully.');
                redirect(base_url("userlist"));
            }

	}
    public function get_userlist(){

    }
}
