<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_slug extends CI_Model
{

	public function get_blog($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->query("SELECT * FROM blog ORDER BY title ASC");
			return $query->result_array();
		}

		$query = $this->db->query("SELECT * FROM blog WHERE slug = '$slug'");
		return $query->row_array();
	}
	public function get_internship($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->query("SELECT * FROM internship ORDER BY title ASC");
			return $query->result_array();
		}

		$query = $this->db->query("SELECT * FROM internship WHERE slug = '$slug'");
		return $query->row_array();
	}

	public function get_product($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->query("SELECT *,product.slug as p_slug FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu");
			return $query->result_array();
		}
	
		$query = $this->db->query("SELECT *,product.slug as p_slug FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu WHERE category.slug = '$slug'");
		return $query->result_array();
	}
	public function get_product_view($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->query("SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu");
			return $query->result_array();
		}
	
		$query = $this->db->query("SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category INNER JOIN menu ON category.id_menu = menu.id_menu WHERE product.slug = '$slug'");
		return $query->row_array();
	}
}

/* End of file Model_slug.php */
