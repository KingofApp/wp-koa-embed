<?php

add_action( 'admin_menu', 'koa_embed' );
add_action( 'admin_init', 'register_koa_embed_settings' );

/* Adding option "Koa embed" into wordpress Settings */
function koa_embed () {
   add_options_page ('Koa embed', 'Koa embed', 'manage_options', 'koa-embed-identifier', 'koa_embed_options');
}

/* Seting the form fields */
function register_koa_embed_settings() {
   $koa_embed_key_default = array(
         'type'              => 'string',
         'show_in_rest'      => false,
         'default'           => "kingOfApp"
     );
     $koa_embed_style_default = array(
         'type'              => 'string',
         'show_in_rest'      => false,
         'default'           => "header, footer{ display: none !important}"
     );
     //register our settings
     register_setting( 'koa-embed-settings-group', 'koa_embed_key',  $koa_embed_key_default);
     register_setting( 'koa-embed-settings-group', 'koa_embed_style', $koa_embed_style_default );
}

/* Creating form for settings */
function koa_embed_options () {
	if (! current_user_can ('manage_options')) {
		wp_die (__ ('No tienes permisos suficientes para acceder a esta página.'));
	} 
	?>
<div class="wrap">
<h1>King Of App Embed</h1>
<a href="https://kingofapp.com/" target="_blank">
  <img src="https://s3-eu-west-1.amazonaws.com/kingofapp.es/logo.png" style="max-width: 100%" alt="king of app">
</a>
<form method="post" action="options.php">
    <?php settings_fields( 'koa-embed-settings-group' ); ?>
    <?php do_settings_sections( 'koa-embed-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Query param</th>
        <td><input type="text" name="koa_embed_key" required value="<?php echo get_option('koa_embed_key'); ?>" />
            <p class="description">Query string key</p>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">Style to add</th>
        <td><textarea rows="4" cols="50" name="koa_embed_style"><?php echo esc_attr( get_option('koa_embed_style') ); ?></textarea>
            <p class="description">Styles to add if the query string var is enabled (key=true) </p>
        </td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>
<?php
}
