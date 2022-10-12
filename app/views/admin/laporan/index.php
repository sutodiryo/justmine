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
                                                        <i class="header-icon pe-7s-graph2 mr-3 text-muted opacity-6"> </i>
                                                        <?php echo "$title";
                                                        if (!empty($tgl_1)) {
                                                            echo " periode $tgl_1 - $tgl_2";
                                                        } ?>
                                                    </div>
                                                    <div class="btn-actions-pane-right actions-icon-btn">
                                                        <form target="_blank" action="<?php echo base_url('admin/laporan') ?>" method="POST">
                                                            <?php if (!empty($tgl_1)) {
                                                                echo "<input type='hidden' class='form-control' name='tgl_1' value='$tgl_1'>
                                                                <input type='hidden' class='form-control' name='tgl_2' value='$tgl_1'>";
                                                            } ?>
                                                            <input type="hidden" class="form-control" name="cetak" value="1">
                                                            <button type="submit" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-print"></i> Cetak PDF</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form action="<?php echo base_url('admin/laporan') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="field-1" class="control-label">Tanggal Awal</label>
                                                                        <input type="date" class="form-control" id="field-1" name="tgl_1" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="field-2" class="control-label">Tanggal Akhir</label>
                                                                        <input type="date" class="form-control" id="field-2" name="tgl_2" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="filter" class="control-label">Filter</label>
                                                                        <button type="submit" id="filter" class="mb-2 mr-2 btn-icon btn-shadow btn-outline btn btn-outline-dark form-control"><i class="fa fa-filter btn-icon-wrapper"></i> Filter</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%">No</th>
                                                                <th width="25%">
                                                                    <font color='black'>Nama Anggota</font>
                                                                </th>
                                                                <th width="25%" class="text-center">Level Keanggotaan</th>
                                                                <th width="10%" class="text-center">
                                                                    <font color="green">Pembelian Pribadi</font>
                                                                </th>
                                                                <th width="10%" class="text-center">
                                                                    <font color="blue">Pembelian Distributor</font>
                                                                </th>
                                                                <th width="25%">
                                                                    <font color="red">Komisi</font>
                                                                </th>
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
                                                                    <td><a href='" . base_url('admin/member_detail/') . "$m->id_member' title='Lihat Detail'>$m->nama</a></td>";

                                                                    $l  = $m->level;
                                                                    $h  = $m->hrg;              //harga menurut level member
                                                                    $p  = $m->pembelian;        //total pembelian pribadi
                                                                    $pt = $m->pembelian_team;   //total pembelian team
                                                                    $dst = $m->dst;


                                                                    //Level
                                                                    echo "<td class='text-center'>";
                                                                    if ($m->level == 0) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-pill btn-focus btn-sm'>Reseller</div>";
                                                                    } elseif ($m->level == 1) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-pill btn-alternate btn-sm'>Agen</div>";
                                                                    } elseif ($m->level == 2) {

                                                                        echo "<div role='group' class='btn-group-sm btn-group btn-group-toggle' data-toggle='buttons'>
                                                                        <div class='btn btn-pill btn-danger'>Distributor</div>";
                                                                        if ($dst == 0) {
                                                                            $komisi = 2000;
                                                                            echo "<div class='btn btn-pill btn-info btn-sm'>Biasa <span class='badge badge-light'>$dst</span></div>";
                                                                        } elseif ($dst > 0 && $dst < 4) {
                                                                            if ($p >= 100) {
                                                                                $komisi = 5000;
                                                                            } else {
                                                                                $komisi = 2000;
                                                                            }
                                                                            echo "<div class='btn btn-pill btn-secondary btn-sm'>Silver <span class='badge badge-light'>$dst</span></div>";
                                                                        } elseif ($dst > 3 && $dst < 11) {
                                                                            if ($p >= 100) {
                                                                                $komisi = 7000;
                                                                            } else {
                                                                                $komisi = 2000;
                                                                            }
                                                                            echo "<div class='btn btn-pill btn-warning btn-sm'>Gold <span class='badge badge-light'>$dst</span></div>";
                                                                        } elseif ($dst > 10) {
                                                                            if ($p >= 100) {
                                                                                $komisi = 10000;
                                                                            } else {
                                                                                $komisi = 2000;
                                                                            }
                                                                            echo "<div class='btn btn-pill btn-primary btn-sm'>Platinum <span class='badge badge-light'>$dst</span></div>";
                                                                        }
                                                                    }

                                                                    if (empty($p)) {
                                                                        $komisi = 0;
                                                                    }
                                                                    echo "</div></td>";
                                                                    echo "<td class='text-center'><font color='green'>";
                                                                    if (empty($p)) {
                                                                        echo 0;
                                                                    } else {
                                                                        echo $p;
                                                                    }
                                                                    echo "</font></td>";
                                                                    echo "<td class='text-center'><font color='blue'>";
                                                                    if (empty($pt)) {
                                                                        echo 0;
                                                                    } else {
                                                                        echo $pt;
                                                                    }
                                                                    echo "</font></td>
                                                                    <td><font color='red'>$komisi x ";
                                                                    if (empty($pt)) {
                                                                        echo 0;
                                                                    } else {
                                                                        echo $pt;
                                                                    }

                                                                    echo " = Rp " . number_format(($pt * $komisi), 0, ",", ".") . "</font></td>
                                                                    
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