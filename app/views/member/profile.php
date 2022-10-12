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
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Edit Profile</h5>

                                                <?php foreach ($profile as $p) { } ?>
                                                <form id="signupForm" class="col-md-10 mx-auto" method="post" action="#">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Lengkap</label>
                                                        <div>
                                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $p->nama?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="no_hp">no_hp</label>
                                                        <div>
                                                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?php echo $p->no_hp?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <div>
                                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $p->email?>"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="confirm_password">Confirm password</label>
                                                        <div>
                                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input" />
                                                                <label class="form-check-label">Please agree to our
                                                                    policy</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up
                                                        </button>
                                                    </div>
                                                </form>
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