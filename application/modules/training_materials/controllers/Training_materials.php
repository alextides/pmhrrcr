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
		$this->load_page2('training_materials', $data, "tm_footer.php", "tm_header.php");
	}

	public function get_training($id = '')
	{
		$result = $this->db
		->select('*')
		->from('bpmhsl_training_materials')
		->where('training_id', $id)
		->get()
		->result_array();
		echo json_encode($result);
		exit();
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

	function dataready($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
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

		foreach ($training_m->result() as $tm) {
			$action_btn = "";
			$action_btn .= "<a class='btn btn-xs view-training' training-id=".$tm->training_id." data-toggle='tooltip' data-placement='bottom' title='View' href=''><i class='fa fa-eye'></i></a>";
			$action_btn .= "<a class='btn btn-xs edit-training' training-id=".$tm->training_id." data-toggle='tooltip' data-placement='bottom' title='Update' href=''><i class='fa fa-edit'></i></a>";
			$action_btn .= "<a class='btn btn-xs trash-training' data-toggle='tooltip' data-placement='bottom' title='Deactivate' href=''><i class='fa fa-unlock'></i></a>";

			$data[] = array(
				$tm->training_id,
				$tm->book_name,
				'$'.$tm->subscription_price,
				$tm->date_added,
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
}
