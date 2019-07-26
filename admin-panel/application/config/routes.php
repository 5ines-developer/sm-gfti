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
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// admin authentication
$route['login']         = 'admin/index';
$route['login/check'] 	= 'admin/form_validation';
$route['dashboard'] 	= 'admin/enter';
$route['logout'] 		= 'admin/logout';
// admin forgot password
$route['forgot/email-check']  	= 'admin/forget_password';
$route['set-password/(:any)'] 	= 'admin/add_pass/$1';
$route['update-password'] 	  	= 'admin/update_pass';
// change password
$route['change-password'] 	  	 = 'admin/change_password';
$route['update/change-password'] = 'admin/password_validation'; 
// account settings
$route['profile'] 				 = 'admin/accntsttngs';
$route['update-profile'] 		 = 'admin/updateacnt';
// Category
$route['add-category'] 		     = 'Category/index';
$route['insert-category'] 		 = 'Category/add_category';
$route['manage-category'] 		 = 'Category/manage_category';
$route['edit-category/(:any)']   = 'Category/edit_category/$1';
$route['delete-category/(:any)'] = 'Category/delete_category/$1';
// brand
$route['add-brand'] 		     = 'brand/index';
$route['insert-brand'] 		     = 'brand/add_brand';
$route['manage-brand'] 		     = 'brand/manage_brand';
$route['edit-brand/(:any)']      = 'brand/edit_brand/$1';
$route['delete-brand/(:any)']    = 'brand/delete_brand/$1';
// Product
$route['add-product'] 		     = 'Product/index';
$route['insert-product'] 		 = 'Product/add_product';
$route['manage-product'] 		 = 'Product/manage_product';
$route['delete-product/(:any)']  = 'Product/delete_product/$1';
$route['view-product/(:any)']    = 'Product/view_product/$1';
$route['delete-brand']           = 'Product/delete_brand';
$route['delete-marquee']         = 'Product/delete_marquee';
$route['edit-product/(:any)']    = 'Product/edit_product/$1';
$route['product-ratings']        = 'Product/product_ratings';
$route['escalation']             = 'Product/escalation';

$route['product-ratings/(:any)'] = 'Product/product_ratings_single/$1';
// Banner
$route['add-banner'] 		     = 'Banner/index';
$route['insert-banner'] 		 = 'Banner/add_banner';
$route['manage-banner'] 		 = 'Banner/manage_banner';
$route['delete-banner/(:any)']   = 'Banner/delete_banner/$1';
$route['edit-banner/(:any)']     = 'Banner/edit_banner/$1';
// Banner
$route['add-domain'] 		     = 'Domain/index';
$route['insert-domain'] 		 = 'Domain/add_domain';
$route['manage-domain'] 		 = 'Domain/manage_domain';
$route['delete-domain/(:any)']   = 'Domain/delete_domain/$1';
$route['edit-domain/(:any)']     = 'Domain/edit_domain/$1';
//employee
$route['manage-employee'] 		 = 'Employee/index';
$route['delete-employee/(:any)'] = 'Employee/delete_employee/$1';
$route['view-employee/(:any)']   = 'Employee/view_employee/$1';
//Orders
$route['orders'] 		         = 'Orders/index';
$route['view-order/(:any)'] 	 = 'Orders/view_order/$1';
$route['courier-status/(:any)']  = 'Orders/courier_status/$1';


//Billing address
$route['add-billing-address'] 	 = 'Billing/index';
$route['insert-billing-address'] = 'Billing/add_billing';
$route['manage-billing-address'] = 'Billing/manage_billing';
$route['delete-billing-address/(:any)'] = 'Billing/delete_billing/$1';
$route['edit-billing-address/(:any)']   = 'Billing/edit_billing/$1';
//enquiry
$route['manage-enquiry'] 	     = 'Enquiry/index';
$route['view-enquiry/(:any)']    = 'Enquiry/view_enquiry/$1';
//News letter 
$route['newsletter-subscribers'] = 'Enquiry/news_letter';
//Offers
$route['add-offers']             = 'Offers/index';
$route['insert-offers']          = 'Offers/add_offer';
$route['manage-offers']          = 'Offers/manage_offers';
$route['edit-offers/(:any)']     = 'Offers/edit_offers/$1';
$route['delete-offers/(:any)']   = 'Offers/delete_offers/$1';

