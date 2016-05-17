<?php
//Supports
add_theme_support( 'post-thumbnails' );

//helper functions
include('libs/CPT.php');
include('libs/function-set_endpoint.php');

//Post Types
$missions = new CPT('mission');

//APIs (Endpoints)
include('custom-apis/menu.php'); //headless/menu/[id]
include('custom-apis/mission.php'); //headless/missions/[slug]
include('custom-apis/pages.php'); //headless/pages/[slug]

function theme_endpoints() {
    register_rest_route( 'headless/', '/missions', array(
        'methods' => 'GET',
        'callback' => 'all_mission_endpoint',
    ) );
    register_rest_route( 'headless/', '/mission/(?P<name>[a-z0-9\-]+)', array(
        'methods' => 'GET',
        'callback' => 'mission_endpoint',
    ) );
} 
function register_page_templates() {
    $page_templates = [
     'page-home.php' => 'Home',
     'page-cheesecake.hbs' => 'Cheesecake',

     'page-about.php' => 'About',
    'page-contact.php' => 'Contact'
];
return $page_templates;
};
add_filter( 'theme_page_templates', 'register_page_templates', 20, 3 );






add_action( 'rest_api_init', 'theme_endpoints');

 ?>