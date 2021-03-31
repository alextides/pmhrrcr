<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training_materials extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('ckeditor_helper');

		$ata['ckeditor'] = array(
			'id' => 'content',
			'path' => 'js/ckeditor',
			'config' => array(
				'toolbar' => "Full",
				'width' => "550px",
				'height' => '100px',
			),

			'styles' => array(
				'style 1' => array(
					'name' => 'Blue Title',
					'element' => 'h2',
					'styles' => array(
						'color' => 'Blue',
						'font-weight' => 'bold'
					)
				),

				'style 2' => array(
					'name' => 'Red Title',
					'element' => 'h2',
					'styles' => array(
						'color' => 'Red',
						'font-weight' => 'bold',
						'text-decoration' => 'underline'
					)
				)
			)
		);

		$data['ckeditor_2'] = array(
			'id' => 'content_2',
			'path' => 'js/ckeditor',
			'config' => array(
				'width' => "100%",
				'height' => '100px',
				'toolbar' => array(
					array('Bold', 'Italic'),
					array('Underline', 'Strike', 'FontSize'),
					array('Smiley'),
					'/'
				)
			),

			'styles' => array(
				'style 3' => array(
					'name' => 'Green Title',
					'element' => 'h3',
					'styles' => array(
						'color' => 'Green',
						'font-weight' => 'bold'
					)
				)
			)
		);
	}

	public function index()
	{
		$data["title"] = "Training Materials | BRK Psychiatric Mental Health Services LLC";
		$data["pagename"] = "Training Materials";
		
		$this->load->library('CKEditor');
		$this->load->library('CKFinder');
		$this->ckfinder->SetupCKEditor($this->ckeditor, '../../assets/ckfinder/');

		// $data['materials'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['materials'] = $this->get_materials();
		$this->load_page2('training_materials', $data, "tm_footer.php", "tm_header.php");
	}

	function deactivate_material($training_id=''){
		$set = array("training_status" => 1);
		$where = array("training_id" => $training_id);
		$res = $this->MY_Model->update("bpmhsl_training_materials", $set, $where);
		$this->session->set_userdata('swal','Training material deactivated successfully.');
		redirect('training_materials');
	}

	function activate_material($training_id='')
	{
		$set = array("training_status" => 0);
		$where = array("training_id" => $training_id);
		$res = $this->MY_Model->update("bpmhsl_training_materials", $set, $where);
		$this->session->set_userdata('swal', 'Training material activated successfully.');
		redirect('training_materials');
	}

	function get_materials($training_id='')
	{
		$param["select"] = "*";
		$param["where"] = array("training_id" => $training_id);
		$data['materials'] = $this->MY_Model->getRows("bpmhsl_training_materials", $param);
		// echo '<pre>';
		// print_r($data);
		// exit;
	}

	public function get_training($id = '') {
		$result = $this->db
		->select('*')
		->from('bpmhsl_training_materials')
		->where('training_id', $id)
		->get()
		->result_array();
		echo json_encode($result);
		exit();
	}

	public function update_material() {
		$post = $this->input->post();
		$book_image  = $_FILES['update_book_image']['name'];
		if (!empty($book_image)) {
			$files_path = 'assets/uploads/files/';
			$tmp_name1 = $_FILES['update_book_image']['tmp_name'];
			$name1 = $_FILES['update_book_image']['name'];
			move_uploaded_file($tmp_name1, $files_path . time() . '_' . $name1);
			$book_image  = $_FILES['update_book_image']['name'];
			$filename2 = time().'_'. $book_image;
		}
		if (!empty($book_image)) {
			$this->db->
			set('book_name', $post["update_book_name"])->
			set('book_image', $filename2)->
			set('subscription_price', $post["update_subs_price"])->
			set('book_description', $post["update_book_desc"])->
			where('training_id', $_POST['update_training_id'])->
			update('bpmhsl_training_materials');
		} else {
			$this->db->
			set('book_name', $post["update_book_name"])->
			set('subscription_price', $post["update_subs_price"])->
			set('book_description', $post["update_book_desc"])->
			where('training_id', $_POST['update_training_id'])->
			update('bpmhsl_training_materials');
		}
		$this->session->set_userdata('swal', 'Record has been updated.');
		redirect('training_materials');
	}

	// public function add_training_materials() {
	// 	$post = $this->input->post();

	// 	$files_path = 'assets/uploads/files/';

	// 	$book_image  = $_FILES['book_image']['name'];
	// 	$book_file  = $_FILES['book_file']['name'];

	// 	$tmp_name1 = $_FILES['book_image']['tmp_name'];
	// 	$name1 = $_FILES['book_image']['name'];
	// 	move_uploaded_file($tmp_name1, $files_path . time() . '_' . $name1);
	// 	$book_image = time() . '_' . $book_image;

	// 	$all_files = array();
	// 	for ($i = 0; $i < count($book_file); $i++) {
	// 		array_push($all_files, $book_file[$i]);
	// 	}
	// 	$selected_files = implode(", ", $all_files);
	// 	// echo '<pre>';
	// 	// print_r($selected_files);
	// 	//  exit;

	// 	// if(move_uploaded_file($selected_files, $files_path)){
	// 		$submit_training = array(
	// 			'files' => $selected_files,
	// 			'book_name' => $post["book_name"],
	// 			'book_image' => $book_image,
	// 			'book_description' => $post["book_desc"],
	// 			'date_added' => date("Y-m-d"),
	// 			'training_status' => 0,
	// 		);
	// 	// } else {
	// 	// 	$this->session->set_userdata('swal', 'Failed to upload files.');
	// 	// 	redirect(base_url("training_materials"));
	// 	// }

	// 	$this->MY_Model->insert('bpmhsl_training_materials', $submit_training);
	// 	$this->session->set_userdata('swal', 'Training Material added successfully.');
	// 	redirect(base_url("training_materials"));
	// }


	public function add_training_materials()
	{
		$post = $this->input->post();

		$files_path = 'assets/uploads/files/';

		$book_image  = $_FILES['book_image']['name'];
		$book_file  = $_FILES['book_file']['name'];

		$tmp_name1 = $_FILES['book_image']['tmp_name'];
		$name1 = $_FILES['book_image']['name'];
		move_uploaded_file($tmp_name1, $files_path . time() . '_' . $name1);
		$book_image = time() . '_' . $book_image;

		$all_files = array();
		for ($i = 0; $i < count($book_file); $i++) {
			array_push($all_files, $book_file[$i]);
		}
		$selected_files = implode(", ", $all_files);
		// echo '<pre>';
		// print_r($selected_files);
		//  exit;

		// if(move_uploaded_file($selected_files, $files_path)){
		$submit_training = array(
			'files' => $selected_files,
			'book_name' => $post["book_name"],
			'subscription_price' => $post["subs_price"],
			'book_image' => $book_image,
			'book_description' => $post["book_desc"],
			'date_added' => date("Y-m-d"),
			'training_status' => 0,
		);
		// } else {
		// 	$this->session->set_userdata('swal', 'Failed to upload files.');
		// 	redirect(base_url("training_materials"));
		// }

		$this->MY_Model->insert('bpmhsl_training_materials', $submit_training);
		$this->session->set_userdata('swal', 'Training Material added successfully.');
		redirect(base_url("training_materials"));
	}

	public function get_training_materials()
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
			1 => 'training_id',
			2 => 'book_name',
			3 => 'date_added',
			4 => 'training_status',
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

		$training_m = $this->db
		->select('*')
		->from('bpmhsl_training_materials')
		->get();

		$data = array();

		// foreach ($data as $row) {
		// 	$temparray = explode('/', $row);
		// 	$temparray[1] = 20;
		// 	$haha = implode('/', $temparray);
		// 	echo '<input type="text" value=' . $haha . '>';
		// }
		
		foreach ($training_m->result() as $tm) {
			// $img = explode(",", $tm->files);
			
			$action_btn = "";
			$action_btn .= "<a class='btn btn-xs view-training' training-id=" . $tm->training_id . " data-toggle='tooltip' data-placement='bottom' title='View' href=''><i class='fa fa-eye'></i></a>";
			$action_btn .= "<a class='btn btn-xs edit-training' training-id=" . $tm->training_id . " data-sid='' file=".$tm->files." data-toggle='tooltip' data-placement='bottom' title='Update' href='#'><i class='fa fa-edit'></i></a>";
			if ($tm->training_status == 0) {
				$tm->training_status = "<span class='badge badge-pill badge-success'>Activated</span>";
				$action_btn .= "<a class='btn btn-xs trash-training' data-toggle='tooltip' data-placement='bottom' title='Deactivate Training Material' href=" . base_url('training_materials/deactivate_material/' . $tm->training_id) . "><i class='fa fa-lock'></i></a>";
			}else{
				$tm->training_status = "<span class='badge badge-pill badge-danger'>Deactivated</span>";
				$action_btn .= "<a class='btn btn-xs trash-training' data-toggle='tooltip' data-placement='bottom' title='Activate Training Material' href=" . base_url('training_materials/activate_material/' . $tm->training_id) . "><i class='fa fa-unlock'></i></a>";
			}

			
			// foreach ($img as $row) :
			// 	$temparray = explode(',', $row);
			// 	// $temparray[1] = 20;
			// 	$haha = implode(',', $temparray);
			// 	// echo '<input type="text" value=' . $haha . '>';
			// endforeach;
			

			$data[] = array(
				$tm->training_id,
				$tm->book_name,
				'$' . $tm->subscription_price,
				$tm->date_added,
				// $img,
				$tm->training_status,
				$action_btn
			);

		}
		

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $training_m->num_rows(),
			"recordsFiltered" => $training_m->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	//////////////////////////////////////////////////////////
	//User > Subscription
	public function subs_training_materials()
	{
		$fk_user_id = $this->session->userdata('user_details')[0]['user_id'];

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

		if ($dir != "asc" && $dir != "desc"
		) {
			$dir = "desc";
		}

		$valid_columns = array(
			1 => 'training_id',
			2 => 'book_name',
			3 => 'date_added',
			4 => 'training_status',
		);

		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null
		) {
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

		$subs_training = $this->db
			->select('*')
			->from('bpmhsl_training_materials')
			->where('training_status', 0)
			->get();
		

		$data = array();

		foreach ($subs_training->result() as $subs) {
			$check_subs = $this->db ->select('*')->where('fk_training_id', $subs->training_id)->where('fk_user_id', $fk_user_id)->from('bpmhsl_subscription')->get()->result();

			$action_btn = "";
			if(empty($check_subs)){
				$action_btn .= "<a class='btn btn-xs pay-training' training-id=" . $subs->training_id . " data-toggle='tooltip' data-placement='bottom' title='Pay Now' href='#'>Pay Now</a>";
			}

			if ($subs->training_status == 0) {
				$subs->training_status = "<span class='badge badge-pill badge-success'>Activated</span>";
			} else {
				$subs->training_status = "<span class='badge badge-pill badge-danger'>Deactivated</span>";
			}

			if (empty($check_subs)) {
			$data[] = array(
				$subs->training_id,
				$subs->book_name,
				'$' . $subs->subscription_price,
				$subs->date_added,
				$subs->training_status,
				$action_btn
			);
			}
		}


		$output = array(
			"draw" => $draw,
			"recordsTotal" => $subs_training->num_rows(),
			"recordsFiltered" => $subs_training->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	// User > Paid Training Materials Datatable
		public function paid_training_materials()
	{
		$fk_user_id = $this->session->userdata('user_details')[0]['user_id'];
		
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

		if ($dir != "asc" && $dir != "desc"
		) {
			$dir = "desc";
		}

		$valid_columns = array(
			1 => 'training_id',
			2 => 'book_name',
			3 => 'date_added',
			4 => 'training_status',
		);

		if (!isset($valid_columns[$col])) {
			$order = null;
		} else {
			$order = $valid_columns[$col];
		}
		if ($order != null
		) {
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

		$training_materials = $this->db
			->select('*')
			->from('bpmhsl_subscription')
			->where('fk_user_id', $fk_user_id)
			->where('subscription_status', 1)
			->join('bpmhsl_training_materials', 'bpmhsl_training_materials.training_id = bpmhsl_subscription.fk_training_id')
			->get();
		

		$data = array();

		foreach ($training_materials->result() as $tm) {

			$action_btn = "";
				$action_btn .= "<a class='btn btn-xs btn-danger view-trainingmaterials' training-id=" . $tm->training_id . " data-toggle='tooltip' data-placement='bottom' title='View Training Materials' href='#'>View Traing Materials</a>";
			if ($tm->subscription_status == 1) {
				$tm->subscription_status = "<span class='badge badge-pill badge-success'>Subscribed</span>";
			} else {
				// $tm->training_status = "<span class='badge badge-pill badge-danger'>Expired</span>";
			}
			$data[] = array(
				$tm->subscription_id,
				$tm->book_name,
				'$' . $tm->subscription_price,
				$tm->subscribed_date,
				$tm->subscription_status,
				$action_btn
			);
		}


		$output = array(
			"draw" => $draw,
			"recordsTotal" => $training_materials->num_rows(),
			"recordsFiltered" => $training_materials->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
}
