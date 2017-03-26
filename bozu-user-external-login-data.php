<?php
/*
Plugin Name: Bozu User External Login Data
Plugin URI:  https://github.com/fcojgodoy/Bozu-User-External-Login-Data
Description: Add custom external login data (url, username and password) on users profile page. 
Version:     0.0.1-dev
Author:      fcojgodoy
Author URI:  https://github.com/fcojgodoy/
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: bozuueld
Domain Path: /languages

Bozu User Contact Methods is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

Bozu User Contact Methods is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Bozu User Contact Methods. If not, see https://github.com/fcojgodoy/Bozu-User-External-Login-Data


/**
 * Show custom user profile fields
 * @param  obj $user The user object.
 * @return void
 */
function bozu_user_external_login_data($user) {

?>

<h3><?php _e('Your WordPress site information', 'bozuueld') ?></h3>

<table class="form-table">

<tr>
	<th>
		<label for="bueld-wp-url"><?php _e('Web URL', 'bozuueld'); ?></label>
	</th>
	<td>
		<input type="url" name="bueld-wp-url" id="bueld-wp-url" value="<?php echo esc_attr( get_the_author_meta( 'bueld-wp-url', $user->ID ) ); ?>" class="regular-text" />
		<br><span class="description"><?php _e('Your WordPress URL', 'bozuueld'); ?></span>
	</td>
</tr>

<tr>
	<th>
		<label for="bueld-wp-user"><?php _e('Admin username', 'bozuueld'); ?></label>
	</th>
	<td>
		<input type="text" name="bueld-wp-user" id="bueld-wp-user" value="<?php echo esc_attr( get_the_author_meta( 'bueld-wp-user', $user->ID ) ); ?>" class="regular-text" />
		<br><span class="description"><?php _e('Your WordPress administrator username', 'bozuueld'); ?></span>
	</td>
</tr>

<tr>
	<th>
		<label for="bueld-wp-pass"><?php _e('Admin password', 'bozuueld'); ?></label>
	</th>
	<td>
		<input type="text" name="bueld-wp-pass" id="bueld-wp-pass" value="<?php echo esc_attr( get_the_author_meta( 'bueld-wp-pass', $user->ID ) ); ?>" class="regular-text" />
		<br><span class="description"><?php _e('Your WordPress administrator password', 'bozuueld'); ?></span>
		<br><span class="description"><?php _e('Do not worry about the security of your password. It will be treated with all the security that is required.', 'bozuueld'); ?></span>
	</td>
</tr>

</table>

<?php

}

add_action('show_user_profile', 'bozu_user_external_login_data');
add_action('edit_user_profile', 'bozu_user_external_login_data');

// Hook is used to save custom fields that have been added to the WordPress profile page (if current user) 
add_action( 'personal_options_update', 'bozu_update_user_external_login_data' );

// Hook is used to save custom fields that have been added to the WordPress profile page (if not current user) 
add_action( 'edit_user_profile_update', 'bozu_update_user_external_login_data' );

function bozu_update_user_external_login_data( $user_id ) {
    if ( current_user_can( 'edit_user', $user_id ) )
        update_user_meta( $user_id, 'bueld-wp-url', $_POST['bueld-wp-url'] );
        update_user_meta( $user_id, 'bueld-wp-user', $_POST['bueld-wp-user'] );
        update_user_meta( $user_id, 'bueld-wp-pass', $_POST['bueld-wp-pass'] );
}

?>
