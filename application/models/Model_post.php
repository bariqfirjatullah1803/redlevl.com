<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_post extends CI_Model
{

	function insert_post($title, $contents,$db,$desc,$slug,$image)
	{
		$data = array(
			'title'    => $title,
			'content' => $contents,
			'desc' => $desc,
			'date_created' => time(),
			'slug' => $slug,
			'image' => $image
		);
		$this->db->insert($db, $data);
	}

	function get_article_by_id($id)
	{
		$query = $this->db->get_where('blog', array('id' =>  $id));
		return $query;
	}
}
                        
/* End of file Model_post.php */
