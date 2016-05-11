<?php 
function page_endpoint( $data ) {
$result;
        // WP_Query arguments
$args = array (
    'pagename'               => $data['name'],
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $result = array( 'page' => [get_post(get_the_id())] );
    }
} else {
    $result = "no result";
}

// Restore original Post Data
wp_reset_postdata();

$result = json_decode(json_encode($result),true);
return $result;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'headless/', 'pages/(?P<name>[a-z0-9\-]+)', array(
        'methods' => 'GET',
        'callback' => 'page_endpoint',
    ) );
} );
 ?>