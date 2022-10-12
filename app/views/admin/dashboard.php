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
                                        <div class="col-sm-6 col-md-6 col-xl-6">
                                            <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                                <div class="icon-wrapper rounded-circle">
                                                    <div class="icon-wrapper-bg opacity-10 bg-success"></div>
                                                    <i class="lnr-users text-white opacity-8"></i>
                                                </div>
                                                <div class="widget-chart-content">
                                                    <div class="widget-subheading">Total Member</div>
                                                    <div class="widget-numbers text-success"><span><?php echo $member ?> Orang</span></div>
                                                    <div class="widget-description opacity-8 text-focus">
                                                        Grow Rate:
                                                        <span class="text-info pl-1">
                                                            <i class="fa fa-angle-down"></i>
                                                            <span class="pl-1">14.1%</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider m-0 d-md-none d-sm-block"></div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-xl-6">
                                            <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                                <div class="icon-wrapper rounded-circle">
                                                    <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                                    <i class="lnr-cart text-white"></i>
                                                </div>
                                                <div class="widget-chart-content">
                                                    <div class="widget-subheading">Total Penjualan</div>
                                                    <div class="widget-numbers text-danger"><span><?php foreach ($trans as $tr) {
                                                                                                        echo $tr->t;
                                                                                                    } ?> Botol</span></div>
                                                    <div class="widget-description opacity-8 text-focus">
                                                        Grow Rate:
                                                        <span class="text-info pl-1">
                                                            <i class="fa fa-angle-down"></i>
                                                            <span class="pl-1">14.1%</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider m-0 d-md-none d-sm-block"></div>
                                        </div>
                                    </div>
                                    <div class="text-center d-block p-3 card-footer">
                                        <a class="btn-pill btn-wide fsize-1 btn btn-primary" href="<?php echo base_url('admin/laporan'); ?>">
                                            <span class="mr-2 opacity-7">
                                                <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                            </span>
                                            <span class="mr-1">Lihat Laporan Lengkap</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="card no-shadow bg-transparent no-border rm-borders mb-3">
                                    <div class="card">
                                        <div class="no-gutters row">
                                            <div class="col-md-12 col-lg-4">
                                                <ul class="list-group list-group-flush">
                                                    <li class="bg-transparent list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-heading">Distributor Platinum
                                                                        </div>
                                                                        <div class="widget-subheading">Total distributor platinum aktif
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="widget-numbers text-primary">
                                                                            <?php echo $platinum ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="bg-transparent list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-heading">Distributor Gold
                                                                        </div>
                                                                        <div class="widget-subheading">Total distributor gold aktif
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="widget-numbers text-warning">
                                                                            <?php echo $gold ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <ul class="list-group list-group-flush">

                                                    <li class="bg-transparent list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-heading">Distributor Silver
                                                                        </div>
                                                                        <div class="widget-subheading">Total distributor silver aktif
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="widget-numbers text-secondary">
                                                                            <?php echo $silver ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="bg-transparent list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-heading">Distributor Biasa
                                                                        </div>
                                                                        <div class="widget-subheading">Total distributor biasa aktif
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="widget-numbers text-info">
                                                                            <?php echo $biasa ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-12 col-lg-4">
                                                <ul class="list-group list-group-flush">
                                                    <li class="bg-transparent list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-heading">Agen</div>
                                                                        <div class="widget-subheading">Total agen aktif
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="widget-numbers text-dark">
                                                                            <?php echo $agen ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="bg-transparent list-group-item">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-heading">Reseller</div>
                                                                        <div class="widget-subheading">Total reseller aktif
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="widget-numbers text-dark">
                                                                            <?php echo $reseller ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="card-hover-shadow-2x mb-3 card">
                                            <div class="card-header-tab card-header">
                                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                                    <i class="header-icon pe-7s-wallet icon-gradient bg-malibu-beach"> </i>Transaksi Terakhir
                                                </div>
                                            </div>
                                            <div class="scroll-area-lg">
                                                <div class="scrollbar-container">
                                                    <div class="p-2">
                                                        <ul class="todo-list-wrapper list-group list-group-flush">

                                                            <?php
                                                            $no = 0;
                                                            foreach ($transaksi as $t) {
                                                                $no++;
                                                                ?>

                                                            <li class="list-group-item">
                                                                <div class="todo-indicator bg-warning"></div>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-2">
                                                                            <div class="custom-checkbox custom-control">
                                                                                <input type="checkbox" id="checkboxdash_<?php echo $no ?>" class="custom-control-input"><label class="custom-control-label" for="checkboxdash_<?php echo $no ?>">&nbsp;</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left">
                                                                            <div class="widget-heading"><?php echo $t->member ?>

                                                                                <div class="badge badge-focus ml-2">
                                                                                    <?php echo "$t->total x " . number_format($t->hrg, 0, ",", ".") . " = " . number_format($t->total * $t->hrg, 0, ",", ".") . ""; ?>
                                                                                </div>

                                                                            </div>
                                                                            <!-- <div class="widget-subheading"><i>Written by Bob</i>
                                                                                <div class="badge badge-pill badge-info ml-2">
                                                                                    NEW
                                                                                </div>
                                                                            </div> -->
                                                                        </div>
                                                                        <div class="widget-content-right widget-content-actions">
                                                                            <button class="border-0 btn-transition btn btn-outline-success">
                                                                                <i class="fa fa-check"></i>
                                                                            </button>
                                                                            <button class="border-0 btn-transition btn btn-outline-danger">
                                                                                <i class="fa fa-trash-alt"></i>
                                                                            </button>
                                                                        </div>

                                                                        <div class="widget-content-right ml-3">
                                                                            <?php
                                                                                if ($t->status == 0) {
                                                                                    echo "<div class='badge badge-pill badge-danger'>Belum Dibayar</div>";
                                                                                } elseif ($t->status == 1) {
                                                                                    echo "<div class='badge badge-pill badge-success'>Dibayar</div>";
                                                                                } elseif ($t->status == 2) {
                                                                                    echo "<div class='badge badge-pill badge-dark'>Dibatalkan</div>";
                                                                                }
                                                                                ?>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </li>


                                                            <?php
                                                            }
                                                            ?>

                                                        </ul>
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
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>