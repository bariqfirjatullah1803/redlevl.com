
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function getUser()
    {
        return $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
    }

}

/* End of file model_user.php */
