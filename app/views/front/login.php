<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Distributor Vitacov</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="Lawan Corona Dengan Mikroba">

<meta name="msapplication-tap-highlight" content="no">

<link href="<?php echo base_url() ?>assets/admin/main.07a59de7b920cd76b874.css" rel="stylesheet">
</head>

<body>

    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">

                                <div>
                                    <div class="h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('<?php echo base_url() ?>assets/admin/images/originals/vitacov.jpg');"></div>
                                        <div class="slider-content">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
                                <span>Silahkan login menggunakan nomor HP dan password anda.</span></h4>
                            <!-- <h6 class="mt-3">Belum punya akun? <a href="<?php echo base_url('reg') ?>" class="text-primary">Daftar sekarang</a></h6> -->
                            <div class="divider row"></div>
                            <div>
                                <?php echo $this->session->flashdata('report'); ?>
                                <form class="" action="<?php echo base_url('auth/login'); ?>" method="POST">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="username" class="">Email</label><input name="username" placeholder="Email/Username" id="username" class="form-control"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="password" class="">Password</label><input name="password" id="password" placeholder="Password" type="password" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Tetap login</label></div>
                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto"><a onclick="goBack()" class="btn-lg btn btn-link">Kembali</a>
                                            <button class="btn btn-primary btn-lg" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>