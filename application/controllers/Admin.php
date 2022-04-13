<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {

			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['subtitle'] = "Home";
		$data['user'] = $this->mu->getUser();
		$this->t->load('admin/template', 'admin/home', $data);
	}
	
	public function blog()
	{
		$data['title'] = "Blog";
		$data['subtitle'] = "List Blog";
		$data['user'] = $this->mu->getUser();
		$data['blog'] = $this->db->order_by('id', 'desc')->get('blog')->result_array();
		$this->t->load('admin/template', 'admin/blog', $data);
	}

	public function add_blog()
	{
		$config['upload_path']          = './assets/blog/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			// $data['error'] = array('error' => $this->upload->display_errors());
			$data['title'] = "Blog";
			$data['subtitle'] = "Add New Blog";
			$data['user'] = $this->mu->getUser();
			$this->t->load('admin/template', 'admin/add-blog', $data);
		} else {
			$_data = array('upload_data' => $this->upload->data());
			
			$data = array(
				'title' => $this->input->post('title'),
				'desc' => $this->input->post('desc'),
				'content' => $this->input->post('content'),
				'image' => $_data['upload_data']['file_name'],
				'date_created' => time(),
				'slug' => url_title($this->input->post('title'), 'dash', true)
			);
			$query = $this->db->insert('blog', $data);
			if ($query) {
				echo 'berhasil di upload';
				redirect('admin/blog');
			} else {
				echo 'gagal upload';
			}
		}
	}
	public function update_blog($id, $slug)
	{
		$data['title'] = "Blog";
		$data['subtitle'] = "Update Blog";
		$data['user'] = $this->mu->getUser();
		$data['sb'] = $this->db->query("SELECT * FROM blog WHERE id = $id AND slug = '$slug'")->row_array();
		$this->t->load('admin/template', 'admin/edit-blog', $data);
	}
	public function edit_blog()
	{
		$id = $this->input->post('id');
		$_image = $this->db->get_where('blog', ['id' => $id])->row();
		$config['upload_path']          = './assets/blog/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$data = array(
				'title' => $this->input->post('title'),
				'desc' => $this->input->post('desc'),
				'content' => $this->input->post('content'),
				'date_created' => time(),
				'slug' => url_title($this->input->post('title'), 'dash', true)
			);
			$query = $this->db->update('blog', $data, array('id' => $id));
			redirect('admin/blog');
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'title' => $this->input->post('title'),
				'desc' => $this->input->post('desc'),
				'content' => $this->input->post('content'),
				'image' => $_data['upload_data']['file_name'],
				'date_created' => time(),
				'slug' => url_title($this->input->post('title'), 'dash', true)
			);
			$query = $this->db->update('blog', $data, array('id' => $id));
			if ($query) {
				unlink("assets/blog/" . $_image->image);
			}
			redirect('admin/blog');
		}
	}
	public function delete_blog($id)
	{
		$_id = $this->db->get_where('blog', ['id' => $id])->row();
		$query = $this->db->delete('blog', ['id' => $id]);
		if ($query) {
			unlink("assets/blog/" . $_id->image);
		}
		redirect('admin/blog');
	}

	public function photo()
	{
		$data['title'] = "Gallery";
		$data['subtitle'] = "Photo";
		$data['user'] = $this->mu->getUser();
		$data['photo'] = $this->db->order_by('id', 'desc')->get('gallery_photo')->result_array();
		$this->t->load('admin/template', 'admin/photo', $data);
	}

	public function video()
	{
		$data['title'] = "Gallery";
		$data['subtitle'] = "Video";
		$data['user'] = $this->mu->getUser();
		$data['video'] = $this->db->order_by('id', 'desc')->get('gallery_video')->result_array();
		$this->t->load('admin/template', 'admin/video', $data);
	}

	public function product()
	{
		$data['title'] = "Products";
		$data['subtitle'] = "List Product";
		$data['user'] = $this->mu->getUser();
		$data['product'] = $this->db->query("SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu ORDER BY id_product DESC")->result_array();
		$this->t->load('admin/template', 'admin/product', $data);
	}

	public function add_photo()
	{
		$config['upload_path']          = './assets/photo/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			// $data['error'] = array('error' => $this->upload->display_errors());
			$data['title'] = "Gallery";
			$data['subtitle'] = "Add Photo";
			$data['user'] = $this->mu->getUser();
			$this->t->load('admin/template', 'admin/add-photo', $data);
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'image' => $_data['upload_data']['file_name'],
				'desc' => $this->input->post('desc'),
				'date_created' => time(),
			);
			$query = $this->db->insert('gallery_photo', $data);
			if ($query) {
				echo 'berhasil di upload';
				redirect('admin/photo');
			} else {
				echo 'gagal upload';
			}
		}
	}

	public function add_video()
	{
		$config['upload_path']          = './assets/video/';
		$config['allowed_types']        = 'mp4';
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('video')) {
			// $data['error'] = array('error' => $this->upload->display_errors());
			$data['title'] = "Gallery";
			$data['subtitle'] = "Add Video";
			$data['user'] = $this->mu->getUser();
			$this->t->load('admin/template', 'admin/add-video', $data);
		} else {
			$image = explode("data:image/png;base64,", $this->input->post('tmb-video'));

			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'video' => $_data['upload_data']['file_name'],
				'thumbnail' => base64_decode($image[1]),
				'desc' => $this->input->post('desc'),
				'date_created' => time(),
			);
			$query = $this->db->insert('gallery_video', $data);
			if ($query) {
				echo 'berhasil di upload';
				redirect('admin/video');
			} else {
				echo 'gagal upload';
			}
		}
	}

	public function add_product()
	{
		$config['upload_path']          = './assets/product/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			// $data['error'] = array('error' => $this->upload->display_errors());
			$data['title'] = "Product";
			$data['subtitle'] = "Add New Product";
			$data['user'] = $this->mu->getUser();
			$data['menu'] = $this->db->get('menu')->result_array();
			$this->t->load('admin/template', 'admin/add-product', $data);
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'title' => $this->input->post('title'),
				'id_category' => $this->input->post('category'),
				'image' => $_data['upload_data']['file_name'],
				'content' => $this->input->post('content'),
				'slug' => url_title($this->input->post('title'), 'dash', true),
				'date_created' => time(),
				'is_active' => $this->input->post('is_active'),
			);
			$query = $this->db->insert('product', $data);
			if ($query) {
				
				// echo 'berhasil di upload';
				redirect('admin/product');
			} else {
				echo 'gagal upload';
			}
		}
	}


	public function update_photo($id)
	{
		$data['title'] = "Gallery";
		$data['subtitle'] = "Update Photo";
		$data['user'] = $this->mu->getUser();
		$data['sb'] = $this->db->query("SELECT * FROM gallery_photo WHERE id = $id")->row_array();
		$this->t->load('admin/template', 'admin/edit-photo', $data);
	}

	public function update_video($id)
	{
		$data['title'] = "Gallery";
		$data['subtitle'] = "Update Video";
		$data['user'] = $this->mu->getUser();
		$data['video'] = $this->db->query("SELECT * FROM gallery_video WHERE id = $id")->row_array();
		$this->t->load('admin/template', 'admin/edit-video', $data);
	}

	public function edit_video($id)
	{
		$data = array(
			'desc' => $this->input->post('desc'),
			'date_created' => time(),
		);
		$query = $this->db->update('gallery_video', $data, array('id' => $id));;
		if ($query) {
			redirect('admin/video');
		} else {
			redirect('admin/video?res=failed');
		}
	}

	public function edit_photo()
	{
		$id = $this->input->post('id');
		$_image = $this->db->get_where('gallery_photo', ['id' => $id])->row();
		$config['upload_path']          = './assets/photo/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$data = array(
				'desc' => $this->input->post('desc'),
				'date_created' => time(),
			);
			$query = $this->db->update('gallery_photo', $data, array('id' => $id));
			redirect('admin/photo');
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'image' => $_data['upload_data']['file_name'],
				'desc' => $this->input->post('desc'),
				'date_created' => time(),
			);
			$query = $this->db->update('gallery_photo', $data, array('id' => $id));
			if ($query) {
				unlink("assets/photo/" . $_image->image);
			}
			redirect('admin/photo');
		}
	}
	public function update_product($id, $slug)
	{
		$data['title'] = "Product";
		$data['subtitle'] = "Update Product";
		$data['user'] = $this->mu->getUser();
		$data['sb'] = $this->db->query("SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu WHERE id_product = $id AND category.slug = '$slug' ORDER BY id_product DESC")->row_array();
		$this->t->load('admin/template', 'admin/edit-product', $data);
	}
	public function edit_product()
	{
		$id = $this->input->post('id');
		$_image = $this->db->get_where('product', ['id_product' => $id])->row();
		$config['upload_path']          = './assets/product/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$data = array(
				'title' => $this->input->post('title'),
				'id_category' => $this->input->post('category'),
				'image' => $this->input->post('old_image'),
				'content' => $this->input->post('content'),
				'slug' => url_title($this->input->post('title'), 'dash', true),
				'date_created' => time(),
				'is_active' => $this->input->post('is_active'),
			);
			// var_dump($data);
			// die;
			$query = $this->db->update('product', $data, array('id_product' => $id));
			redirect('admin/product');

		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'title' => $this->input->post('title'),
				'id_category' => $this->input->post('category'),
				'image' => $_data['upload_data']['file_name'],
				'content' => $this->input->post('content'),
				'slug' => url_title($this->input->post('title'), 'dash', true),
				'date_created' => time(),
				'is_active' => $this->input->post('is_active'),
			);
			$query = $this->db->update('product', $data, array('id_product' => $id));
			if ($query) {
				unlink("assets/product/" . $_image->image);
			}
			redirect('admin/product');
		}
	}
	public function delete_photo($id)
	{
		$_id = $this->db->get_where('gallery_photo', ['id' => $id])->row();
		$query = $this->db->delete('gallery_photo', ['id' => $id]);
		if ($query) {
			unlink("assets/photo/" . $_id->image);
		}
		redirect('admin/photo');
	}

	public function delete_video($id)
	{
		$_id = $this->db->get_where('gallery_video', ['id' => $id])->row();
		$query = $this->db->delete('gallery_video', ['id' => $id]);
		if ($query) {
			unlink("assets/video/" . $_id->video);
		}
		redirect('admin/video');
	}
	public function delete_product($id)
	{
		$_id = $this->db->get_where('product', ['id_product' => $id])->row();
		$query = $this->db->delete('product', ['id_product' => $id]);
		if ($query) {
			unlink("assets/product/" . $_id->image);
		}
		redirect('admin/product');
	}

	public function selected_category()
	{
		$menuId = $_POST["menuId"];
		$category = $this->input->post('category');
		if($menuId !== ""){
			if($category !== ""){
				$query = $this->db->query("SELECT * FROM category WHERE id_menu = '$menuId' ")->result_array();
				$output = '<option value="">--Pilih SubCategory--</option>';
				foreach($query as $row){
					if($row['id_category'] == $category){
						$selected = "selected";
					}else{
						$selected = "";
					}
					$output .= '<option '.$selected.' value="'.$row['id_category'].'">'.$row["category"].'</option>';
				}
			}else{
				$query = $this->db->query("SELECT * FROM category WHERE id_menu = '$menuId' ")->result_array();
				$output = '<option value="">--Pilih SubCategory--</option>';
				foreach($query as $row){
					$output .= '<option value="'.$row['id_category'].'">'.$row["category"].'</option>';
				}
			}
		}else{
			$output = '<option value="">--Tolong pilih data--</option>';
		}
		echo  $output;
	}
	public function selected_menu()
	{
		$id = $this->input->get("id");
		if($id !== ""){
			$query = $this->db->query("SELECT * FROM menu")->result_array();
			$output = '<option value="">--Pilih Category--</option>';
			foreach($query as $m){
				if($m['id_menu'] == $id){
					$selected = "selected";
				}else{
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'.$m['id_menu'].'">'.$m['name'].'</option>';
			}
			echo $output;
		}else {
			$query = $this->db->query("SELECT * FROM menu")->result_array();
			$output = '<option value="">--Pilih Category--</option>';
			foreach($query as $m){
				$output .= '<option value="'.$m['id_menu'].'">'.$m['name'].'</option>';
			}
			echo $output;
		}
	}
	public function change_password()
	{
		$data['title'] = 'Settings';
            $data['user'] = $this->mu->getUser();
			$data['subtitle'] = "User";
            $this->t->load('admin/template','admin/change-user',$data);
	}
	public function change($id)
    {
        $data = [
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
        ];
        $this->db->where('id', $id);
        
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div role="alert" class="alert alert-success">Password berhasil di ganti harap login kembali !</div>');
        $this->session->unset_userdata('username');
        
        redirect('auth');
        
    }
	public function akun()
	{
		$data['title'] = 'Settings';
		$data['subtitle'] = 'Akun';
		$data['user'] = $this->mu->getUser();
		$this->t->load('admin/template','admin/akun',$data);
	}
	public function update_akun($id)
	{
		$data = [
            'name' => $this->input->post('name'),
			'username' => $this->input->post('username')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div role="alert" class="alert alert-success">Data berhasil di ganti harap login kembali !</div>');
		$this->session->unset_userdata('username');
		redirect('admin/akun');
	}
	public function notice()
	{
		$data['title'] = 'Notice';
		$data['subtitle'] = 'Edit';
		$data['user'] = $this->mu->getUser();
		$data['notice'] = $this->db->get('notice')->row_array();
		$this->t->load('admin/template','admin/notice',$data);
	}
	public function update_notice($id)
	{
		$data = [
			'notice' => $this->input->post('notice')
		];
		$this->db->where('id', $id);
		$this->db->update('notice', $data);
		$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success">Data berhasil di edit !</div>');
		redirect('admin/notice');
	}
	public function description()
	{
		$data['title'] = 'Description';
		$data['subtitle'] = 'Edit';
		$data['user'] = $this->mu->getUser();
		$data['description'] = $this->db->get('description')->row_array();
		$this->t->load('admin/template','admin/description',$data);
	}
	public function update_description($id)
	{
		$data = [
			'desc' => $this->input->post('description')
		];
		$this->db->where('id', $id);
		$this->db->update('description', $data);
		$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success">Data berhasil di edit !</div>');
		redirect('admin/description');
	}
	public function banner()
	{
		$data['title'] = 'Banner';
		$data['subtitle'] = 'Edit';
		$data['user'] = $this->mu->getUser();
		$data['banner'] = $this->db->get('banner')->row_array();
		$this->t->load('admin/template','admin/banner',$data);
	}
	public function update_banner($id)
	{
		$_image = $this->db->get_where('banner', ['id' => $id])->row();
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			echo 'Upload gagal';
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'image' => $_data['upload_data']['file_name'],
			);
			$query = $this->db->update('banner', $data, array('id' => $id));
			if ($query) {
				unlink("assets/img/" . $_image->image);
			}
			$this->session->set_flashdata('message', '<div role="alert" class="alert alert-success">Data berhasil di edit !</div>');
			redirect('admin/banner');
		}
	}
	public function support()
	{
		$data['title'] = "Supported By";
		$data['subtitle'] = "Logo";
		$data['user'] = $this->mu->getUser();
		$data['support'] = $this->db->order_by('id', 'desc')->get('support')->result_array();
		$this->t->load('admin/template', 'admin/support', $data);
	}
	public function delete_support($id)
	{
		$_id = $this->db->get_where('support', ['id' => $id])->row();
		$query = $this->db->delete('support', ['id' => $id]);
		if ($query) {
			unlink("assets/img/supported/" . $_id->image);
		}
		redirect('admin/support');
	}
	public function update_support($id)
	{
		$data['title'] = "Supported By";
		$data['subtitle'] = "Update Logo";
		$data['user'] = $this->mu->getUser();
		$data['sb'] = $this->db->query("SELECT * FROM support WHERE id = $id")->row_array();
		$this->t->load('admin/template', 'admin/edit-support', $data);
	}
	public function edit_support()
	{
		$id = $this->input->post('id');
		$_image = $this->db->get_where('support', ['id' => $id])->row();
		$config['upload_path']          = './assets/img/supported/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			echo 'Upload Gagal !';
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'image' => $_data['upload_data']['file_name'],
			);
			$query = $this->db->update('support', $data, array('id' => $id));
			if ($query) {
				unlink("assets/img/supported/" . $_image->image);
			}
			redirect('admin/support');
		}
	}
	public function carousel()
	{
		$data['title'] = "Carousel";
		$data['subtitle'] = "Image";
		$data['user'] = $this->mu->getUser();
		$data['carousel'] = $this->db->order_by('id', 'desc')->get('carousel')->result_array();
		$this->t->load('admin/template', 'admin/carousel', $data);
	}
	public function add_carousel()
	{
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			// $data['error'] = array('error' => $this->upload->display_errors());
			$data['title'] = "Carousel";
			$data['subtitle'] = "Add Carousel";
			$data['user'] = $this->mu->getUser();
			$this->t->load('admin/template', 'admin/add-Carousel', $data);
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'image' => $_data['upload_data']['file_name'],
			);
			$query = $this->db->insert('carousel', $data);
			if ($query) {
				echo 'berhasil di upload';
				redirect('admin/carousel');
			} else {
				echo 'gagal upload';
			}
		}
	}
	public function delete_carousel($id)
	{
		$_id = $this->db->get_where('carousel', ['id' => $id])->row();
		$query = $this->db->delete('carousel', ['id' => $id]);
		if ($query) {
			unlink("assets/img/" . $_id->image);
		}
		redirect('admin/carousel');
	}
	public function update_carousel($id)
	{
		$data['title'] = "Carousel";
		$data['subtitle'] = "Update Image";
		$data['user'] = $this->mu->getUser();
		$data['sb'] = $this->db->query("SELECT * FROM carousel WHERE id = $id")->row_array();
		$this->t->load('admin/template', 'admin/edit-carousel', $data);
	}
	public function edit_carousel()
	{
		$id = $this->input->post('id');
		$_image = $this->db->get_where('carousel', ['id' => $id])->row();
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			echo 'Upload Gagal !';
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'image' => $_data['upload_data']['file_name'],
			);
			$query = $this->db->update('carousel', $data, array('id' => $id));
			if ($query) {
				unlink("assets/img/" . $_image->image);
			}
			redirect('admin/carousel');
		}
	}
	public function internship()
	{
		$data['title'] = "Internship";
		$data['subtitle'] = "List internship";
		$data['user'] = $this->mu->getUser();
		$data['internship'] = $this->db->order_by('id', 'desc')->get('internship')->result_array();
		$this->t->load('admin/template', 'admin/internship', $data);
	}

	public function add_internship()
	{
		$config['upload_path']          = './assets/internship/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			// $data['error'] = array('error' => $this->upload->display_errors());
			$data['title'] = "Internship";
			$data['subtitle'] = "Add New Internship";
			$data['user'] = $this->mu->getUser();
			$this->t->load('admin/template', 'admin/add-internship', $data);
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'title' => $this->input->post('title'),
				'desc' => $this->input->post('desc'),
				'content' => $this->input->post('content'),
				'image' => $_data['upload_data']['file_name'],
				'date_created' => time(),
				'slug' => url_title($this->input->post('title'), 'dash', true)
			);
			$query = $this->db->insert('internship', $data);
			if ($query) {
				echo 'berhasil di upload';
				redirect('admin/internship');
			} else {
				echo 'gagal upload';
			}
		}
	}
	public function update_internship($id, $slug)
	{
		$data['title'] = "Internship";
		$data['subtitle'] = "Update Internship";
		$data['user'] = $this->mu->getUser();
		$data['sb'] = $this->db->query("SELECT * FROM internship WHERE id = $id AND slug = '$slug'")->row_array();
		$this->t->load('admin/template', 'admin/edit-internship', $data);
	}
	public function edit_internship()
	{
		$id = $this->input->post('id');
		$_image = $this->db->get_where('internship', ['id' => $id])->row();
		$config['upload_path']          = './assets/internship/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 0;
		$config['max_width']            = 0;
		$config['max_height']           = 0;
		$config['encrypt_name'] 		= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			$data = array(
				'title' => $this->input->post('title'),
				'desc' => $this->input->post('desc'),
				'content' => $this->input->post('content'),
				'date_created' => time(),
				'slug' => url_title($this->input->post('title'), 'dash', true)
			);
			$query = $this->db->update('internship', $data, array('id' => $id));
			redirect('admin/internship');
		} else {
			$_data = array('upload_data' => $this->upload->data());
			$data = array(
				'title' => $this->input->post('title'),
				'desc' => $this->input->post('desc'),
				'content' => $this->input->post('content'),
				'image' => $_data['upload_data']['file_name'],
				'date_created' => time(),
				'slug' => url_title($this->input->post('title'), 'dash', true)
			);
			$query = $this->db->update('internship', $data, array('id' => $id));
			if ($query) {
				unlink("assets/internship/" . $_image->image);
			}
			redirect('admin/internship');
		}
	}
	public function delete_internship($id)
	{
		$_id = $this->db->get_where('internship', ['id' => $id])->row();
		$query = $this->db->delete('internship', ['id' => $id]);
		if ($query) {
			unlink("assets/internship/" . $_id->image);
		}
		redirect('admin/internship');
	}
}

/* End of file Admin.php */
