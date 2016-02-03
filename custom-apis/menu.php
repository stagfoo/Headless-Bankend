<?php 

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}
$menu_id;
$menu_slug = 'primary';
$locations = get_nav_menu_locations();

if (isset($locations[$args->theme_location])) {
    $menu_id = $locations[$args->theme_location];
}

function menu_endpoint( $data ) {
$args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false );
  
  $menu = wp_get_nav_menu_items( $data['id'], $args );
  $fallback_menu = wp_get_nav_menu_items( '2', $args );
  
  $menu = json_decode(json_encode($menu),true);
  $fallback_menu = json_decode(json_encode($fallback_menu),true);
  
   if($menu != false){
    $menu = $menu;
  } else {
     $menu =  $fallback_menu;
  };
  
 
  for ($i=0; $i < sizeof($menu); $i++) { 
        unset($menu[$i]['post_password']);
             unset($menu[$i]['post_name']);
             unset($menu[$i]['to_ping']); 
             unset($menu[$i]['pinged']);
             unset($menu[$i]['post_modified']);
             unset($menu[$i]['post_modified_gmt']);
             unset($menu[$i]['post_content_filtered']);
             unset($menu[$i]['post_parent']);
            unset($menu[$i]['post_mime_type']);
            unset($menu[$i]['comment_count']);
            unset($menu[$i]['filter']);
            unset($menu[$i]['object']);
            unset($menu[$i]['type']);
            unset($menu[$i]['post_date']);
            unset($menu[$i]['post_date_gmt']);     
    
    $menu[$i]['template'] = split('.php',get_page_template_slug($menu[$i]['object_id']))[0];

  }

  
  
  
  

  //if the id would return nothing - return the default menu
return $menu;
     };

add_action( 'rest_api_init', function () {
    register_rest_route( 'headless/', '/menu/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'menu_endpoint',
    ) );
} );
?>