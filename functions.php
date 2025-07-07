<?php

//Theme Setup
function rei_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
  add_theme_support('custom-logo'); // Optional
}

add_action('after_setup_theme', 'rei_theme_setup');

//Enqueue Assets
function rei_enqueue_assets() {
  // Styles
  wp_enqueue_style('rei-style', get_stylesheet_uri());
  wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/main.css');

  // Scripts
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', [], null, true);
  wp_enqueue_script('scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', ['gsap'], null, true);
  wp_enqueue_script('rei-script', get_template_directory_uri() . '/assets/js/main.js', ['scroll-trigger'], null, true);
}
add_action('wp_enqueue_scripts', 'rei_enqueue_assets');

//Register Custom Post for Works
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

/*Add Fields to myworks CPT for project links */

function fields_block(){
    add_meta_box(
      'works_proj_link',            // Unique ID
      'Project Link',      // Title
      'works_field',          // Function to display fields
      'my-work'   // Post type
    );
}
add_action( 'add_meta_boxes', 'fields_block' );

function works_field($post){
  wp_nonce_field('works_link_save_meta_box', 'works_link_meta_box_nonce');
  
  $project_link = sanitize_text_field( get_post_meta( $post->ID, '_works_proj_link', true ) );
?>
  <input style="width: 100%;" type="text" placeholder="Add Project Link" name="proj_link" id="proj_link" value="<?php echo esc_attr( $project_link ); ?>">

<?php
}

function save_fields($post_id){

//Security check
  if(!isset($_POST['works_link_meta_box_nonce']) || !wp_verify_nonce( $_POST['works_link_meta_box_nonce'], 'works_link_save_meta_box' )){
      return;
  }

  //Stop Autosave
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
      return;
  }

  //Stop if not allowed to edit
  if(!current_user_can( 'edit_post', $post_id )){
      return;
  }

  if(isset($_POST['proj_link'])):
    update_post_meta( $post_id, '_works_proj_link', sanitize_text_field( $_POST['proj_link'] ) );
  endif;
}
add_action( 'save_post', 'save_fields' );