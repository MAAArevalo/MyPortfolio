<?php 

/* Register Custom Post for Works*/
function rei_register_myworks_cpt() {
  register_post_type( 'my-work', array(
      'labels'      => array(
          'name'          => __( 'My Works', 'aa-my-portfolio' ),
          'singular_name' => __( 'My Work', 'aa-my-portfolio' ),
          'menu_name'          => 'My Works',
          'name_admin_bar'     => 'My Work',
          'add_new'            => 'Add New',
          'add_new_item'       => 'Add New Work',
          'edit_item'          => 'Edit Work',
          'new_item'           => 'New Work',
          'view_item'          => 'View Work',
          'search_items'       => 'Search Works',
          'not_found'          => 'No Works found',
          'not_found_in_trash' => 'No Works found in Trash',
          'all_items'          => 'All Works',
      ),
      'public'      => true,
      'has_archive' => true,
      'supports' => ['title', 'editor', 'thumbnail'],
      'taxonomies' => ['category', 'post_tag'],
      'rewrite'     => array( 'slug' => 'my-work' ), // my custom slug
  ) );
}

add_action('init', 'rei_register_myworks_cpt');

/* Register Custom Post for Work Experience*/
function rei_register_workexp_cpt() {
  register_post_type( 'work-exp', array(
      'labels'      => array(
          'name'          => __( 'Work Experiences', 'aa-my-portfolio' ),
          'singular_name' => __( 'Work Experience', 'aa-my-portfolio' ),
          'menu_name'          => 'Work Experiences',
          'name_admin_bar'     => 'Work Experience',
          'add_new'            => 'Add New',
          'add_new_item'       => 'Add New Work Experience',
          'edit_item'          => 'Edit Work Experience',
          'new_item'           => 'New Work Experience',
          'view_item'          => 'View Work Experience',
          'search_items'       => 'Search Work Experiences',
          'not_found'          => 'No Work Experiences found',
          'not_found_in_trash' => 'No Work Experiences found in Trash',
          'all_items'          => 'All Work Experiences',
      ),
      'public'      => true,
      'has_archive' => true,
      'supports' => ['title', 'editor', 'thumbnail'],
      'taxonomies' => ['category', 'post_tag'],
      'rewrite'     => array( 'slug' => 'work-exp' ), // my custom slug
  ) );
}

add_action('init', 'rei_register_workexp_cpt');

/* Register Custom Post for Tech Tools*/
function rei_tech_tools_cpt() {
  register_post_type( 'tech-tool', array(
      'labels'      => array(
          'name'          => __( 'Tech Tools', 'aa-my-portfolio' ),
          'singular_name' => __( 'Tech Tool', 'aa-my-portfolio' ),
          'menu_name'          => 'Tech Tools',
          'name_admin_bar'     => 'Tech Tool',
          'add_new'            => 'Add New',
          'add_new_item'       => 'Add New Tech Tool',
          'edit_item'          => 'Edit Tech Tool',
          'new_item'           => 'New Tech Tool',
          'view_item'          => 'View Tech Tool',
          'search_items'       => 'Search Tech Tools',
          'not_found'          => 'No Tech Tools found',
          'not_found_in_trash' => 'No Tech Tools found in Trash',
          'all_items'          => 'All Tech Tools',
      ),
      'public'      => true,
      'has_archive' => true,
      'supports' => ['title', 'thumbnail'],
      'rewrite'     => array( 'slug' => 'tech-tool' ), // my custom slug
  ) );
}

add_action('init', 'rei_tech_tools_cpt');