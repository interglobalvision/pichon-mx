<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_igv_';

	/**
	 * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
	 */

	 // RECIPE

	 $recipe_metabox = new_cmb2_box( array(
        'id'            => 'recipe_metabox',
        'title'         => __( 'Recipe Metabox', 'cmb2' ),
        'object_types'  => array( 'recipe', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $recipe_metabox->add_field( array(
        'name'       => __( 'Ingredients', 'cmb2' ),
        'desc'       => __( '...', 'cmb2' ),
        'id'         => $prefix . 'ingredients',
        'type'       => 'text',
        'repeatable'      => true,
    ) );

    // EVENT

	 $event_metabox = new_cmb2_box( array(
        'id'            => 'event_metabox',
        'title'         => __( 'Event Metabox', 'cmb2' ),
        'object_types'  => array( 'events', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $event_metabox->add_field( array(
        'name'       => __( 'Time & Date', 'cmb2' ),
        'desc'       => __( '...', 'cmb2' ),
        'id'         => $prefix . 'date',
        'type'       => 'text_datetime_timestamp',
    ) );

    $event_metabox->add_field( array(
        'name'       => __( 'Location', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'location',
        'type'       => 'text',
    ) );

    $event_metabox->add_field( array(
        'name'       => __( 'Location link', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'location_link',
        'type'       => 'text_url',
    ) );

    $event_metabox->add_field( array(
        'name'       => __( 'Ticket link', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'ticket_link',
        'type'       => 'text_url',
    ) );

    // PRESS

	 $press_metabox = new_cmb2_box( array(
        'id'            => 'press_metabox',
        'title'         => __( 'Press Metabox', 'cmb2' ),
        'object_types'  => array( 'press', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $press_metabox->add_field( array(
        'name'       => __( 'Download PDF/file', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'file',
        'type'       => 'file',
    ) );

    // FRIEND

	 $friend_metabox = new_cmb2_box( array(
        'id'            => 'friend_metabox',
        'title'         => __( 'Contact Details', 'cmb2' ),
        'object_types'  => array( 'friend', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $friend_metabox->add_field( array(
        'name'       => __( 'Website link', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'website_link',
        'type'       => 'text_url',
    ) );

    $friend_metabox->add_field( array(
        'name'       => __( 'Email address', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'email',
        'type'       => 'text',
    ) );

    $friend_metabox->add_field( array(
        'name'       => __( 'Phone number', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'phone',
        'type'       => 'text',
    ) );

}
?>
