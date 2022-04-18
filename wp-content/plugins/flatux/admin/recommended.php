<?php
require_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
$list_slugs = array(
	'wp-extra',
	'seo-by-rank-math',
);

echo '<div class="wp-list-table widefat" style="margin-top:20px;"><div id="the-list">';
$table = _get_list_table('WP_Plugin_Install_List_Table');
$table->items = array();
foreach ( $list_slugs as $slug ) {
$args = array(
	'fields' => array(
		'last_updated' => true,
		'icons' => true,
		'active_installs' => true,
		'short_description' => true
	),
	'locale' => get_user_locale(),
	'slug' => $slug,
);
$table->items[] = plugins_api( 'plugin_information', $args );
}
$table->display_rows();
echo '</div></div>';

add_thickbox();
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );
