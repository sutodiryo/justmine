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
                                                        <i class="header-icon pe-7s-link mr-3 text-muted opacity-6"> </i>
                                                        <?php echo "$title"; ?>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control-lg form-control" <?php echo "id='link_lp' value='" . base_url('p/lp/') . "" . $this->session->userdata('log_id') . "'"; ?>>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary datepicker-trigger-btn" type="button" onclick="copy()">Copy Link</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="mb-3 card">
                                    <div class="no-gutters row">
                                        <div class="col-md-12">
                                            <div class="main-card mb-3 card">
                                                <div class="card-header-tab card-header">
                                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                                        <i class="header-icon pe-7s-add-user mr-3 text-muted opacity-6"> </i>
                                                        Link Pendaftaran Distributor
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="col-sm-12">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control-lg form-control" <?php echo "id='link_lp2' value='" . base_url('p/reg/') . "" . $this->session->userdata('log_id') . "'"; ?>>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary datepicker-trigger-btn" type="button" onclick="copy2()">Copy Link</button>
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


    </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript">
        function copy() {
            var copyText = document.getElementById("link_lp");
            copyText.select();
            document.execCommand("copy");
            alert("Link landingpage sudah tercopy: " + copyText.value);
        }

        function copy2() {
            var copyText = document.getElementById("link_lp2");
            copyText.select();
            document.execCommand("copy");
            alert("Link pendaftaran sudah tercopy: " + copyText.value);
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>