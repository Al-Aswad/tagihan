<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'loginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//login
$route['login'] = 'loginController/aksi';
$route['keluar'] = 'loginController/keluar';

//admin
$route['home'] = 'homeController';
$route['upload'] = 'uploadController';
$route['upload-cod'] = 'uploadController/cod';
$route['upload-cash'] = 'uploadController/cash';
$route['home/belum-setor'] = 'setorController/belum_setor';
$route['home/sudah-setor'] = 'setorController/sudah_setor';
$route['home/belum-setor-th/(:any)'] = 'setorController/belum_setor_th/$1';
$route['home/sudah-setor-th/(:any)'] = 'setorController/sudah_setor_th/$1';

$route['tagihan'] = 'tagihanController';

$route['setoran'] = 'setoranController';

$route['history'] = 'historyController';

// admin
$route['admin'] = 'adminController';
$route['setor/(:num)'] = 'setorController/setor/$1';
$route['setor-bulk'] = 'setorController/setor_bulk';
$route['batal-setor/(:num)'] = 'setorController/batal_setor/$1';
$route['setoran-kurir'] = 'setoranController/setoran_kurir';
$route['setoran-finance'] = 'setoranController/setoran_finance';
$route['setoran-cek/(:any)'] = 'setoranController/setoran_cek/$1';
$route['admin-setor/(:any)'] = 'setoranController/setor_to_finance/$1';
$route['admin-setor-aksi'] = 'setoranController/aksi';
$route['tagihan-th'] = 'tagihanController/th';

//pengguna
$route['pengguna'] = 'penggunaController';
$route['pengguna-tambah'] = 'penggunaController/tambah';
$route['pengguna-edit'] = 'penggunaController/edit';
$route['pengguna-hapus'] = 'penggunaController/hapus';
