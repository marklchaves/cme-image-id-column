<?php
/**
 * Plugin Name: caught my eye Sortable Image ID Column
 * Plugin URI: https://github.com/marklchaves/cme-image-id-column/
 * Description: Create a custom sortable image ID column on the Media Library page.
 * Author URI: https://www.caughtmyeye.cc/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CME_IMAGE_ID_COLUMN
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Credits
 * 
 * Based on code from Piippin's Plugins blog and
 * Stephen Harris tutorial on Envato Tuts.
 */

 /**
 * Display the internal unique image ID
 * on the wp-admin Media Library page.
 */

// Add the Image ID Column
function caughtmyeye_add_image_id_column($columns) {
    $columns['image_id'] = 'Image ID';
    return $columns;
}
add_filter('manage_media_columns', 'caughtmyeye_add_image_id_column');
 
// Display the Image ID Column
function caughtmyeye_show_image_id_column_content($value, $column_name, $image_id) {
	if ( 'image_id' == $column_name )
		return $image_id;
    return $value;
}
add_action('manage_media_custom_column',  'caughtmyeye_show_image_id_column_content', 10, 3);

// Support Sorting
function caughtmyeye_sortable_image_id_column( $columns ) {
    $columns['image_id'] = 'Image ID';
 
    // To make a column 'un-sortable' remove it from the array
    // e.g., unset($columns['date']);
 
    return $columns;
}
add_filter( 'manage_media_sortable_columns', 'caughtmyeye_sortable_users_id_column' );
