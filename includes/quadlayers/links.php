<?php

class QLSTFT_Admin_Links {

	protected static $_instance;

	function __construct() {
		add_filter( 'plugin_action_links_' . QLSTFT_PLUGIN_BASENAME, array( $this, 'add_action_links' ) );
	}

	public function add_action_links( $links ) {
		$links[] = '<a target="_blank" href="' . QLSTFT_PURCHASE_URL . '">' . esc_html__( 'Premium', 'storefront-footer' ) . '</a>';
		return $links;
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}

QLSTFT_Admin_Links::instance();
