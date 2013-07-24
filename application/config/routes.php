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

$route['default_controller'] = "beta/home";

/* Default Controls */
$route['redirect'] = "beta/home/populate";
$route["redirect/:any"] ="beta/home/populate";

$route['wanted'] = "beta/home/wanted";
$route["wanted/:any"] ="beta/home/wanted";

$route['finalize:any'] = "beta/payments/finalize";

$route['help'] = "beta/home/help";
$route['help/:any'] = "beta/home/help";
$route['contact-us'] = "beta/home/contact_us";

$route['legal'] = "beta/home/legal";
$route['legal:any'] = "beta/home/legal";

$route['suggest'] = "beta/home/suggest_wanted";
$route['suggest:any'] = "beta/home/suggest_wanted";


$route['forgot'] = "beta/home/forgot";
$route['goodbye'] = "beta/home/goodbye";

$route['guide'] = "beta/home/guide";
$route['pricing'] = "beta/home/pricing";

$route['facebook'] = "facebook_test";
$route['facebook/test'] = "facebook_test/test";
$route['facebook/me'] = "facebook_test/me";
$route['facebook/login'] = "facebook_test/login";
$route['facebook/logout'] = "facebook_test/logout";
$route['facebook/invite'] = "facebook_test/invite";

$route['pay'] = "beta/home/pay";
$route['pay:any'] = "beta/home/pay";

$route['cron'] = 'cron';
$route['app'] = 'app';
$route['app/:any'] = 'app';

$route['landing'] = 'main/landing';

$route['account'] = "account";
//$route['account/change-pic'] = "account/chage_pic";
$route['account:any'] = "account";

$route['hire'] = "beta/home/hire";
$route['hire:any'] = "beta/home/hire";

$route['max'] = "max";

$route['user/:any'] = "beta/home/user";
$route['agency/:any'] = "beta/home/user";
$route['company/:any'] = "beta/home/user";

$route['steps'] = "beta/home/steps";
$route['steps:any'] = "beta/home/steps";

$route['review'] ='beta/home/review';
$route['review:any'] ='beta/home/review';

$route['send'] = 'beta/home/send';
$route['send/:any'] = 'beta/home/send';

$route['view/:any'] = "beta/home/view";

$route['add'] = "beta/home/add";
$route['add:any'] = "beta/home/add";

$route['login'] = "beta/home/login";
$route['login:any'] = "beta/home/login";

$route['alternative'] = "beta/home/alternative";
$route['join'] = "beta/home/join";

$route['category/vehicles'] = "car";
$route['category/:any'] = "beta/home/category";

$route['temp_login'] ="beta/home/temp_login";
$route['temp_login:any'] = "beta/home/temp_login";

$route['get-on-mobile'] = "beta/home/mobi_send";
/* Mobile Controls */

$route['mobile'] = 'mobile';
$route['mobile/:any'] = "mobile/";

/* Lunar controls */

$route['lunar'] = 'lunar';

$route['lunar/mail'] = 'lunar/mail/';
$route['lunar/mail:any'] = 'lunar/mail/$1';

$route['lunar/help'] = 'lunar/help/';
$route['lunar/help:any'] = 'lunar/help/$1';

$route['lunar/items'] = 'lunar/items/';
$route['lunar/items:any'] = 'lunar/items/$1';

$route['lunar/settings'] = 'lunar/settings/';
$route['lunar/settings:any'] = 'lunar/settings/$1';

$route['lunar/account'] = 'lunar/account/';
$route['lunar/account:any'] = 'lunar/account/$1';

$route['logout'] = 'lunar/logout/';

/* Go Controls */

$route['go'] = 'eclipse/go';
$route['go:any'] = 'eclispe/go';


/* Search Controls */

$route['search'] = 'search';
$route['search/:any'] = 'search';

/* Cars Controller */

$route['cars'] = 'car';
$route['cars/use/:any'] = 'car/use_filter/';

$route['test'] = 's';
$route['location'] = 's/location';

/* Items Controller */

$route[':any'] = "beta/home/view/$1";


$route['404_override'] = 'error/index';


/* End of file routes.php */
/* Location: ./application/config/routes.php */