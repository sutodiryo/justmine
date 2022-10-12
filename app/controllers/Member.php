<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('log_valid') == FALSE) {
            redirect(base_url('login'));
        }
    }

    function index()
    {
        $data['page']  = 'dashboard';
        if ($this->session->userdata('log_level') == 0) {
            // $this->link();
            $this->load->view('member/dashboard', $data);
        } elseif ($this->session->userdata('log_level') == 1) {
            $this->load->view('member/dashboard', $data);
        } elseif ($this->session->userdata('log_level') == 2) {
            $this->load->view('member/dashboard', $data);
        }
    }

    function link()
    {
        $data['page']   = 'link';
        $data['title']  = 'Link Landingpage';

        $this->load->view('member/link', $data);
    }

    function distributor()
    {
        if ($this->session->userdata('log_level') == 2) {
            $data['page']   = 'distributor';
            $data['title']  = 'Daftar Distributor';

            $id     = $this->session->userdata('log_id');
            $tgl_1  = $this->input->post('tgl_1');
            $tgl_2  = $this->input->post('tgl_2');
            $level  = "(SELECT level FROM member m2 WHERE m2.id_member=m1.id_member)";
            $dst    = "(SELECT COUNT(id_member) FROM member m2 WHERE m2.id_upline=m1.id_member)"; //jumlah downline distributor
            if (empty($tgl_1 && $tgl_2)) {
                $data['distributor']    = $this->db->query("SELECT 	m1.id_member,m1.nama,m1.no_hp,m1.level,
                                                                    (CASE
                                                                        WHEN $level = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=1)
                                                                        WHEN $level = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=1)
                                                                        ELSE (SELECT harga_3 FROM produk WHERE id_produk=1)
                                                                    END) AS hrg,
                                                                    $dst AS dst,
                                                                    (SELECT SUM(total) FROM transaksi WHERE id_member=m1.id_member) AS pembelian,
                                                                    (SELECT SUM(total) FROM transaksi WHERE id_member IN (SELECT id_member FROM member WHERE id_upline=m1.id_member)) AS pembelian_team
                                                            FROM member m1 WHERE id_upline='$id'
                                                            ORDER BY pembelian DESC,pembelian_team DESC,dst DESC")->result();
            } else {
                $data['distributor']    = $this->db->query("SELECT 	m1.id_member,m1.nama,m1.no_hp,m1.level,
                                                                    (CASE
                                                                        WHEN $level = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=1)
                                                                        WHEN $level = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=1)
                                                                        ELSE (SELECT harga_3 FROM produk WHERE id_produk=1)
                                                                    END) AS hrg,
                                                                    $dst AS dst,
                                                                    (SELECT SUM(total) FROM transaksi WHERE id_member=m1.id_member AND tgl_pesan BETWEEN '$tgl_1' AND '$tgl_2') AS pembelian,
                                                                    (SELECT SUM(total) FROM transaksi WHERE id_member IN (SELECT id_member FROM member WHERE id_upline=m1.id_member) AND tgl_pesan BETWEEN '$tgl_1' AND '$tgl_2') AS pembelian_team
                                                            FROM member m1 WHERE id_upline='$id'
                                                            ORDER BY pembelian DESC,pembelian_team DESC,dst DESC")->result();
                $data['tgl_1']    = $tgl_1;
                $data['tgl_2']    = $tgl_2;
            }

            $this->load->view('member/distributor', $data);
        } else {
            redirect(base_url('member'));
        }
    }

    function pembelian()
    {
        $data['page']   = 'pembelian';
        $data['title']  = 'Daftar Pembelian';

        $level  = "(SELECT level FROM member WHERE id_member=transaksi.id_member)";
        $id     = $this->session->userdata('log_id');
        $data['pembelian']  = $this->db->query("SELECT  id_transaksi,id_member,id_produk,total,tgl_pesan,tgl_bayar,status,
                                                        (CASE
                                                            WHEN $level = '2' THEN (SELECT harga_1 FROM produk WHERE id_produk=1)
                                                            WHEN $level = '1' THEN (SELECT harga_2 FROM produk WHERE id_produk=1)
                                                            ELSE (SELECT harga_3 FROM produk WHERE id_produk=1)
                                                        END) AS hrg,
                                                        (SELECT nama FROM member WHERE id_member=transaksi.id_member) AS member
                                                FROM transaksi WHERE id_member='$id' ORDER BY tgl_pesan DESC")->result();
        $this->load->view('member/pembelian', $data);
    }

    function komisi()
    {
        $id = $this->session->userdata('log_id');
        $data['page']        = 'komisi';
        $data['title']       = 'Daftar Pengajuan Komisi';
        $data['distributor'] = $this->db->query("    SELECT * FROM komisi WHERE id_member='$id' ORDER BY tgl_pengajuan DESC")->result();
        $this->load->view('member/komisi', $data);
    }

    function profile()
    {
        $data['page']       = 'profile';
        $data['title']      = 'Profile';
        $id = $this->session->userdata('log_id');
        $data['profile']    = $this->db->query("SELECT * FROM member WHERE id_member='$id'")->result();
        $this->load->view('member/profile', $data);
    }

    function cari()
    {
        $keyword        = $this->input->post('cari');
        $data['key']    = $this->input->post('cari');
        $data['page']   = 'cari';
        $data['title']  = 'Pencarian';

        $kelas          = $this->db->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
        $data['kelas']  = $kelas->result();
        $data['kelasr'] = $kelas->num_rows();

        $video          = $this->db->query("SELECT * FROM produk_link WHERE nama_link LIKE '%$keyword%'");
        $data['video']  = $video->result();
        $data['videor'] = $video->num_rows();

        $this->load->view('_/member/cari', $data);
    }
}
