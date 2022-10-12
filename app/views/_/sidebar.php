<div class="app-sidebar-wrapper">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="maxifit.id" class="logo-src"></a>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <div class="scrollbar-sidebar scrollbar-container">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">

                    <?php if ($this->session->userdata('log_admin') == TRUE) { ?>

                        <li><a href="<?php echo base_url('admin') ?>" class="<?php if ($page == 'dashboard') {
                                                                                        echo "mm-active";
                                                                                    } ?>"><i class="metismenu-icon pe-7s-rocket"></i>Dashboard</a></li>
                        <li><a href="<?php echo base_url('admin/member/all') ?>" class="<?php if ($page == 'member') {
                                                                                                echo "mm-active";
                                                                                            } ?>"><i class="metismenu-icon pe-7s-users"></i>Member</a></li>
                        <li><a href="<?php echo base_url('admin/produk/all') ?>" class="<?php if ($page == 'produk') {
                                                                                                echo "mm-active";
                                                                                            } ?>"><i class="metismenu-icon pe-7s-ticket"></i>Produk</a></li>
                        <li><a href="<?php echo base_url('admin/transaksi/all') ?>" class="<?php if ($page == 'transaksi') {
                                                                                                    echo "mm-active";
                                                                                                } ?>"><i class="metismenu-icon pe-7s-cart"></i>Transaksi</a></li>
                        <li><a href="<?php echo base_url('admin/laporan') ?>" class="<?php if ($page == 'laporan') {
                                                                                                echo "mm-active";
                                                                                            } ?>"><i class="metismenu-icon pe-7s-graph2"></i>Laporan</a></li>
                        <li><a href="<?php echo base_url('admin/komisi') ?>" class="<?php if ($page == 'komisi') {
                                                                                            echo "mm-active";
                                                                                        } ?>"><i class="metismenu-icon pe-7s-credit"></i>Komisi</a></li>
                        <?php
                        } else {

                            if ($this->session->userdata('log_level') == 2) {
                                ?>

                            <li><a href="<?php echo base_url('member') ?>" class="<?php if ($page == 'dashboard') {
                                                                                                echo "mm-active";
                                                                                            } ?>"><i class="metismenu-icon pe-7s-rocket"></i>Dashboard</a></li>
                            <li><a href="<?php echo base_url('member/link') ?>" class="<?php if ($page == 'link') {
                                                                                                    echo "mm-active";
                                                                                                } ?>"><i class="metismenu-icon pe-7s-link"></i>Link</a></li>
                            <li><a href="<?php echo base_url('member/distributor') ?>" class="<?php if ($page == 'distributor') {
                                                                                                            echo "mm-active";
                                                                                                        } ?>"><i class="metismenu-icon pe-7s-network"></i>Distributor</a></li>
                            <li><a href="<?php echo base_url('member/pembelian') ?>" class="<?php if ($page == 'pembelian') {
                                                                                                        echo "mm-active";
                                                                                                    } ?>"><i class="metismenu-icon pe-7s-cart"></i>Pembelian</a></li>
                            <li><a href="<?php echo base_url('member/komisi') ?>" class="<?php if ($page == 'komisi') {
                                                                                                        echo "mm-active";
                                                                                                    } ?>"><i class="metismenu-icon pe-7s-credit"></i>Komisi</a></li>
                        <?php
                            } else { ?>

                            <li><a href="<?php echo base_url('member') ?>" class="<?php if ($page == 'dashboard') {
                                                                                                echo "mm-active";
                                                                                            } ?>"><i class="metismenu-icon pe-7s-rocket"></i>Dashboard</a></li>
                            <li><a href="<?php echo base_url('member/link') ?>" class="<?php if ($page == 'link') {
                                                                                                    echo "mm-active";
                                                                                                } ?>"><i class="metismenu-icon pe-7s-link"></i>Link</a></li>
                            <li><a href="<?php echo base_url('member/pembelian') ?>" class="<?php if ($page == 'pembelian') {
                                                                                                        echo "mm-active";
                                                                                                    } ?>"><i class="metismenu-icon pe-7s-cart"></i>Pembelian</a></li>
                    <?php
                        }
                    } ?>

                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="metismenu-icon pe-7s-power"></i>Logout (<?php echo $this->session->userdata('log_user') ?>)</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>



<div class="app-sidebar-overlay d-none animated fadeIn"></div>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="header-mobile-wrapper">
            <div class="app-header__logo">
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="maxifit.id" class="logo-src"></a>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>