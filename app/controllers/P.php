<?php
defined('BASEPATH') or exit('No direct script access allowed');

class P extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->lp(1);
	}

	//Landingpage Member
	function lp($id_member)
	{
		$data['member'] = $this->db->query("SELECT * FROM member WHERE id_member='$id_member'")->result();
		$this->load->view('front/index', $data);
	}

	//Register Member
	function reg($id_member)
	{
		$data['id_member'] = $id_member;
		$this->load->view('front/reg', $data);
	}

	function act_reg()
	{
		$now = date("Y-m-d");
		$data = array(
			'id_member'  	=> NULL,
			'id_upline'  	=> $this->input->post('id_upline'),
			'username'  	=> $this->input->post('no_hp'),
			'password'   	=> md5($this->input->post('password')),
			'nama'       	=> $this->input->post('nama'),
			'no_hp'      	=> $this->input->post('no_hp'),
			'email'      	=> $this->input->post('email'),

			'id_bank'      	=> NULL,
			'no_rekening'   => NULL,
			'nama_rekening' => NULL,
			'alamat'      	=> NULL,
			'kota'      	=> NULL,
			'pekerjaan'     => NULL,
			'tgl_reg'      	=> $now,
			'level'      	=> $this->input->post('level'),
			'status'      	=> 0

		);

		$this->db->insert('member', $data);

		$admin = $this->input->post('admin');
		if ($admin == 1) {
			$this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Distributor telah ditambahkan... </strong>Password = (123456)</div></div>");
			redirect(base_url('admin/member/all'));
		} else {
			$this->session->set_flashdata("report", "<div class='form-group'><div class='alert alert-success'><strong>Registrasi Reseller Berhasil!! </strong>Anda dapat login sekarang...</div></div>");
			redirect(base_url('login'));
		}
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
}
