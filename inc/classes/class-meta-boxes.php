<?php

/**register meta boxes
 * 
 * 
 * 
 * @package Teacher
*/

namespace TEACHER_THEME\Inc;
use TEACHER_THEME\Inc\Traits\Singleton;

class Meta_Boxes{

    use Singleton;
    protected function __construct(){
        //load class.
        $this->setup_hooks();
    }


    protected function setup_hooks(){
        //actions and filters
        /**Actions
         * 
         */
    
        add_action('add_meta_boxes',[$this,'add_custom_meta_box']);
        add_Action( 'save_post',[$this,'save_post_meta_data']);
    }

    public function add_custom_meta_box($post){

        $screens = [ 'post' ];
	    foreach ( $screens as $screen ) {
            add_meta_box(
                'hide-page-title',                 // Unique ID
                __('Hide page title','Teacher'),      // Box title
                [$this,'custom_meta_box_html'],  // Content callback, must be of type callable
                $screen ,                       // Post type
                'side'                           //context       
            );
        }

    }

    public function custom_meta_box_html( $post ) {

		$value = get_post_meta( $post->ID, '_hide_page_title', true );
        /** Use nonce for verification */

        wp_nonce_field(plugin_basename(__FILE__),'hide_title_meta_box_nonce_name');
		?>
		<label for="teacher-field"><?php esc_html_e( 'Hide the page title', 'Teacher' ); ?></label>
		<select name="teacher_hide_title_field" id="teacher-field" class="postbox">
			<option value=""><?php esc_html_e( 'Select', 'Teacher' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'Teacher' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'Teacher' ); ?>
			</option>
		</select>
		<?php
	}



    public function save_post_meta_data($post_id){


        /** when post is updated or saved, we get $_POST available.
         * check if current user authorized
         */
        if(!current_user_can('edit_post',$post_id)){
            return;
        }
        //check if nonce value received is same that we created.
        if(!isset($_POST['hide_title_meta_box_nonce_name']) ||  
                !wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'],plugin_basename(__FILE__))){

                    return;


                }

        if ( array_key_exists( 'teacher_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['teacher_hide_title_field']
            );
        }

    }
}
