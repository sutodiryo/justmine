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
                                                        <i class="header-icon pe-7s-ticket mr-3 text-muted opacity-6"> </i><?php echo $title ?>
                                                    </div>
                                                    <div class="btn-actions-pane-right actions-icon-btn">
                                                        <a data-toggle="modal" data-target="#modal-tambah-produk" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link"><i class="pe-7s-plus btn-icon-wrapper"></i></a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="1%"></th>
                                                                <th width="45%">Produk</th>
                                                                <th width="24%">Harga</th>
                                                                <th width="10%" class='text-center'>Status</th>
                                                                <th width="20%" class='text-center'></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php if (empty($produk)) {
                                                                echo "<tr class='odd gradeX'><td>Kosong...</td><td></td><td></td><td></td><td></td><td></td></tr>";
                                                            } else {
                                                                $no = 0;
                                                                foreach ($produk as $p) {
                                                                    $no++;
                                                                    echo "<tr>
                                                                    <td class='text-center'>$no</td>
                                                                    <td><img src='" . base_url('assets/public/') . "" . $p->img_1 . "' height='100'> $p->nama_produk</td>
                                                                    
                                                                    <td><font color='#d92550'>Rp " . number_format($p->harga_1) . "</font><br><font color='#794c8a'>Rp " . number_format($p->harga_2) . "</font><br><font color='#444054'>Rp " . number_format($p->harga_3) . "</font></td>";

                                                                    echo "<td class='text-center'>";
                                                                    if ($p->status == 0) {
                                                                        echo "<div class='mb-2 mr-2 badge badge-warning'>Pending <i class='fa fa-pause-circle'></i></div>";
                                                                    } elseif ($p->status == 1) {
                                                                        echo "<div class='mb-2 mr-2 badge badge-success'>Aktif <i class='fa fa-check-circle'></i></div>";
                                                                    } elseif ($p->status == 2) {
                                                                        echo "<div class='mb-2 mr-2 badge badge-danger'>Tidak Aktif <i class='fa fa-times-circle'></i></div>";
                                                                    }
                                                                    echo "</td>";
                                                                    echo "<td class='text-center'>
                                                                    <div class='dropdown d-inline-block'>
                                                                        <button aria-haspopup='true' aria-expanded='false' data-toggle='dropdown' class='mb-2 dropdown-toggle mb-2 mr-2 btn btn-outline-2x btn-outline-primary btn-sm'>Action</button>
                                                                        <div tabindex='-1' role='menu' aria-hidden='true' class='dropdown-menu-right dropdown-menu-rounded dropdown-menu' x-placement='top-end' style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-127px, -308px, 0px);'>
                                                                            <h6 tabindex='-1' class='dropdown-header'>$p->nama_produk</h6>
                                                                            <a tabindex='0' class='dropdown-item' href='" . base_url('admin/edit/produk/') . "$p->id_produk' title='Edit Produk'><i class='dropdown-icon lnr-pencil'> </i><span>Edit</span></a>
                                                                        <div tabindex='-1' class='dropdown-divider'></div>
                                                                            <a tabindex='0' class='dropdown-item' href='" . base_url() . "admin/del/produk/$p->id_produk' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" title='Hapus Produk'><i class='dropdown-icon lnr-trash'> </i><span>Hapus</span></a>
                                                                        </div>
                                                                    </div>

                                                                    </td>
                                                                    </tr>";
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
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


<div class="modal fade" id="modal-tambah-produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/produk/act_add'); ?>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="img_1" class="control-label">Foto Produk</label>
                                    <input type="file" class="form-control" name="img_1" placeholder="Kode produk" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="harga" placeholder="Harga">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="harga_" placeholder="Harga Coret">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="keterangan" placeholder="Keterangan produk" required=""></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>