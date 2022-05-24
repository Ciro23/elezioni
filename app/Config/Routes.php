<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Signup');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Signup::index');

$routes->get(
    "/", 
    "Home::index",
    [
        "filter" => "can_login_or_signup",
        "as" => "home",
    ],
);

$routes->group(
    "signup",
    [
        "filter" => "can_login_or_signup",
    ],
    function ($routes) {
        $routes->get("", "Signup::index");
        $routes->post("", "Signup::signup");
        $routes->get("send-email/(:segment)", "EmailVerification::sendEmail/$1");
        $routes->get("verificate-email/(:segment)", "EmailVerification::verificate/$1");
    }
);

$routes->group(
    "login",
    [
        "filter" => "can_login_or_signup",
    ],
    function ($routes) {
        $routes->get("", "Login::index");
        $routes->post("", "Login::login");
    }
);

$routes->get("logout", "Login::logout");

$routes->group(
    "vote",
    [
        "filter" => "is_logged_in",
    ],
    function ($routes) {
    $routes->get(
        "",
        "Vote::index",
        ["as" => "vote"],
    );

    $routes->post("", "Vote::vote");
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
