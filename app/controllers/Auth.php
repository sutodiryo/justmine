<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->model('Auth_model');
	}

	function index()
	{
		$this->load->view('front/login');
	}

	function forgot_password()
	{
		$this->load->view('front/forgot');
	}

	public function login()
	{
		$username 	= $this->security->xss_clean($this->input->post('username'));
		$password 	= md5($this->security->xss_clean($this->input->post('password')));

		$member     = $this->db->query("SELECT * FROM member WHERE password = '" . $password . "' AND (username= '" . $username . "' OR email = '" . $username . "')");
		$member_cek	= $member->num_rows();
		$member_row	= $member->row();

		$admin		= $this->db->query("SELECT * FROM admin WHERE password = '" . $password . "' AND (username = '" . $username . "' OR email = '" . $username . "')");
		$admin_cek	= $admin->num_rows();
		$admin_row	= $admin->row();

		if ($member_cek == 1) {
			$data_login = array(
				'log_id'        => $member_row->id_member,
				'log_user'      => $member_row->username,
				'log_name'      => $member_row->nama,
				'log_email'  	=> $member_row->email,
				'log_status'    => $member_row->status,
				'log_level'    	=> $member_row->level,
				'log_admin'    	=> false,
				'log_valid'     => true
			);

			$this->session->set_userdata($data_login);
			$login = $this->input->post('login');
			if ($login == "checkout") {
				$referred_from = $this->session->userdata('referred_checkout');
				redirect($referred_from);
			} elseif ($login == "invoice") {
				redirect(base_url('member/transaksi/beli'));
			} else {
				redirect(base_url('member/index'));
			}
		} elseif ($admin_cek == 1) {
			$data_login = array(
				'log_id'        => $admin_row->id_admin,
				'log_user'      => $admin_row->username,
				'log_name'      => $admin_row->name,
				'log_email'  	=> $admin_row->email,
				'log_level'     => $admin_row->level,
				'log_admin'     => true,
				'log_valid'     => true
			);
			$this->session->set_userdata($data_login);
			redirect(base_url('admin'));
		} else {
			$this->session->set_flashdata("report", "<div class='form-login-error' style=\"display: block; height: auto;\"><h3>Invalid login</h3> <p>Username atau Password yang anda masukkan Salah!!.</p></div>");
			redirect(base_url('login'));
		}
	}

	function check_email()
	{
		$email   = $this->input->post('email');
		$row     = $this->db->query("SELECT email FROM member WHERE email='$email'")->num_rows();

		if ($row == 0) {
			return true;
		} else {
			return false;
		}
	}

	
    function reg()
    {
        $this->load->view('front/reg');
    }

    function affiliate($id)
    {
        $data['id_aff'] = $id;
        $this->load->view('front/reg_affiliate', $data);
    }

    function add_affiliate()
    {
        $username   = $this->input->post('username');
        $nama       = $this->input->post('nama');
        $id_upline  = $this->input->post('id_upline');
        $email      = $this->input->post('email');
        $no_hp      = $this->input->post('no_hp');
        $password   = md5($this->input->post('password'));

        $this->db->query("INSERT INTO `member` (`id_member`, `id_upline`, `username`, `password`, `nama`, `no_hp`, `email`, `id_bank`, `no_rekening`, `nama_rekening`, `alamat`, `pekerjaan`, `tgl_reg`, `level`, `status`) VALUES (NULL, '$id_upline', '$username', '$password', '$nama', '$no_hp', '$email', '', '', '', '', '', NOW(), 1, '0')");
        $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Reseller Berhasil!! </strong>Anda dapat login sekarang...</div></div>");
        redirect(base_url('auth'));
    }

    public function check_username_availablity()
    {
        $get_result = $this->Auth_model->check_username_availablity();
        if (!$get_result)
            echo '<div class="form-group"><div class="alert alert-danger"><strong>Sayang sekali!</strong> Username sudah dipakai...</div></div>';
        else
            echo '<div class="form-group"><div class="alert alert-success"><strong>Selamat!</strong> Username masih tersedia...</div></div>';
    }

    public function check_email_availablity()
    {
        $get_result = $this->Auth_model->check_email_availablity();
        if (!$get_result)
            echo '<div class="form-group"><div class="alert alert-danger"><strong></strong> Email sudah terdaftar...</div></div>';
        else
            echo '<div class="form-group"><div class="alert alert-success"><strong></strong> Email masih tersedia...</div></div>';
    }

    function member()
    {
        $username   = $this->input->post('username');
        $nama       = $this->input->post('nama');
        $id_upline  = $this->input->post('id_upline');
        $email      = $this->input->post('email');
        $no_hp      = $this->input->post('no_hp');
        $password   = md5($this->input->post('password'));
        // echo $username, $nama, $id_upline, $email, $no_hp, $password;

        $this->db->query("INSERT INTO `member` (`id_member`, `username`, `password`, `nama`, `no_hp`, `email`, `id_bank`, `no_rekening`, `nama_rekening`, `alamat`, `pekerjaan`, `tgl_reg`, `level`, `status`) VALUES (NULL, '$username', '$password', '$nama', '$no_hp', '$email', '', '', '', '', '', NOW(), 1, '0')");
        // INSERT INTO `member` (`id_member`, `username`, `nama`, `no_ktp`, `alamat`, `kota`, `no_hp`, `email`, `password`, `id_bank`, `no_rekening`, `tgl_daftar`, `id_upline`, `status`) VALUES (NULL, '', '', '', '', '', '', '', '', '0', '', NOW(), '$id_upline', '0')");

        $this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Berhasil!! </strong>Anda dapat login sekarang...</div></div>");

        redirect(base_url('auth'));
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
