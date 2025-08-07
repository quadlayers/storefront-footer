<?php

if ( class_exists( 'QuadLayers\\WP_Plugin_Table_Links\\Load' ) ) {
	add_action('init', function() {
		new \QuadLayers\WP_Plugin_Table_Links\Load(
			QLSTFT_PLUGIN_FILE,
			array(
				array(
					'text' => esc_html__( 'Settings', 'storefront-footer' ),
					'url'  => admin_url( 'options-general.php?page=storefront-footer' ),
					'target' => '_self',
				),
				array(
					'text' => esc_html__( 'Premium', 'storefront-footer' ),
					'url'  => 'https://quadlayers.com/products/storefront-footer/?utm_source=qlstft_plugin&utm_medium=plugin_table&utm_campaign=premium_upgrade&utm_content=premium_link',
					'color' => 'green',
					'target' => '_blank',
				),
				array(
					'place' => 'row_meta',
					'text'  => esc_html__( 'Support', 'storefront-footer' ),
					'url'   => 'https://quadlayers.com/account/support/?utm_source=qlstft_plugin&utm_medium=plugin_table&utm_campaign=support&utm_content=support_link',
				),
			)
		);
	});

}
