<?php
//Supports
add_theme_support( 'post-thumbnails' );

//helper functions
include('libs/CPT.php');
include('libs/function-set_endpoint.php');

//Post Types
$missions = new CPT('mission');

//Callback Functions
//use this to call whatever you would like for the engpoint.
include('callback/menu.php'); 
include('callback/mission.php'); 

//Endpoints - Defind custom endpoints
set_endpoint('headless','mission','(?P<id>\d+)','mission_callback');


 ?>