<?php
/**
 * Options Page For License Activation
 *
 * @package   Quick_Featured_Images_Pro_Licensing
 * @author    Martin Stehle <m.stehle@gmx.de>
 * @license   GPL-2.0+
 * @link      http://quickfeaturedimages.com/
 * @copyright 2015
 */


if ( ! $license_data ) {
?>
<p><strong>Something went wrong while checking the license:</strong>. Feel free to <a href="http://www.quickfeaturedimages.com/contact/">contact the plugin author</a>.</p>
<?php
}
?>
<h3><?php _e( 'License Settings', $this->plugin_slug ); ?></h3>
<form method="post" action="options.php">
<?php settings_fields( $this->settings_fields_slug); ?>
	<table class="form-table">
		<tbody>
			<tr>	
				<th scope="row">
					<label for="<?php echo $this->license_key_option_name; ?>"><?php _e( 'License Key', $this->plugin_slug ); ?></label>
				</th>
				<td>
					<input id="<?php echo $this->license_key_option_name; ?>" name="<?php echo $this->license_key_option_name; ?>" type="text" class="regular-text" value="<?php esc_attr_e( $license_key ); ?>" />
					<p class="description"><?php _e( 'Enter your license key. Then click on the button.', $this->plugin_slug ); ?></p>
				</td>
			</tr>
<?php 
if ( ! empty( $license_key ) ) {
?>
			<tr>	
				<th scope="row">
					<?php _e( 'Licence Status', $this->plugin_slug ); ?>
				</th>
				<td>
<?php 	
	// print feedback
	if ( 'valid' == $license_status ) {
?>
					<p class="qfi_valid"><?php echo $msg;?></p>
					<p><?php  /* translation: 1: date, 2: time */
						printf( 
							__( 'The license will expire on %1$s at %2$s.', $this->plugin_slug ),
							date_i18n( get_option( 'date_format' ), $timestamp ), 
							date_i18n( get_option( 'time_format' ), $timestamp ) 
						); ?></p>
					<p><?php printf( __( 'There are %d activations left', $this->plugin_slug ), $activations_left ); ?></p>
					<p><input type="submit" class="button-secondary" name="<?php echo $this->license_deactivation_action_name;?>" value="<?php _e( 'Deactivate License', $this->plugin_slug ); ?>"/></p>
					<?php wp_nonce_field( $this->license_deactivation_action_name, $this->nonce_field_name ); ?>
					<p class="description"><?php _e('Click to deactivate the license if you do not want to use it on this server.', $this->plugin_slug ); ?></p>
<?php
	} elseif ( 'expired' == $license_status ) {
?>
					<p class="qfi_invalid"><?php echo $msg;?></p>
					<p><?php /* translation: 1: date, 2: time */
						printf( 
							__( 'The license expired on %1$s at %2$s.', $this->plugin_slug ),
							date_i18n( get_option( 'date_format' ), $timestamp ), 
							date_i18n( get_option( 'time_format' ), $timestamp ) 
						); ?></p>
					<p><?php printf( __( 'There are %d activations left', $this->plugin_slug ), $activations_left ); ?></p>
					<p><a href="<?php printf( '%s/checkout/?edd_license_key=%s', $this->shop_url, $license_key ); ?>"><?php _e( 'Click here for a new license', $this->plugin_slug ); ?></a>.</p>
<?php
	} else {
?>
					<p class="qfi_invalid"><?php echo $msg;?></p>
					<p><input type="submit" class="button-secondary" name="<?php echo $this->license_activation_action_name;?>" value="<?php _e( 'Activate License', $this->plugin_slug ); ?>"/></p>
					<?php wp_nonce_field( $this->license_activation_action_name, $this->nonce_field_name ); ?>
					<p class="description"><?php _e('Click to activate the license after you have entered your license key.', $this->plugin_slug ); ?></p>
<?php
	} // if ( 'valid' == $license_status )

} // if( false !== $license_key ) 
?>
		</tbody>
	</table>	
	<?php submit_button(); ?>
</form>
<h3><?php _e( 'Important advices about the license', $this->plugin_slug ); ?></h3>
<h4><?php _e( 'Why a license?', $this->plugin_slug ); ?></h4>
<p><?php _e( 'With activating the license you will receive automatic upgrades of the plugin for 365 days since the day of the purchase. Each license key is valid for one installation of the plugin only.', $this->plugin_slug ); ?></p>
<h4><?php _e( 'Terms of the license', $this->plugin_slug ); ?></h4>
<p>
	<?php _e( 'By activating this license you are also confirming your agreement to be bound by the terms of the license associated with this plugin which you acknowledged at the time of the purchase checkout.', $this->plugin_slug ); ?>
	<a href="<?php _e( 'http://www.quickfeaturedimages.com/terms-licence-withdrawal/', $this->plugin_slug ); ?>" target="_blank"><?php _e( 'Read the terms of the license (in new window)', $this->plugin_slug ); ?></a>.
</p>
<p><?php _e( 'This includes that the warranty offered by the plugin author is limited to correcting any defects and that the plugin author will not be held liable for any actions or financial loss occurring as a result of using this plugin.', $this->plugin_slug ); ?></p>
<h4><?php _e( 'Contact', $this->plugin_slug ); ?></h4>
<p>
	<?php _e( 'If you have any issues and problems with activating you can contact the plugin author for solutions.', $this->plugin_slug ); ?>
	<a href="<?php _e( 'http://www.quickfeaturedimages.com/contact/', $this->plugin_slug ); ?>" target="_blank"><?php _e( 'Contact page (in new window)', $this->plugin_slug ); ?></a>.
</p>
