<?php 
/*==========================================
=            Call back Missions            =
==========================================*/
function mission_callback( $data ) {
        $args;
        if(isset( $data['id'])){
            $args = array (
                'post_type'              => array( 'mission' ),
                'p' => $data['id']
            );
        } else {
            $args = array (
                'post_type'              => array( 'mission' ),
            );
        }
$result = Array();
// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
    array_push($result,get_post());
    }
} else {
    $result = false;
}

// Restore original Post Data
wp_reset_postdata(); 
$result = json_decode(json_encode($result),true);
return $result;
}


 ?>