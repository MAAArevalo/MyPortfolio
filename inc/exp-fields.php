<?php 

/*Add Fields to myworks CPT for project links */

function rei_exp_fields_block(){
    add_meta_box(
      'exp_date',            // Unique ID
      'Work Experience Date',      // Title
      'rei_exp_date_field',          // Function to display fields
      'work-exp'   // Post type
    );
}
add_action( 'add_meta_boxes', 'rei_exp_fields_block' );


function rei_exp_date_field($post){
    wp_nonce_field('exp_save_meta_box', 'exp_meta_box_nonce');
  
    $exp_date_from = sanitize_text_field( get_post_meta( $post->ID, '_exp_from', true ) );
    $exp_date_to = sanitize_text_field( get_post_meta( $post->ID, '_exp_to', true ) );
?>  
    <label for="exp_date_from">Date From</label>
    <input style="width: 100%;" type="month" min="2019-01" max="2040-12" name="exp_date_from" id="exp_date_from" value="<?php echo esc_attr( $exp_date_from ); ?>">

    <label for="exp_date_to">Date To (Leave Blank if Present)</label>
    <input style="width: 100%;" type="month" min="2019-01" max="2040-12" name="exp_date_to" id="exp_date_to" value="<?php echo esc_attr( $exp_date_to ); ?>">

<?php
}

function rei_exp_save_fields($post_id){

//Security check
    if(!isset($_POST['exp_meta_box_nonce']) || !wp_verify_nonce( $_POST['exp_meta_box_nonce'], 'exp_save_meta_box' )){
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

    if(isset($_POST['exp_date_from'])):
        update_post_meta( $post_id, '_exp_from', sanitize_text_field( $_POST['exp_date_from'] ) );
    endif;

    if(isset($_POST['exp_date_to'])):
        update_post_meta( $post_id, '_exp_to', sanitize_text_field( $_POST['exp_date_to'] ) );
    endif;
}
add_action( 'save_post', 'rei_exp_save_fields' );