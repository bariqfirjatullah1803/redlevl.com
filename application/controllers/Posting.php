<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Posting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {

			redirect('auth');
		}
		$this->load->library('upload');
	}
	public function index($db)
	{
		$data['title'] = "Posting";
		$data['subtitle'] = '<div style="text-transform:capitalize">' . $db . '</div>';
		$data['db'] = $db;
		$data['user'] = $this->mu->getUser();
		$this->t->load('admin/template', 'admin/test', $data);
	}
	public function save()
	{
		$config['upload_path']          = './assets/internship/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$data['error'] = array('error' => $this->upload->display_errors());
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$title = $this->input->post('title');
			$desc = $this->input->post('desc');
			$contents = $this->input->post('content');
			$slug = url_title($this->input->post('title'), 'dash', true);
			$db = $this->input->post('db');
			$image = $_data['upload_data']['file_name'];
			$this->mp->insert_post($title, $contents, $db, $desc, $slug,$image);
			redirect('admin/' . $db);
		}

		// $id = $this->db->insert_id();
		// $result = $this->mp->get_article_by_id($id)->row_array();
		// $data['title'] = $result['title'];
		// $data['subtitle'] = $result['title'];
		// $data['contents'] = $result['content'];
		// $data['user'] = $this->mu->getUser();
		// $this->t->load('admin/template', 'admin/test-view', $data);
		
	}
	//Upload image summernote
	function upload_image()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = './assets/blog/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/blog/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = './assets/blog/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'assets/blog/' . $data['file_name'];
			}
		}
	}

	//Delete image summernote
	function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}
}
        
    /* End of file  Posting.php */
