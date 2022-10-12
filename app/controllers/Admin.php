<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('log_valid') == FALSE) {
			redirect(base_url('auth'));
		}
		if ($this->session->userdata('log_admin') == FALSE) {
			redirect(base_url('member'));
		}
	}

	function index()
	{
		$data['page'] 			= 'dashboard';
		$data['member'] 		= $this->db->query("SELECT id_member FROM member")->num_rows();

		$qd = "SELECT m1.id_member FROM member m1 WHERE level=2";
		$op = "((SELECT COUNT(id_member) FROM member m2 WHERE m2.id_upline=m1.id_member)";
		$data['distributor'] 	= $this->db->query("$qd")->num_rows();
		$data['platinum'] 		= $this->db->query("$qd AND $op > 10)")->num_rows();
		$data['gold'] 			= $this->db->query("$qd AND $op > 3 ) AND $op < 11)")->num_rows();
		$data['silver'] 		= $this->db->query("$qd AND $op > 1 ) AND $op < 3)")->num_rows();
		$data['biasa'] 			= $this->db->query("$qd AND $op = 0)")->num_rows();

		$data['agen'] 			= $this->db->query("SELECT * FROM member WHERE level=1")->num_rows();
		$data['reseller'] 		= $this->db->query("SELECT * FROM member WHERE level=0")->num_rows();

		$data['trans'] 			= $this->db->query("SELECT SUM(total) AS t FROM transaksi")->result();

		$data['transaksi']		= $this->db->query("SELECT  id_transaksi,total,status,
															(CASE
																WHEN (SELECT level FROM member WHERE id_member=transaksi.id_member) = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=transaksi.id_produk)
																WHEN (SELECT level FROM member WHERE id_member=transaksi.id_member) = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=transaksi.id_produk)
																ELSE (SELECT harga_3 FROM produk WHERE id_produk=transaksi.id_produk)
															END) AS hrg,
															(SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
															(SELECT no_hp FROM member WHERE id_member=transaksi.id_member) AS no_hp,
															(SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
													FROM transaksi
													ORDER BY tgl_pesan DESC LIMIT 10")->result();

		// $data['transa']       	= $this->db->query("SELECT	status,tgl_pesan,id_affiliate,
		// 													(SELECT nama FROM member WHERE id_member=transaksi.id_affiliate) AS aff,
		// 													(SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
		// 											FROM transaksi ORDER BY tgl_pesan DESC LIMIT 10")->result();

		$this->load->view('admin/dashboard', $data);
	}

	function member($x)
	{
		if ($this->session->userdata('log_admin') == TRUE) {

			$data['page'] = 'member';
			$q = "	SELECT 	m1.id_member,m1.username,m1.nama,m1.no_hp,m1.level,m1.status,
							(SELECT nama FROM member m2 WHERE m2.id_member=m1.id_upline) AS member,
							(SELECT id_member FROM member m2 WHERE m2.id_member=m1.id_upline) AS id_member_up,
							(SELECT COUNT(*) FROM member m2 WHERE m2.id_upline=m1.id_member AND level=2) AS dst
					FROM member m1";

			$data['sel_member']  = $this->db->query("SELECT id_member,nama,no_hp FROM member ORDER BY nama ASC")->result();

			if ($x == "all") {
				$data['title'] 	 = 'Daftar Semua Member';
				$data['member']  = $this->db->query("$q ORDER BY level DESC, dst DESC")->result();
			} elseif ($x == "pending") {
				$data['title'] 	 = 'Daftar Member Pending';
				$data['member']  = $this->db->query("$q WHERE status=0")->result();
			} elseif ($x == "aktif") {
				$data['title'] 	 = 'Daftar Member Aktif';
				$data['member']  = $this->db->query("$q WHERE status=1")->result();
			} elseif ($x == "banned") {
				$data['title'] 	 = 'Daftar Member Banned';
				$data['member']  = $this->db->query("$q WHERE status=2")->result();
			}
			$this->load->view('admin/member/list', $data);
		} else {
			redirect(base_url());
		}
	}

	function member_detail($id)
	{
		if ($this->session->userdata('log_admin') == TRUE) {
			$data['page'] 	= 'member';
			$data['member'] = $this->db->query("SELECT * FROM member WHERE id_member='$id'")->result();
			$this->load->view('admin/member/detail', $data);
		} else {
			redirect(base_url());
		}
	}

	function produk($x)
	{
		if ($x == "all") {

			$data['page'] 	= 'produk';
			$data['title'] 	= 'Daftar Produk';
			$data['produk'] = $this->db->query("SELECT * FROM produk")->result();
			$this->load->view('admin/produk/list', $data);
		} elseif ($x == "act_add") {
			$config['upload_path']      = './assets/upload/produk/';
			$config['allowed_types']    = 'gif|jpg|jpeg|png';
			$config['max_size']         = 1024;
			$config['encrypt_name']     = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('img_1');
			$up = $this->upload->data();

			$data = array(
				'nama_produk'   => $this->input->post('nama_produk'),
				'harga'         => $this->input->post('harga'),
				'harga_'        => $this->input->post('harga_'),
				'keterangan'    => $this->input->post('keterangan'),
				'waktu_input'   => date('Y-m-d H:i:s'),
				'img_1'         => $up['file_name']
			);
			$this->upload->display_errors();
			$this->db->insert('produk', $data);
			redirect(base_url('admin/produk/list'));
		}
	}

	function transaksi($x)
	{
		$data['page'] 		= 'transaksi';
		// $data['member'] 	= $this->db->query("SELECT id_member, nama FROM member")->result();

		$data['member']  = $this->db->query("SELECT id_member,nama,username FROM member ORDER BY nama ASC")->result();
		$q = "	SELECT  id_transaksi,total,status,
						(CASE
							WHEN (SELECT level FROM member WHERE id_member=transaksi.id_member) = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=transaksi.id_produk)
							WHEN (SELECT level FROM member WHERE id_member=transaksi.id_member) = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=transaksi.id_produk)
							ELSE (SELECT harga_3 FROM produk WHERE id_produk=transaksi.id_produk)
						END) AS hrg,
						(SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member,
						(SELECT no_hp FROM member WHERE id_member=transaksi.id_member) AS no_hp,
						(SELECT username FROM member WHERE id_member=transaksi.id_member) AS username,
						(SELECT nama_produk FROM produk WHERE id_produk=transaksi.id_produk) AS produk
				FROM transaksi";

		if ($x == "all") {

			$data['title'] 		= 'Daftar Semua Transaksi';
			$data['transaksi']  = $this->db->query("$q ORDER BY tgl_pesan DESC")->result();
		} elseif ($x == "lunas") {

			$data['title'] 		= 'Daftar Transaksi Lunas';
		}

		$this->load->view('admin/transaksi/list', $data);
	}

	function laporan()
	{
		$data['page'] 	= 'laporan';
		$data['title']	= 'Laporan Transaksi';

		$tgl_1	= $this->input->post('tgl_1');
		$tgl_2 	= $this->input->post('tgl_2');
		$cetak	= $this->input->post('cetak');
		$level 	= "(SELECT level FROM member m2 WHERE m2.id_member=m1.id_member)";
		$dst 	= "(SELECT COUNT(id_member) FROM member m2 WHERE m2.id_upline=m1.id_member)"; //jumlah downline distributor
		if (empty($tgl_1 && $tgl_2)) {
			$data['member']	= $this->db->query("	SELECT 	m1.id_member,m1.nama,m1.no_hp,m1.username,m1.level,
															(CASE
																	WHEN $level = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=1)
																	WHEN $level = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=1)
																	ELSE (SELECT harga_3 FROM produk WHERE id_produk=1)
															END) AS hrg,
															$dst AS dst,
															(SELECT SUM(total) FROM transaksi WHERE id_member=m1.id_member AND status=1) AS pembelian,
															(SELECT SUM(total) FROM transaksi WHERE id_member IN (SELECT id_member FROM member WHERE id_upline=m1.id_member) AND status=1) AS pembelian_team
													FROM member m1
													ORDER BY pembelian_team DESC,pembelian DESC,dst DESC")->result();
		} else {

			$data['member']	= $this->db->query("	SELECT 	m1.id_member,m1.nama,m1.no_hp,m1.username,m1.level,
															(CASE
																	WHEN $level = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=1)
																	WHEN $level = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=1)
																	ELSE (SELECT harga_3 FROM produk WHERE id_produk=1)
															END) AS hrg,
															$dst AS dst,
															(SELECT SUM(total) FROM transaksi WHERE id_member=m1.id_member AND tgl_pesan BETWEEN '$tgl_1' AND '$tgl_2' AND status=1) AS pembelian,
															(SELECT SUM(total) FROM transaksi WHERE id_member IN (SELECT id_member FROM member WHERE id_upline=m1.id_member) AND tgl_pesan BETWEEN '$tgl_1' AND '$tgl_2' AND status=1) AS pembelian_team
													FROM member m1
													ORDER BY pembelian_team DESC,pembelian DESC,dst DESC")->result();
			$data['tgl_1']	= $tgl_1;
			$data['tgl_2']	= $tgl_2;
		}
		if (empty($cetak)) {
			$this->load->view('admin/laporan/index', $data);
		} else {
			$this->load->view('admin/laporan/cetak', $data);
		}
	}

	function komisi()
	{
		if ($this->session->userdata('log_admin') == TRUE) {
			$data['page'] 		= 'komisi';
			$data['title'] 		= 'Daftar Penarikan Komisi';
			$data['komisi']     = $this->db->query("SELECT  id_komisi,jumlah_penarikan,status,tgl_cair,
                                                            (SELECT nama FROM member WHERE id_member=komisi.id_member) AS member
                                                    FROM komisi")->result();
			$this->load->view('admin/komisi', $data);
		} else {
			redirect(base_url());
		}
	}





	//ACT
	function add($x)
	{
		if ($x == "transaksi") {
			$now = date("Y-m-d");
			$data = array(
				'id_transaksi'	=> NULL,
				'id_member' 	=> $this->input->post('id_member'),
				'id_produk'  	=> $this->input->post('id_produk'),
				'total'  		=> $this->input->post('total'),
				'tgl_pesan'  	=> $now,
				'tgl_bayar'  	=> NULL,
				'status'  		=> 0
			);

			$this->db->insert('transaksi', $data);

			$this->session->set_flashdata("report", "<div class='alert alert-info alert-dismissible fade show' role='alert'><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>×</span></button>Transaksi berhasil ditambahkan...</div>");

			// $referred_from = $this->session->userdata('referred_edit_video');
			// redirect($referred_from);
			redirect(base_url('admin/transaksi/all'));
		} elseif ($x == "produk_link") {
			$data = array(
				'id_produk'     => $this->input->post('id_produk'),
				'nama_link' 	=> $this->input->post('nama_link'),
				'link'  		=> $this->input->post('link'),
				'status'  		=> 0
			);

			$this->db->insert('produk_link', $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Materi berhasil ditambahkan...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/produk/list'));
		}
	}

	function edit($x, $y)
	{
		if ($this->session->userdata('log_admin') == TRUE) {

			if ($x == "produk") {
				$data['page'] 		= 'produk';
				$data['title'] 		= 'Edit Produk';
				$data['produk'] 	= $this->db->query("SELECT * FROM produk WHERE id_produk='$y'")->result();
				$this->load->view('admin/produk/edit', $data);
			} elseif ($x == "produk_video") {
				$data['page'] 		= 'produk';
				$data['title'] 		= 'Edit Link Video Produk';
				$data['produk'] 	= $this->db->query("SELECT * FROM produk WHERE id_produk='$y'")->result();
				$data['video'] 		= $this->db->query("SELECT id_produk_link,id_produk,nama_link,link,deskripsi,status FROM produk_link WHERE id_produk='$y' AND status=1")->result();
				$this->load->view('admin/produk/video', $data);
			} elseif ($x == "produk_link") {
				$data['page'] 	= 'produk';
				$data['produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$y'")->result();
				$data['link'] 	= $this->db->query("SELECT * FROM produk_link WHERE id_produk='$y' AND status=0")->result();
				$this->load->view('admin/produk/link', $data);
			}
		} else {
			redirect(base_url());
		}
	}

	function set($x, $y, $z)
	// $x = modul, $y = status, $z = id
	{
		$data = array('status' => $y);

		if ($x == "member") {
			$this->db->update($x, array('id_member'  => $z), $data);
			$page = "admin/member/list";
		} elseif ($x == "member_level") {
			$this->db->query("UPDATE member SET level = '$y' WHERE id_member ='$z'");
			$page = "admin/member/list";
		} elseif ($x == "produk") {
			$this->db->update($x, array('id_produk'  => $z), $data);
			$page = "admin/produk/list";
		} elseif ($x == "transaksi") {

			date_default_timezone_set('Asia/Jakarta');
			$now = date("Y-m-d h:i:s");
			$this->db->query("UPDATE transaksi SET status = '$y', tgl_bayar = '$now' WHERE id_transaksi = '$z'");
			$page = "admin/transaksi/all";
		} elseif ($x == "upline") {
			$id_upline = $this->input->post('id_upline');
			$this->db->query("UPDATE $y SET id_upline = '$id_upline' WHERE id_member ='$z'");
			$page = "admin/member/all";
		}
		$this->session->set_flashdata("report", "<div class='alert alert-warning alert-dismissible fade show' role='alert'><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>×</span></button>Data berhasil diupdate...</div>");
		redirect(base_url($page));
	}

	function act($x, $id)
	{
		if ($x == "edit_produk") {
			$data = array(
				'nama_produk'     	=> $this->input->post('nama_produk'),
				'harga'     		=> $this->input->post('harga'),
				'harga_' 			=> $this->input->post('harga_'),
				'keterangan'  		=> $this->input->post('keterangan')
			);

			$this->db->update("produk", array('id_produk'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Data area berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/produk/list'));
		} elseif ($x == "password_member") {
			$data = array(
				'password' => "5f4dcc3b5aa765d61d8327deb882cf99"
			);
			$this->db->update("area", array('id_area'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-warning'><div class='panel-heading'><div class='panel-title'>Password admin area berhasil direset...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/area'));
		} elseif ($x == "edit_produk_video") {
			$data = array(
				'nama_link'	=> $this->input->post('nama_link'),
				'deskripsi'	=> $this->input->post('deskripsi'),
				'link'    	=> $this->input->post('link')
			);
			$this->db->update("produk_link", array('id_produk_link'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-success'><div class='panel-heading'><div class='panel-title'>Video berhasil diupdate...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");

			$referred_from = $this->session->userdata('referred_edit_video');
			redirect($referred_from);
		}
	}

	function del($x, $id)
	{
		if ($x == "area") {
			// $where = array('id_area' => $id);
			// $this->db->delete($where, 'area');
			$data = array(
				'status' => 3
			);
			$this->db->update("area", array('id_area'  => $id), $data);

			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Data area berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/area'));
		} elseif ($x == "produk_link") {
			$data = array(
				'status' => 3
			);
			$this->db->delete($x, array('id_produk_link'  => $id));

			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Video berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			$referred_from = $this->session->userdata('referred_edit_video');
			redirect($referred_from);
		} elseif ($x == "transaksi") {
			$this->db->query("DELETE FROM transaksi WHERE transaksi.id_transaksi = '$id'");
			$this->session->set_flashdata("report", "<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>×</span></button>Data transaksi berhasil dihapus...</div>");
			redirect(base_url('admin/transaksi/all'));
		} elseif ($x == "member") {
			$this->db->delete($x, array('id_member'  => $id));
			$this->session->set_flashdata("report", "<div class='panel panel-danger'><div class='panel-heading'><div class='panel-title'>Member berhasil dihapus...</div><div class='panel-options'><a href='#' data-rel='close'><i class='entypo-cancel'></i></a></div></div></div>");
			redirect(base_url('admin/member/list'));
		}
	}
}
