<?php
	/*
	 * Plugin Name: Custom Option-page
	 * Description: Custom option-page for developers.
	 * Plugin URI: http://rasmusbihllarsen.com
	 * Author: Rasmus Bihl Larsen
	 * Author URI: http://rasmusbihllarsen.com
	 * Version: 1.0
	 * License: GPL3
	 *
	 *
	 * This is a plugin created for developers - that is why it is only available on github.
	 * The plugin is made to make it easy for other developers to create a settings-page for their custom Wordpress-sites.
	 * If you create the theme and plugins from scratch, it is nice to have a place to put in all the settings, such as
	 * links for social-network, address-lines and other contact-info, and custom links.
	 *
	 */

	add_action('admin_menu', 'rbl_options_create_menu');

function rbl_options_create_menu() {
	/*
	 * Here you can set who should be able to see these options.
	 * Either enter a slug for the role or enter the capability itself.
	 *
	 * Read more about capabilities here: https://codex.wordpress.org/Roles_and_Capabilities
	 */
	$capability = 'administrator';

	/*
	 * This here creates the top-level menu-item.
	 */
	add_menu_page('Extra Options', __('Extra Options', 'Menu text', 'rbl-custom-options'), $capability, 'rbl_option_settings', 'rbl_options_settings_page', 'dashicons-admin-generic', 80);
	
	/*
	 * This here makes the sub-menu items.
	 *
	 * If you need more subpages, duplicate this next line,
	 * and replace "Subpage" with the page-name as it should be seen
	 * and replace "subpage" with the page-name as url-friendly
	 */
	add_submenu_page( 'rbl_option_settings', __('Subpage', 'Menu text for subpage', 'rbl-custom-options'), 'subpage', $capability, 'rbl_option_subpage', 'rbl_options_page_subpage' );

	add_action( 'admin_init', 'register_rbl_options_settings' );
}


function register_rbl_options_settings() {
	/*
	 * Subpage settings
	 *
	 * If you add more fields, you need to register the fields in your settings too.
	 *
	 * Duplicate the first of these lines
	 * and replace "subpage" with the page-name you have the setting in (eg. socail-media, emails)
	 * and replace "item" with what it is (eg. facebook-link, email)
	 *
	 * You can see examples of the settings below.
	 *
	 * If you want settings on the main option-page, you can use:
	 *     register_setting('rbl-opt-settings-main-group', 'rbl-opt-main-item');
	 * Remember to rename "item".
	 */
	register_setting('rbl-opt-settings-subpage-group', 'rbl-opt-subpage-item');

	register_setting('rbl-opt-settings-subpage-group', 'rbl-opt-subpage-text');
	register_setting('rbl-opt-settings-subpage-group', 'rbl-opt-subpage-textarea');
	register_setting('rbl-opt-settings-subpage-group', 'rbl-opt-subpage-pageselect');
	register_setting('rbl-opt-settings-subpage-group', 'rbl-opt-subpage-editor');
}

function rbl_options_settings_page() {
	/*
	 * This is the content for the main page of the custom option-page.
	 * You can create general settings here,
	 * but as of now, the page is for general information an documentation.
	 */
?>
<div class="wrap">
	<h1><?php _e('Custom Option-page', 'Headline for optionpage', 'rbl-custom-options'); ?></h1>
</div>
<?php
}

/*
 * If you need more subpages, include the partials here.
 */
include('pages/subpage.php');