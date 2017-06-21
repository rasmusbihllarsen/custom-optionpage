<?php
/*
 * Generally, you need to remember to set a name="" for each of your fields.
 * The name should be the same as the second parameter you have set for the register_setting, on the main-page.
 *
 * Remember to have a register_setting for each of your fields, on each of your pages.
 */

function rbl_options_page_subpage() {
	/*
	 * These are the settings for the Wordpress editor.
	 * You need one of these for each of the editors on your subpage (also main page).
	 * Remember to rename the textarea_name for each of the editors.
	 *
	 * Read more about the settings for the editor here: https://codex.wordpress.org/Function_Reference/wp_editor#Arguments
	 */
	$editor_settings = array(
		'textarea_name'	=> 'rbl-opt-subpage-editor',
	);
?>
<div class="wrap">
<h1><?php _e('Subpage', 'Headline for subpage', 'rbl-custom-options'); ?></h1>

<form method="post" action="options.php">
	<?php
		/*
		 * Initiate the setting-section.
		 * Remember to rename subpage to the url-friendly version of your pages name.
		 */
		settings_fields( 'rbl-opt-settings-subpage-group' );
		do_settings_sections( 'rbl-opt-settings-subpage-group' );
	?>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><?php _e('Text', 'Headline for text-input field', 'rbl-custom-options'); ?></th>
			<td>
				<input type="text" name="rbl-opt-subpage-text"value="<?php echo get_option('rbl-opt-subpage-text'); ?>"/><br />
			</td>
		</tr>

	   <tr valign="top">
			<th scope="row"><?php _e('Textarea', 'Headline for textarea', 'rbl-custom-options'); ?></th>
			<td>
				<textarea name="rbl-opt-subpage-textarea" cols="35" rows="5"><?php echo get_option('rbl-opt-subpage-textarea'); ?></textarea><br />
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><?php _e('Page select', 'Headline for dropdown for pages', 'rbl-custom-options'); ?></th>
			<td>
				<?php
					$selected = get_option('rbl-opt-subpage-pageselect');

					if(!$selected){ $selected = 0; }

					wp_dropdown_pages(array(
						'selected'	=> $selected,
						'name'		=> 'rbl-opt-subpage-pageselect'
					));
				?>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><?php _e('Wordpress Editor', 'Headline for Wordpress editor', 'rbl-custom-options'); ?></th>
			<td><?php wp_editor(get_option('rbl-opt-subpage-editor'), 'rbl-opt-subpage-editor', $editor_settings); ?></td>
		</tr>
	</table>

	<?php
		/*
		 * Submit button, so you can save your settings.
		 */
		submit_button();
	?>

</form>
</div>
<?php
}