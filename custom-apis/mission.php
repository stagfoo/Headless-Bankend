<?php 
function mission_endpoint($data ) {
$result = $data['name'];
        // WP_Query arguments
$args = array (
    'name'               	  => $data['name'],
    'post_type'               => array('mission')
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
         $result = array( 'mission' => [get_post(get_the_id())] );

    }
} else {
    $result = "no result";
}

// Restore original Post Data
wp_reset_postdata();

$result = json_decode(json_encode($result),true);
return $result;
}



function all_mission_endpoint() {
$result =  array();
        // WP_Query arguments
$args = array (
    'post_type'               => array('mission')
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $the_post = get_post(get_the_id());
        array_push($result, [
            'title' => get_the_title(),
            'id'=> $the_post->ID,
            'slug'=> $the_post->post_name,
            'content'=> $the_post->post_content,
            'mission_date'=> get_field('mission_date'),
            'background'=> get_field('background_image'),
            'logo'=> get_field('logo'),



            ]);

    }
} else {
    $result = "no result";
}

// Restore original Post Data
wp_reset_postdata();

$result = json_decode(json_encode($result),true);
return $result;
}

