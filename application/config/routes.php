<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['users'] = 'auth/users';
$route['user_profile'] = 'auth/user_profile';

$route['dashboard'] = 'dashboard/index';

$route['borrowers/edit/(:num)'] = 'borrowers/edit/$1';
$route['borrowers/update/(:num)'] = 'borrowers/update/$1';
$route['borrowers_profile/(:num)'] = 'borrowers/borrowers_profile/$1';

$route['loan_details/(:num)'] = 'loans/loan_details/$1';

$route['create_loan'] = 'loans/create_loan';
$route['update_loan'] = 'loans/update_loan';
$route['loan_type'] = 'loans/loan_type';
$route['getLoanType'] = 'loans/getLoanType';
$route['agreement/(:num)'] = 'loans/agreement/$1';
$route['authority/(:num)'] = 'loans/authority/$1';
$route['ledger/(:num)'] = 'loans/ledger/$1';

$route['transactions'] = 'payments/transactions';
$route['reports'] = 'payments/reports';
