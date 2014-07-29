<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "welcome";
//$route['404_override'] = '';
$route['^(en|fr|jp|al)/page/listing-grid-filter'] = 'immobilier/immobilier/listGrid';
$route['^(en|fr|jp|al)/home-page'] = 'immobilier/immobilier/pageHomeGrid';

$route['^(en|fr|jp|al)/accueil'] = 'immobilier/immobilier/pageHomeGrid';
$route['^(en|fr|jp|al)/list-property'] = 'immobilier/immobilier';
$route['^(en|fr|jp|al)/list-agent'] = 'immobilier/immobilier/getListAgent';
$route['^(en|fr|jp|al)/immobilier/add'] = 'immobilier/immobilier/add';
$route['^(en|fr|jp|al)/immobilier/amenity/ajax'] = 'immobilier/immobilier/amenitiesAjax';
$route['^(en|fr|jp|al)/immobilier/detail/(.+)$'] = 'immobilier/immobilier/detailImmo/$2';

$route['default_controller'] = 'immobilier/immobilier/pageHomeGrid';
$route['^(en|fr|jp|al)'] = 'immobilier/immobilier/pageHomeGrid';

$route['^(en|fr|jp|al)/not_authorized'] = 'pages/not_authorized';
$route['^(en|fr|jp|al)/upload'] = 'upload/upload';
$route['^(en|fr|jp|al)/crop'] = 'upload/upload/crop';

$route['^(en|fr|jp|al)/agence/(.+)$'] = 'agence/agence/$2';
$route['^(en|fr|jp|al)/admin/user/add'] = 'user/user/register/admin';
$route['^(en|fr|jp|al)/admin/immobilier/add'] = 'immobilier/immobilier/add';
$route['^(en|fr|jp|al)/admin/immobilier/list'] = 'admin/admin/listImmoByAgence';
$route['^(en|fr|jp|al)/admin/user/list'] = 'admin/admin/getListUser';
$route['^(en|fr|jp|al)/admin/agence/list'] = 'admin/admin/getListAgence';
$route['^(en|fr|jp|al)/admin/detail/(.+)$'] = 'admin/admin/detailImmoByAgence/$2';
$route['^(en|fr|jp|al)/user/(.+)$'] = 'user/user/$2';
$route['^(en|fr|jp|al)/admin'] = 'admin/admin/index';
$route['^(en|fr|jp|al)/fokotany/ajax'] = 'immobilier/immobilier/listAjax';
$route['^(en|fr|jp|al)/page/maps'] = 'immobilier/immobilier/pageMap';
$route['^(en|fr|jp|al)/page/(.+)$'] = 'accueil/accueil/accueilpage/$2';
$route['(:any)'] = 'pages/view/$2';

//$route['page/(:num)'] = 'accueil/accueil/accueilpage/$1';




/* End of file routes.php */
/* Location: ./application/config/routes.php */