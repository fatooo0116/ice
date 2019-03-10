<?php
/*
 *       Email  actived   信件認證  註冊兩個變數在 user meta 中
 */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Email actived</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">否啟用此帳號</label></th>

			<td>
				<input type="text" name="is_activated" id="is_activated" value="<?php echo esc_attr( get_the_author_meta( 'is_activated', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">是否已通過 Email 確認啟用</span>
			</td>
		</tr>


    <tr>
			<th><label for="twitter">啟用碼</label></th>

			<td>
				<input type="text" name="activationcode" id="activationcode" value="<?php echo esc_attr( get_the_author_meta( 'activationcode', $user->ID ) ); ?>" class="regular-text" /><br />				<!--  -->
			</td>
		</tr>


	</table>
<?php }


add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'is_activated', $_POST['is_activated'] );
}


 ?>
