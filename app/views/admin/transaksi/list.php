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
                                                        <i class="header-icon pe-7s-cart mr-3 text-muted opacity-6"> </i><?php echo $title ?>
                                                    </div>

                                                    <div class="btn-actions-pane-right actions-icon-btn">
                                                        <a data-toggle="modal" data-target="#modal-tambah-transaksi" aria-expanded="false" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-cart-plus"></i> Transaksi Baru</a>
                                                    </div>

                                                </div>
                                                <div class="card-body">

                                                    <?php echo $this->session->flashdata('report'); ?>

                                                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="1%"></th>
                                                                <th width="30%">Nama</th>
                                                                <th width="29%">Total</th>
                                                                <th width="20%" class="text-center">Status</th>
                                                                <th width="20%" class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php if (empty($transaksi)) {
                                                                echo "<tr class='odd gradeX'><td>Kosong...</td><td></td><td></td><td></td><td></td><td></td></tr>";
                                                            } else {
                                                                $no = 0;
                                                                foreach ($transaksi as $t) {
                                                                    $no++;
                                                                    echo "<tr>
                                                                    <td class='text-center'>$no</td>
                                                                    <td><a href='" . base_url('admin/transaksi_detail/') . "$t->id_transaksi' title='Lihat Detail'>$t->member</a></td>
                                                                    <td>$t->total x " . number_format($t->hrg, 0, ",", ".") . " = " . number_format($t->total * $t->hrg, 0, ",", ".") . "</td>";

                                                                    echo "<td class='text-center'>";
                                                                    if ($t->status == 0) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-danger btn-sm'>Belum Dibayar <i class='fa fa-sync-alt'></i></div>";
                                                                    } elseif ($t->status == 1) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-success btn-sm'>Dibayar <i class='fa fa-check'></i></div>";
                                                                    } elseif ($t->status == 2) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-dark btn-sm'>Dibatalkan <i class='fa fa-times'></i></div>";
                                                                    }
                                                                    echo "</td>";

                                                                    // echo "<td><a class='btn btn-xs btn-info' href='" . base_url('admin/set/transaksi/2/') . "$t->id_transaksi'>Approve <i class='fa fa-check'></i></a>
                                                                    // <a class='btn btn-xs btn-danger' href='" . base_url('admin/set/transaksi/0/') . "$t->id_transaksi''>Batal <i class='fa fa-close'></i></a>
                                                                    // <a class='btn btn-xs btn-success' href='https://api.whatsapp.com/send?phone=62$t->no_hp'>WA <i class='fa fa-whatsapp'></i></a>
                                                                    // <a class='btn btn-xs btn-black' href='" . base_url('admin/del/transaksi/') . "$t->id_transaksi''  onclick=\"return confirm('Data yang dihapus tidak bisa dikembalikan, anda yakin ingin menghapus data ini ?');\">Hapus <i class='fa fa-trash'></i></a>";

                                                                    echo "<td class='text-center'>
                                                                    <div class='dropdown d-inline-block'>
                                                                    <button aria-haspopup='true' aria-expanded='false' data-toggle='dropdown' class='mb-2 dropdown-toggle mb-2 mr-2 btn btn-outline-2x btn-outline-primary btn-sm'>Action</button>
                                                                    <div tabindex='-1' role='menu' aria-hidden='true' class='dropdown-menu-right dropdown-menu-rounded dropdown-menu' x-placement='top-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-127px, -308px, 0px);'>
                                                                    <h6 tabindex='-1' class='dropdown-header'>$t->member</h6>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url('admin/set/transaksi/1/') . "$t->id_transaksi' title='Set Dibayar'><i class='dropdown-icon lnr-checkmark-circle'> </i><span>Set Dibayar</span></a>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url('admin/set/transaksi/0/') . "$t->id_transaksi' title='Set Belum Dibayar'><i class='dropdown-icon lnr-cross-circle'> </i><span>Set Belum Dibayar</span></a>
                                                                    <div tabindex='0' class='dropdown-divider'></div>
                                                                    <a tabindex='0' class='dropdown-item' href='https://api.whatsapp.com/send?phone=62$t->username&text=Paket%20anda%20sudah%20kami%20kirim%20dengan%20nomor%20resi%20%3A%20%0ATerima%20Kasih.' onclick=\"return title='Konfirmasi Pengiriman Paket\"><i class='dropdown-icon lnr-phone'> </i><span>Konfirmasi</span></a>
                                                                    <div tabindex='-1' class='dropdown-divider'></div>
                                                                    <a tabindex='0' class='dropdown-item' href='" . base_url() . "admin/del/transaksi/$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" title='Hapus'><i class='dropdown-icon lnr-trash'> </i><span>Hapus</span></a>
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
                                                                <th width="30%">Nama</th>
                                                                <th width="29%">Total</th>
                                                                <th width="20%" class='text-center'>Status</th>
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


<div class="modal fade bd-example-modal-lg" id="modal-tambah-transaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"" role=" document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaksi Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url('admin/add/transaksi') ?>" method="POST">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <input type="text" class="form-control" name="nama_transaksi" placeholder="Nama Kota/Kabupaten" required=""> -->
                                <select name="id_member" class="form-control multiselect-dropdown" required>
                                    <option readonly>Pilih distributor...</option>
                                    <?php foreach ($member as $m) {
                                        echo "<option value='$m->id_member'>$m->nama ($m->username)</option>";
                                    } ?>
                                    <!-- <option value="AK">Alaska</option> -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="total" placeholder="Jumlah pembelian (Botol)" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="id_produk">
                                    <option class="form-control" value="1">Vitacov</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan (pembayaran kurang dll)"></textarea>
                                
                            </div>
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