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

    $ingredient_group = $recipe_metabox->add_field( array(
        'id'          => $prefix . 'ingredient_group',
        'type'        => 'group',
        'description' => __( 'Select ingredient from drop-down. Wrap ingredient **name** in text with double asterix to indicate what should be linked to the ingredient\'s archive.', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Ingredient {#}', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => __( 'Add Another Ingredient', 'cmb2' ),
            'remove_button' => __( 'Remove Ingredient', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    $recipe_metabox->add_group_field( $ingredient_group, array(
        'name'             => __( 'Ingredient', 'cmb2' ),
        'desc'             => __( '', 'cmb2' ),
        'id'               => 'ingredient',
        'type'             => 'select',
        'show_option_none' => true,
        'options'          => cmb2_get_term_options('ingredient'),
    ) );

    $recipe_metabox->add_group_field( $ingredient_group, array(
        'name' => __( 'English', 'cmb2' ),
        'id'   => 'english',
        'type' => 'text',
    ) );

    $recipe_metabox->add_group_field( $ingredient_group, array(
        'name' => __( 'Español', 'cmb2' ),
        'id'   => 'espanol',
        'type' => 'text',
    ) );

	 // PAGE

	 $page_metabox = new_cmb2_box( array(
        'id'            => 'page_metabox',
        'title'         => __( 'Page Metabox', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
    ) );

    $page_metabox->add_field( array(
        'name'       => __( 'Sidebar', 'cmb2' ),
        'desc'       => __( 'optional sidebar content', 'cmb2' ),
        'id'         => $prefix . 'sidebar',
        'type'       => 'wysiwyg',
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
        'name'       => __( 'External link', 'cmb2' ),
        'desc'       => __( '(optional)', 'cmb2' ),
        'id'         => $prefix . 'link',
        'type'       => 'text',
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

add_action( 'cmb2_admin_init', 'igv_cmb_taxonomy_metaboxes' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function igv_cmb_taxonomy_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_igv_';

    /**
     * Metabox to add fields to categories and tags
     */
    $ingredient_metabox = new_cmb2_box( array(
        'id'               => $prefix . 'ingredient_metabox',
        'title'            => __( 'Ingredient Options', 'cmb2' ), // Doesn't output for term boxes
        'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
        'taxonomies'       => array( 'ingredient', ), // Tells CMB2 which taxonomies should have these fields
        // 'new_term_section' => true, // Will display in the "Add New Category" section
    ) );

    $ingredient_metabox->add_field( array(
        'name'     => __( 'Español', 'cmb2' ),
        'desc'     => __( 'optional', 'cmb2' ),
        'id'       => $prefix . 'ingredient_name_es',
        'type'     => 'text',
    ) );

}
?>
