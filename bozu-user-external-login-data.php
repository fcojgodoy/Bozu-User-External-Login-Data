/**
 * Show custom user profile fields
 * @param  obj $user The user object.
 * @return void
 */
function numediaweb_custom_user_profile_fields($user) {
?>

<table class="form-table">


<tr>
	<th>
		<label for="bueld-wp-url"><?php _e('Web URL', 'bueld'); ?></label>
	</th>
	<td>
		<input type="url" name="bueld-wp-url" id="bueld-wp-url" value="<?php echo esc_attr( get_the_author_meta( 'bueld-wp-url', $user->ID ) ); ?>" class="regular-text" />
		<br><span class="description"><?php _e('Your WordPress URL', 'bueld'); ?></span>
	</td>
</tr>

<tr>
	<th>
		<label for="bueld-wp-user"><?php _e('Admin username', 'bueld'); ?></label>
	</th>
	<td>
		<input type="text" name="bueld-wp-user" id="bueld-wp-user" value="<?php echo esc_attr( get_the_author_meta( 'bueld-wp-user', $user->ID ) ); ?>" class="regular-text" />
		<br><span class="description"><?php _e('Your WordPress administrator username', 'bueld'); ?></span>
	</td>
</tr>

<tr>
	<th>
		<label for="bueld-wp-pass"><?php _e('Admin password', 'bueld'); ?></label>
	</th>
	<td>
		<input type="password" name="bueld-wp-pass" id="bueld-wp-pass" value="<?php echo esc_attr( get_the_author_meta( 'bueld-wp-pass', $user->ID ) ); ?>" class="regular-text" />
		<br><span class="description"><?php _e('Your WordPress administrator password', 'bueld'); ?></span>
		<br><span class="description"><?php _e('Do not worry about the security of your password. It will be treated with all the security that is required.', 'bueld'); ?></span>
	</td>
</tr>

</table>

<?php
}
add_action('show_user_profile', 'numediaweb_custom_user_profile_fields');
add_action('edit_user_profile', 'numediaweb_custom_user_profile_fields');
