<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('auth/login', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cocok database
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username salah atau tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
    
	public function change_user()
    {
        $id = $this->input->post('id');
        // $this->form_validation->set_rules('username', 'Username', 'trim|required|');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Settings';
            $data['user'] = $this->mu->getUser();
			$data['subtitle'] = "User";
            $this->t->load('admin/template','admin/change-user',$data);
        } else {
           $data = [
			//    'username' => $this->input->post('username'),
               'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
           ];
		   var_dump($data);
		   die;
		   $this->db->where('id', $id);
           $this->db->update('user', $data);
		   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah di ganti silahkan login!</div>');
		//    $this->logout();
		   redirect('auth/change_user');
        }
        
    }
}
        
    /* End of file  Auth.php */
        
                            