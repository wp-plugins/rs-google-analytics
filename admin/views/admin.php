<?php
/**
 * Represents the view for the administration dashboard.
 */
?>
<div class="wrap">
	<div class="icon32" id="admin-icon"><img src="<?php echo plugins_url( '../assets/images/large-icon.png', __FILE__ ); ?>"></div>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<br />
	<div class="updated"></div>
	<div class="error"></div>
	<div class="clear"></div>
	<h2>Add Analytics UA Code</h2>
	<div class="left-border">
		<p>Please enter your UA code</p>
		<form id="create_entry_form_thumb">
			<p>
				<label for="image_title">
				    UA - <input id="code" type="text" name="code" value="" placeholder="Code">
				</label>
			</p>
			<p>Location of Analytics Code</p>
			<p><input type="radio" name="location" id="location" value="header">Header
			<input type="radio" name="location" id="location" value="footer" checked>Footer</p>
		</form>
	</div>
	<br />
	<p>
		<input class="button-primary" type="button" name="add_code" value="Add Code" id="add_code">
	</p>
	<br />
	<h2>Current Google Analytics UA Code</h2>
	<table class="widefat">
		<thead>
		    <tr>
		        <th>UA Code</th>
		        <th>Location</th>
		        <th>&nbsp;</th>
		    </tr>
		</thead>
		<!-- <tfoot>
		    <tr>
		    <th>Post Id</th>
		    <th>Post Title</th>
		    <th>Post Link</th>
		    </tr>
		</tfoot> -->
		<tbody class="popupTable">
		</tbody>
	</table>
</div>
