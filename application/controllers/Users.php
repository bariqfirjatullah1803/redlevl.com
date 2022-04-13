<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Model_slug');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['product'] = $this->db->query("SELECT *,product.slug as p_slug FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu WHERE product.is_active = 1 ORDER BY id_product DESC")->result_array();
		$data['banner'] = $this->db->get('banner')->row_array();
		$data['description'] = $this->db->get('description')->row_array();
		$data['carousel'] = $this->db->get('carousel')->result_array();
		$data['support'] = $this->db->get('support')->result_array();

		$this->t->load('users/template', 'users/home', $data);
	}
	public function gallery_video()
	{
		$data['title'] = 'Gallery Video';
		$data['video'] = $this->db->order_by('id', 'desc')->get('gallery_video')->result_array();
		$this->t->load('users/template', 'users/gallery-video', $data);
	}
	public function gallery_image()
	{
		$data['title'] = 'Gallery Photo';
		$data['photo'] = $this->db->order_by('id', 'desc')->get('gallery_photo')->result_array();
		$this->t->load('users/template', 'users/gallery-image', $data);
	}
	public function blog()
	{
		$data['title'] = 'Blog';
		$data['blog'] = $this->Model_slug->get_blog();
		$this->t->load('users/template', 'users/blog', $data);
	}
	public function blog_view($slug = NULL)
	{
		$data['blog'] = $this->Model_slug->get_blog($slug);
		if (empty($data['blog'])) {
			$this->load->view('404');
		}else{
			$data['title'] = 'Blog';
			$this->t->load('users/template', 'users/single-blog', $data);
		}
	}
	public function product_view($slug = NULL)
	{
		$data['product'] = $this->Model_slug->get_product_view($slug);
		if (empty($data['product'])) {
			$this->load->view('404');
		}else{
			$data['title'] = 'Product';
			$this->t->load('users/template', 'users/single-product', $data);
		}
	}
	public function product($slug = NULL)
	{
		$data['product'] = $this->Model_slug->get_product($slug);
		if (empty($data['product'])) {
			$this->load->view('404');
		}else{
			$data['title'] = 'Product';
			$data['category'] = $this->db->query("SELECT * FROM category WHERE slug = '$slug'")->row_array();
			$this->t->load('users/template', 'users/product', $data);
		}
	}
	function search()
	{
		$data['title'] = 'Search Result';
		$k = $this->input->get('keyword');
		$data['product'] = $this->db->query("SELECT *,product.slug as p_slug FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu WHERE title LIKE '%$k%' ORDER BY id_product DESC")->result_array();
		$data['blog'] = $this->db->query("SELECT * FROM blog WHERE title LIKE '%$k%' ")->result_array();
		$data['internship'] = $this->db->query("SELECT * FROM internship WHERE title LIKE '%$k%' ")->result_array();
		$this->t->load('users/template', 'users/result', $data);
	}
	public function internship()
	{
		$data['title'] = 'Internship';
		$data['internship'] = $this->Model_slug->get_internship();
		$this->t->load('users/template', 'users/internship', $data);
	}
	public function internship_view($slug = NULL)
	{
		$data['internship'] = $this->Model_slug->get_internship($slug);
		if (empty($data['internship'])) {
			$this->load->view('404');
		}else{
			$data['title'] = 'Internship';
			$this->t->load('users/template', 'users/single-internship', $data);
		}
	}
}

/* End of file Users.php */
