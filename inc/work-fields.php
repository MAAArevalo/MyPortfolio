<?php 

/*Add Fields to myworks CPT for project links */

function rei_fields_block(){
    add_meta_box(
      'works_proj_link',            // Unique ID
      'Project Link',      // Title
      'rei_works_field',          // Function to display fields
      'my-work'   // Post type
    );
}
add_action( 'add_meta_boxes', 'rei_fields_block' );


function rei_works_field($post){
  wp_nonce_field('works_link_save_meta_box', 'works_link_meta_box_nonce');
  
  $project_link = sanitize_text_field( get_post_meta( $post->ID, '_works_proj_link', true ) );
?>
  <input style="width: 100%;" type="text" placeholder="Add Project Link" name="proj_link" id="proj_link" value="<?php echo esc_attr( $project_link ); ?>">

<?php
}

function rei_save_fields($post_id){

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
add_action( 'save_post', 'rei_save_fields' );