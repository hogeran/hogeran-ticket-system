<h1>Hogeran Ticket System Options</h1>

<?php settings_errors(); ?>
<?php 
	
	$company_name = esc_attr( get_option( 'company_name' ) );
	$page_header = esc_attr( get_option( 'page_header' ) );
	$description = esc_attr( get_option( 'description' ) );
	
?>
<div class="hogeran_ts-preview">
	<div class="hogeran_ts">
		<h1 class="hogeran_ts-company_name"><?php print $company_name; ?></h1>
		<h2 class="hogeran_ts-page_header"><?php print $page_header; ?></h2>
		<h2 class="hogeran_ts-description"><?php print $description; ?></h2>
	</div>
</div>

<form method="post" action="options.php" class="hogeran_ts-general-form">
	<?php settings_fields( 'hogeran_ts-settings-group' ); ?>
	<?php do_settings_sections( 'hogeran_ts' ); ?>
	<?php submit_button(); ?>
</form>