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
                                                        <i class="header-icon pe-7s-cart mr-3 text-muted opacity-6"> </i>
                                                        <?php echo "$title"; ?>
                                                    </div>
                                                    <div class="btn-actions-pane-right actions-icon-btn">
                                                        <button type="submit" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm"><i class="fa fa-cart-plus"></i> Beli</button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%">No</th>
                                                                <th width="30%">Nama</th>
                                                                <th width="30%">Total</th>
                                                                <th width="15%" class="text-center">Tanggal Pesan</th>
                                                                <th width="20%" class="text-center">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php if (empty($pembelian)) {
                                                                echo "<tr> <td>Kosong...</td> <td></td> <td></td> <td></td> <td></td> </tr>";
                                                            } else {
                                                                $no = 0;
                                                                foreach ($pembelian as $p) {
                                                                    $no++;
                                                                    echo "<tr>
                                                                    <td class='text-center'>$no</td>
                                                                    <td>$p->member</td>
                                                                    <td>$p->total x Rp " . number_format($p->hrg, 0, ",", ".") . " = Rp " . number_format($p->total * $p->hrg, 0, ",", ".") . "</td>
                                                                    <td class='text-center'>$p->tgl_pesan</td>";
                                                                    
                                                                    echo "<td class='text-center'>";
                                                                    if ($p->status == 0) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-danger btn-sm'>Belum Dibayar <i class='fa fa-sync-alt'></i></div>";
                                                                    } elseif ($p->status == 1) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-success btn-sm'>Dibayar <i class='fa fa-check'></i></div>";
                                                                    } elseif ($p->status == 2) {
                                                                        echo "<div class='mb-2 mr-2 btn btn-dark btn-sm'>Dibatalkan <i class='fa fa-times'></i></div>";
                                                                    }
                                                                    echo "</td>
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