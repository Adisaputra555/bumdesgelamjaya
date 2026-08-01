<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }
    public function index()
    {
        $this->load->view('template/header',$data = ['title' => 'Login | Aplikasi BUMDes']);
        $this->load->view('auth/login');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Username dan Password wajib diisi!');
            redirect('auth');
        }

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->Auth_model->check_login($username);

        if ($user) {
            if (password_verify($password, $user->password)) {
                // Setup session data for logged-in user
                $session_data = [
                    'logged_in' => true,
                    'user_id'   => $user->id,
                    'username'  => $user->username,
                    'role'      => $user->role
                ];
                $this->session->set_userdata($session_data);

                // Redirect semua pengguna ke dashboard
                redirect('dashboard'); // Semua pengguna diarahkan ke dashboard
            } else {
                $this->session->set_flashdata('error', 'Password salah!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Username tidak ditemukan!');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        if ( $this->form_validation->run() == false) {
            $this->load->view('template/header', $data = ['title' => 'Register | Aplikasi BUMDes']);
            $this->load->view('auth/register');
            $this->load->view('template/footer');
        } else {
            $data = [
                'username'  => $this->input->post('username', TRUE),
                'email'  => $this->input->post('email', TRUE),
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'      => 'user'
            ];
            if ($this->Auth_model->insert_user($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil!');
                redirect('auth');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi.');
                redirect('auth/register');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_message', 'You have been logged out.');
        redirect('auth/login');
    }
}