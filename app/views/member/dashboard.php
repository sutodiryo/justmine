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
                                <div class="row">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content bg-night-fade">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Pembelian</div>
                                                    <!-- <div class="widget-subheading">Sepanjang waktu</div> -->
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span>0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content bg-arielle-smile">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Distributor</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span>0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content bg-happy-green">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Pembelian Distributor</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span>0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-header">Pembelian Terakhir
                                            </div>
                                            <div class="table-responsive">
                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Name</th>
                                                            <th class="text-center">City</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Sales</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <tr>
                                                            <td class="text-center text-muted">#345</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">John Doe</div>
                                                                            <div class="widget-subheading opacity-7">Web
                                                                                Developer
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">Madrid</td>
                                                            <td class="text-center">
                                                                <div class="badge badge-warning">Pending</div>
                                                            </td>
                                                            <td class="text-center" style="width: 150px;">
                                                                <div class="pie-sparkline">2,4,6,9,4</div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center text-muted">#347</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">Ruben Tillman
                                                                            </div>
                                                                            <div class="widget-subheading opacity-7">
                                                                                Etiam
                                                                                sit amet orci eget
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">Berlin</td>
                                                            <td class="text-center">
                                                                <div class="badge badge-success">Completed</div>
                                                            </td>
                                                            <td class="text-center" style="width: 150px;">
                                                                <div id="sparkline-chart4"></div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center text-muted">#321</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">Elliot Huber
                                                                            </div>
                                                                            <div class="widget-subheading opacity-7">
                                                                                Lorem
                                                                                ipsum dolor sic
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">London</td>
                                                            <td class="text-center">
                                                                <div class="badge badge-danger">In Progress</div>
                                                            </td>
                                                            <td class="text-center" style="width: 150px;">
                                                                <div id="sparkline-chart8"></div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center text-muted">#55</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">Vinnie Wagstaff
                                                                            </div>
                                                                            <div class="widget-subheading opacity-7">UI
                                                                                Designer
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">Amsterdam</td>
                                                            <td class="text-center">
                                                                <div class="badge badge-info">On Hold</div>
                                                            </td>
                                                            <td class="text-center" style="width: 150px;">
                                                                <div id="sparkline-chart9"></div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details
                                                                </button>
                                                            </td>
                                                        </tr> -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-block text-center card-footer">
                                                <a href="<?php echo base_url('member/pembelian') ?>" class="mb-2 mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-primary">
                                                    <i class="lnr-cart btn-icon-wrapper"> </i>Lihat Semua Pembelian
                                                </a>
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