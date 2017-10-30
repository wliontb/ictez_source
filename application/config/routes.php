<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'blog';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dangnhap'] = 'user/login';
$route['dangky'] = 'user/register';
$route['dangxuat'] = 'user/logout';
$route['(:num)-baivietmoi'] = 'blog/newpost/$1';
$route['baiviet-(:num)'] = 'blog/displaypost/$1';
$route['baiviet-(:num)'] = 'blog/displaypost/$1';
$route['(:num)'] = 'blog/index/$1';
$route['quanly'] = 'admin/index';
$route['quanly/thembaiviet'] = 'admin/newposts';
$route['quanly/suabaiviet-(:num)'] = 'admin/editpost/$1';
$route['quanly/canhan'] = 'admin/setprofile';
$route['quanly/danhsachbaiviet'] = 'admin/listposts';
$route['quanly/danhsachthanhvien'] = 'admin/listmembers';
$route['quanly/chuyenmuc'] = 'admin/catesmanager';
$route['chuyenmuc-(:num)'] = 'blog/displaycate/$1';
$route['quanly/chuyenmuc-(:num)'] = 'admin/editcate/$1';
$route['theloai-(:num)'] = 'blog/displaytype/$1';
$route['quanly/theloai'] = 'admin/typesmanager';
$route['quanly/theloai-(:num)'] = 'admin/edittype/$1';
$route['quanly/xoabaiviet-(:num)'] = 'admin/deletepost/$1';