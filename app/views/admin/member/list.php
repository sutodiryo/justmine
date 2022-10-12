<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
    <title><?php echo MAIN_TITLE ?></title>
    <meta name="msapplication-tap-highlight" content="no">

    <link href="<?php echo base_url() ?>assets/admin/main.07a59de7b920cd76b874.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-gray">
        <div class="app-main">

            <?php $this->load->view('_/sidebar'); ?>

            <div class="app-inner-layout app-inner-layout-page">
                <div class="app-inner-layout__wrapper">
                    <div class="app-inner-layout__content">
                        <div class="tab-content">
                            <div class="container-fluid">
                                <div class="mb-3 card">

                                    <div class="no-gutters row">
                                        <div class="col-md-12">
                                            <div class="main-card mb-3 card">
                                                <div class="card-header-tab card-header">
                                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                                        <i class="header-icon lnr-users mr-3 text-muted opacity-6"> </i><?php echo $title ?>
                                                    </div>

                                                    <div class="btn-actions-pane-right actions-icon-btn">
                                                        <a data-toggle="modal" data-target="#modal-tambah-member" aria-expanded="false" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-user-plus"></i> Distributor Baru</a>
                                                    </div>

                                                </div>
                                                <div class="card-body">
                                                    <?php echo $this->session->flashdata('report'); ?>
                                                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="1%"></th>
                                                                <th width="39%">Nama</th>
                                                                <th width="20%" class='text-center'>Level</th>
                                                                <th width="20%" class='text-center'>Level Distributor</th>
                                                                <th width="20%" class='text-center'></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php if (empty($member)) {
                                                                echo "<tr class='odd gradeX'><td>Kosong...</td><td></td><td></td><td></td><td></td><td></td></tr>";
                                                            } else {
                                                                $no = 0;
                                                                foreach ($member as $m) {
                                                                    $no++;
                                                                    echo "<tr>
                                                                    <td class='text-center'>$no</td>
                                                                    <td><a href='" . base_url('admin/member_detail/') . "$m->id_member' title='Lihat Detail'>$m->nama (<font color='blue'>$m->username</font>)</a></td>";

                                                                    echo "<td class='text-center'>";
                                                                    if ($m->level == 0) {
                                                                        echo "<a class='mb-2 mr-2 btn btn-focus btn-sm' data-toggle='modal' data-target='#modal_level_$m->id_member' aria-expanded='false'>Reseller</a>";
                                                                    } elseif ($m->level == 1) {
                                                                        echo "<a class='mb-2 mr-2 btn btn-alternate btn-sm' data-toggle='modal' data-target='#modal_level_$m->id_member' aria-expanded='false'>Agen</a>";
                                                                    } elseif ($m->level == 2) {
                                                                        echo "<a class='mb-2 mr-2 btn btn-danger btn-sm' data-toggle='modal' data-target='#modal_level_$m->id_member' aria-expanded='false'>Distributor</a>";
                                                                    }
                                                                    echo "</td>";

                                                                    echo "<td class='text-center'>";
                                                                    if ($m->level == 2) {

                                                                        if ($m->dst == 0) {
                                                                            echo "<a class='mb-2 mr-2 btn btn-info btn-sm' data-toggle='modal' data-target='#modal_dst_$m->id_member' aria-expanded='false'>Biasa <span class='badge badge-light'>$m->dst</span></i></div>";
                                                                        } elseif ($m->dst > 0 && $m->dst < 4) {
                                                                            echo "<a class='mb-2 mr-2 btn btn-secondary btn-sm' data-toggle='modal' data-target='#modal_dst_$m->id_member' aria-expanded='false'>Silver <span class='badge badge-light'>$m->dst</span></a>";
                                                                        } elseif ($m->dst > 3 && $m->dst < 11) {
                                                                            echo "<a class='mb-2 mr-2 btn btn-warning btn-sm' data-toggle='modal' data-target='#modal_dst_$m->id_member' aria-expanded='false'>Gold <span class='badge badge-light'>$m->dst</span></a>";
                                                                        } elseif ($m->dst > 10) {
                                                                            echo "<a class='mb-2 mr-2 btn btn-primary btn-sm' data-toggle='modal' data-target='#modal_dst_$m->id_member' aria-expanded='false'>Platinum <span class='badge badge-light'>$m->dst</span></a>";
                                                                        }
                                                                    } else {
                                                                        echo "-";
                                                                    }
                                                                    echo "</td>";

                                                                    echo "<td class='text-center'>
                                                                    <div class='dropdown d-inline-block'>
                                                                    <button aria-haspopup='true' aria-expanded='false' data-toggle='dropdown' class='mb-2 dropdown-toggle mb-2 mr-2 btn btn-outline-2x btn-outline-primary btn-sm'>Action</button>
                                                                    <div tabindex='-1' role='menu' aria-hidden='true' class='dropdown-menu-right dropdown-menu-rounded dropdown-menu' x-placement='top-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-127px, -308px, 0px);'>
                                                                    <h6 tabindex='-1' class='dropdown-header'>$m->nama</h6>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url('p/reg/') . "$m->id_member' title='Tambah Distributor'><i class='dropdown-icon lnr-question-circle'> </i><span>Tambah Distributor</span></a>
                                                                    <div tabindex='-1' class='dropdown-divider'></div>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url('admin/set/member/0/') . "$m->id_member' title='Set Pending'><i class='dropdown-icon lnr-question-circle'> </i><span>Set Pending</span></a>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url('admin/set/member/1/') . "$m->id_member' title='Set Aktif'><i class='dropdown-icon lnr-checkmark-circle'> </i><span>Set Aktif</span></a>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url('admin/edit/member/') . "$m->id_member' title='Edit Member'><i class='dropdown-icon lnr-pencil'> </i><span>Edit</span></a>
                                                                    <div tabindex='-1' class='dropdown-divider'></div>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url() . "admin/del/member/$m->id_member' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" title='Hapus'><i class='dropdown-icon lnr-trash'> </i><span>Hapus</span></a>
                                                                    </div>
                                                                    </div>
                                                                    </td>
                                                                    </tr>";
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th width="1%"></th>
                                                                <th width="39%">Nama</th>
                                                                <th width="20%" class='text-center'>Level</th>
                                                                <th width="20%" class='text-center'>Level Distributor</th>
                                                                <th width="20%" class='text-center'></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>



<div class="modal fade" id="modal-tambah-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Distributor Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url('p/act_reg') ?>" method="POST">

                <input type="hidden" name="admin" value="1">
                <input type="hidden" name="password" value="123456">

                <div class="modal-body">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <input type="text" class="form-control" name="nama_transaksi" placeholder="Nama Kota/Kabupaten" required=""> -->
                                    <select name="id_upline" class="multiselect-dropdown form-control" required>
                                        <option value="0">Pilih distributor diatasnya...</option>
                                        <?php foreach ($member as $m) {
                                            echo "<option value='$m->id_member'>$m->nama</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="nama" id="nama" placeholder="Nama lengkap distributor" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="no_hp" id="nohp" placeholder="Nomor WA contoh : (85220007411)" type="number" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <!-- <div id="Info"></div> -->
                                    <!-- <input name="email" placeholder="Email anda..." type="email" id="email" onchange="return check_email();" class="form-control" required> -->
                                    <input name="email" placeholder="Email..." type="text" class="form-control" value="-">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="level" class=""><span class="text-danger"></span> Level</label>
                            <fieldset class="position-relative form-group">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="level" type="radio" class="form-check-input" value="2" required>
                                        Distributor<br>Melakukan pembelian 100 botol diawal, dan pembelian minimal bulanan selanjutnya seharga Rp. 7.500.000.
                                    </label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="level" type="radio" class="form-check-input" value="1" required>
                                        Agen<br>Melakukan pembelian 30 botol diawal, dan pembelian minimal bulanan selanjutnya seharga Rp. 3.000.000.
                                    </label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input name="level" type="radio" class="form-check-input" value="0" required>
                                        Reseller<br>Melakukan pembelian 10 botol diawal, dan pembelian minimal bulanan selanjutnya seharga Rp 1.200.000.
                                    </label>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php foreach ($member as $mm) { ?>

<div class="modal fade" id="modal_level_<?php echo $mm->id_member ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $mm->id_member ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Level : <?php echo $mm->nama ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url('admin/set/upline/member/') ?><?php echo $mm->id_member ?>" method="POST">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <input type="text" class="form-control" name="nama_transaksi" placeholder="Nama Kota/Kabupaten" required=""> -->
                                <select name="id_upline" class="multiselect-dropdown form-control" required>
                                    <option value="0">Pilih distributor diatasnya...</option>
                                    <?php foreach ($sel_member as $sm) {
                                            echo "<option value='$sm->id_member'";
                                            if ($sm->id_member == $mm->id_member_up) {
                                                echo "selected='selected'";
                                            }
                                            echo ">$sm->nama ($sm->no_hp)</option>";
                                        } ?>

                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_dst_<?php echo $mm->id_member ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $mm->id_member ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Distributor : <?php echo $mm->nama ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $q = $this->db->query("SELECT id_member,nama,username FROM member WHERE id_upline='$mm->id_member'")->result();
                    $no=0;
                    foreach ($q as $q) {
                        $no++;
                        echo "$no. $q->nama ($q->username) <a href='#'><i class='fa fa-times'></i></a><br>";
                    } ?>
            </div>
        </div>
    </div>
</div>

<?php
}
?>