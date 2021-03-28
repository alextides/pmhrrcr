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
    public function get_userlist()
	{
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];

		$col = 0;
		$dir = "";
		if (!empty($order)) {
			foreach ($order as $o) {
				$col = $o['column'];
				$dir = $o['dir'];
			}
		}

		if ($dir != "asc" && $dir != "desc") {
			$dir = "desc";
		}

		$valid_columns = array(
			1 => 'first_name',
			2 => 'last_name',
            3 => 'username',
            4 => 'email',
            5 => 'phone_number',
            6 => 'city',
            7 => 'state',
            8 => 'country',
            9 => 'zip_code',
		);

		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null) {
			$this->db->order_by($order, $dir);
		}

		$x = 0;
		if (!empty($search)) {
			$this->db->group_start();
			foreach ($valid_columns as $sterm) {
				if ($x == 0) {
					$this->db->like($sterm, $search);
				} else {
					$this->db->or_like($sterm, $search);
				}
				$x++;
			}
			$this->db->group_end();
		}

        $userlist= $this->db
        ->select('*')
        ->from('bpmhsl_users')
        ->join('bpmhsl_user_details', 'bpmhsl_user_details.fk_user_id= bpmhsl_users.user_id')
        ->get();

		$data = array();

		foreach ($userlist->result() as $tm) {
			$action_btn = "";
            $action_btn .= "<a class='btn btn-xs edit-users' user-id=".$tm->user_details_id." data-toggle='tooltip' data-placement='bottom' title='Update'  data-toggle='modal' data-target='#UpdateUsers' href=''><i class='fa fa-edit'></i></a>";
			$action_btn .= "<a class='btn btn-xs delete-users' user-id=".$tm->user_details_id." data-toggle='tooltip' data-placement='bottom' title='Delete' href=''><i class='fa fa-trash'></i></a>";

			$data[] = array(
                $tm->user_details_id,
				$tm->first_name,
				$tm->last_name,
                $tm->username,
				$tm->email,
				$tm->phone_number,
				$tm->city,
                $tm->state,
                $tm->country,
                $tm->zip_code,
				$action_btn
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $userlist->num_rows(),
			"recordsFiltered" => $userlist->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

    public function get_users($id = '')
	{
		$result = $this->db
		->select('*')
        ->from('bpmhsl_users')
        ->join('bpmhsl_user_details', 'bpmhsl_user_details.fk_user_id= bpmhsl_users.user_id')
		->where('user_details_id', $id)
		->get()
		->result_array();
		echo json_encode($result);
		exit();
	}

    public function update_users()
	{
		$post = $this->input->post();
			if(!empty($post)) {
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
				$res = $this->MY_Model->update("bpmhsl_user_details", $set, $where);
				if($res) {
					$set = array(
						'username' => $post["username"],
						'email' => $post["email"],
					);
					$where = array("user_id" => $post["user_id"]);
					$res = $this->MY_Model->update("bpmhsl_users", $set, $where);
					if ($res) {
						$this->errmsg = "";
						$resmsg = array("err" => false, "msg" => "Updated Successfully!");
						$this->session->set_flashdata('res_err', $resmsg);
					} else {
						$resmsg = array("err" => true, "msg" => "Updating user failed!");
						$this->session->set_flashdata('res_err', $resmsg);
					}
				}
			}
		
		redirect(base_url("userlist/userlist"));
	}

   
}
