<?php
//Supports
add_theme_support( 'post-thumbnails' );

//Post Types
include('custom-post-types/missions.php'); 

//APIs (Endpoints)
include('custom-apis/menu.php'); //headless/menu/[id]
include('custom-apis/mission.php'); //headless/mission/[id]




 ?>