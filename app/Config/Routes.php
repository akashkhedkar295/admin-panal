<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 
$routes->match(['get','post'],'/LoginPage', 'Auth::Login');
// $routes->get('/LoginPage', 'Auth::index');
$routes->get('chatPage','Auth::chatApp');
$routes->get('/Logout', 'Auth::logout');
$routes->match(['get','post'],'/', 'Auth::Dashboard');
$routes->get('/Campagin','Campaign::CampaginTable');
$routes->get('/Auth/AddUser','Auth::AddUser');
$routes->match(['post','get'],'/Auth/AddCampaign','Campaign::AddCampaign');
$routes->match(['post','get'],'/Auth/UpdateUser/(:num)','Auth::UpdateUser/$1');
$routes->get('/Auth/DeleteUser/(:num)','Auth::DeleteUser/$1');
$routes->get('/Campagin/DeleteCampaign/(:num)','Campaign::DeleteCampaign/$1');
$routes->match(['post','get'],'/Campagin/UpdateCampaign/(:num)','Campaign::UpdateCampaign/$1');
$routes->post('/Auth/AddUser','Auth::AddUser');
$routes->get('/SignUpPage', 'Auth::SignUpPage');
$routes->post('/Dashboard','Auth::Login');
$routes->get('/logger_report/(:any)','Auth::logger_report/$1');
$routes->get('/call_Data/(:any)','Auth::call_Data/$1');
$routes->get('/call_filter/(:any)','Auth::filter_data/$1');
$routes->get('/download/dwn/(:any)','Auth::download_call_report/$1');
$routes->get('/downloadHourlyR/dwn/(:any)','Auth::download_summary_report/$1');



