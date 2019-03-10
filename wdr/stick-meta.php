<?php

/**
 * Register a meta box using a class.
 */
class WPDocs_Custom_Meta_Box {

    /**
     * Constructor.
     */
    public function __construct() {
        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }

    }

    /**
     * Meta box initialization.
     */
    public function init_metabox() {
        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
    }

    /**
     * Adds the meta box.
     */
    public function add_metabox() {
        add_meta_box(
            'my-meta-box',
            __( '商品販售情形', 'textdomain' ),
            array( $this, 'render_metabox' ),
            'stick',
            'side',
            'default'
        );
    }


    /**
     * Renders the meta box.
     */
    public function render_metabox( $post ) {
        // Add nonce for security and authentication.
        wp_nonce_field( 'custom_nonce_action', 'custom_nonce' );
        $value = get_post_meta(  $post->ID, '_my_meta_sale_status');
        if($value){
          $mkey = $value[0];
        }else{
          $mkey = 1;
        }
        ?>

        <select  name="my_meta_sale_status" id="myplugin_new_field">
          <option value="1" <?php if($mkey==1){ echo "selected";} ?> >販售中</option>
          <option value="0" <?php if($mkey==0){ echo "selected";} ?> >已停售</option>
        </select>
        <?php
    }

    /**
     * Handles saving the meta box.
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post    Post object.
     * @return null
     */
    public function save_metabox( $post_id, $post ) {
        // Add nonce for security and authentication.
        $nonce_name   = isset( $_POST['custom_nonce'] ) ? $_POST['custom_nonce'] : '';
        $nonce_action = 'custom_nonce_action';

        // Check if nonce is set.
        if ( ! isset( $nonce_name ) ) {
            return;
        }

        // Check if nonce is valid.
        if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
            return;
        }

        // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }

        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        // Sanitize the user input.
        $mydata = sanitize_text_field( $_POST['my_meta_sale_status'] );

        // Update the meta field.
        update_post_meta( $post_id, '_my_meta_sale_status', $mydata );

    }
}

new WPDocs_Custom_Meta_Box();
