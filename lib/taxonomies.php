<?php

// Register Custom Taxonomy
function ingredient_taxonomy() {

	$labels = array(
		'name'                       => 'Ingredients',
		'singular_name'              => 'Ingredient',
		'menu_name'                  => 'Ingredients',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Item Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'ingredient', array( 'recipe' ), $args );

}
add_action( 'init', 'ingredient_taxonomy', 0 );

// Register Custom Taxonomy
function recipe_category() {

	$labels = array(
		'name'                       => 'Recipe Categories',
		'singular_name'              => 'Recipe Category',
		'menu_name'                  => 'Recipe Category',
		'all_items'                  => 'All Recipe Categories',
		'parent_item'                => 'Parent Recipe Category',
		'parent_item_colon'          => 'Parent Recipe Category:',
		'new_item_name'              => 'New Recipe Category',
		'add_new_item'               => 'Add Recipe Category',
		'edit_item'                  => 'Edit Recipe Category',
		'update_item'                => 'Update Recipe Category',
		'view_item'                  => 'View Recipe Category',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Recipe Categories',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
		'items_list_navigation'      => 'Items list navigation',
	);
	$rewrite = array(
		'slug'                       => 'recipe-category',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'recipe_category', array( 'recipe' ), $args );

}
add_action( 'init', 'recipe_category', 0 );