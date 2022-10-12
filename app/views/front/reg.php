<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Pendaftaran Distributor Vitacov</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="Lawan Corona Dengan Mikroba">

<meta name="msapplication-tap-highlight" content="no">
<link href="<?php echo base_url() ?>assets/admin/main.07a59de7b920cd76b874.css" rel="stylesheet">
</head>

<body>

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="header-mobile-wrapper">
                <div class="app-header__logo">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Vitacov" class="logo-src"></a>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="app-inner-layout app-inner-layout-page">
                <div class="app-inner-layout__wrapper">
                    <div class="app-inner-layout__content pt-1">
                        <div class="tab-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <center>
                                                    <div class="app-logo"></div>
                                                    <h4>
                                                        <span>Form Pendaftaran Distributor</span>
                                                    </h4>
                                                </center>

                                                <form class="col-md-12 mx-auto" action="<?php echo base_url('p/act_reg') ?>" method="POST">
                                                    <input type="hidden" name="id_upline" value="<?php echo $id_member ?>">

                                                    <div class="form-group">
                                                        <label for="nama">Nama Lengkap</label>
                                                        <div>
                                                            <input name="nama" id="nama" placeholder="Nama lengkap anda..." type="text" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nohp" class=""><span class="text-danger">*</span> Nomor WA</label>
                                                        <div>
                                                            <input name="no_hp" id="nohp" placeholder="Nomor WA anda..." type="number" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email" class=""><span class="text-danger">*</span> Email</label>
                                                        <div>
                                                            <input name="email" id="email" placeholder="Email anda..." type="email" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="level" class=""><span class="text-danger">*</span> Level</label>
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

                                                    <div class="form-group">
                                                        <label for="pass" class=""><span class="text-danger">*</span> Password</label>
                                                        <div>

                                                            <input name="password" id="pass" placeholder="Password anda..." type="password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- 
                                                    <div class="form-group">
                                                        <label for="passu" class=""><span class="text-danger">*</span> Ulangi Password</label>
                                                        <div>
                                                            <input name="password" id="passu" placeholder="Ulangi Password anda..." type="password" class="form-control" required>
                                                        </div>
                                                    </div> -->


                                                    <!-- <div class="form-group">
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="checkbox" id="agree" name="agree" value="agree" class="form-check-input" />
                                                                <label class="form-check-label">Please agree to our
                                                                    policy</label>
                                                            </div>
                                                        </div>
                                                    </div> -->

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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/scripts/main.07a59de7b920cd76b874.js"></script>
</body>

</html>