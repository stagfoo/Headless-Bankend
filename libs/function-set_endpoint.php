<?php 
function set_endpoint($baseurl,$objecturl,$arg,$callback_func){
add_action( 'rest_api_init', function () {
    register_rest_route( $baseurl, $objecturl.'/'.$arg, array(
        'methods' => 'GET',
        'callback' => $callback_func,
    ) );
} );
}


 ?>