<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'p';
$route['login']                 = 'auth/index';
$route['invoice']               = 'member/transaksi/invoice';


$route['affiliate']             = 'reg/affiliate/0';

$route['pembelian']             = 'p/b/0/1';
$route['daftar']                = 'p/b/0/1';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
