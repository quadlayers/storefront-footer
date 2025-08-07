<?php

if ( class_exists( 'QuadLayers\\WP_Notice_Plugin_Promote\\Load' ) ) {
	add_action('init', function() {
		/**
		 *  Promote constants
		 */
		define( 'QLSTFT_PROMOTE_LOGO_SRC', plugins_url( '/assets/backend/img/logo.jpg', QLSTFT_PLUGIN_FILE ) );
		/**
		 * Notice review
		 */
		define( 'QLSTFT_PROMOTE_REVIEW_URL', 'https://wordpress.org/support/plugin/storefront-footer/reviews/?filter=5#new-post' );
		/**
		 * Notice premium sell
		 */
		define( 'QLSTFT_PROMOTE_PREMIUM_SELL_SLUG', 'woocommerce-direct-checkout' );
		define( 'QLSTFT_PROMOTE_PREMIUM_SELL_NAME', 'WooCommerce Direct Checkout PRO' );
		define( 'QLSTFT_PROMOTE_PREMIUM_INSTALL_URL', 'https://quadlayers.com/products/woocommerce-direct-checkout/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=cross_sell&utm_content=premium_install_button' );
		define( 'QLSTFT_PROMOTE_PREMIUM_SELL_URL', 'https://quadlayers.com/products/woocommerce-direct-checkout/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=cross_sell&utm_content=premium_link' );
		/**
		 * Notice cross sell 1
		 */
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_SLUG', 'woocommerce-checkout-manager' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_NAME', 'WooCommerce Checkout Manager' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_DESCRIPTION', esc_html__( 'This plugin allows you to add custom fields to the checkout page, related to billing, shipping or additional fields sections.', 'storefront-footer' ) );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_URL', 'https://quadlayers.com/products/woocommerce-checkout-manager/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=cross_sell&utm_content=checkout_manager_link' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_LOGO_SRC', plugins_url( '/assets/backend/img/woocommerce-direct-checkout.jpg', QLSTFT_PLUGIN_FILE ) );
		/**
		 * Notice cross sell 2
		 */
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_SLUG', 'perfect-woocommerce-brands' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_NAME', 'Perfect WooCommerce Brands' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_DESCRIPTION', esc_html__( 'Perfect WooCommerce Brands the perfect tool to improve customer experience on your site. It allows you to highlight product brands and organize them in lists, dropdowns, thumbnails, and as a widget.', 'storefront-footer' ) );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_URL', 'https://quadlayers.com/products/perfect-woocommerce-brands/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=cross_sell&utm_content=perfect_brands_link' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_LOGO_SRC', plugins_url( '/assets/backend/img/perfect-woocommerce-brands.jpg', QLSTFT_PLUGIN_FILE ) );

		new \QuadLayers\WP_Notice_Plugin_Promote\Load(
			QLSTFT_PLUGIN_FILE,
			array(
				array(
					'type'               => 'ranking',
					'notice_delay'       => 0,
					'notice_logo'        => QLSTFT_PROMOTE_LOGO_SRC,
					'notice_description' => sprintf(
									esc_html__( 'Hello! %2$s We\'ve spent countless hours developing this free plugin for you and would really appreciate it if you could drop us a quick rating. Your feedback is extremely valuable to us. %3$s It helps us to get better. Thanks for using %1$s.', 'woocommerce-direct-checkout' ),
									'<b>'.QLSTFT_PLUGIN_NAME.'</b>',
									'<span style="font-size: 16px;">🙂</span>',
									'<br>'
					),
					'notice_link'        => QLSTFT_PROMOTE_REVIEW_URL,
					'notice_more_link'   => 'https://quadlayers.com/account/support/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=support&utm_content=report_bug_button',
					'notice_more_label'  => esc_html__(
						'Report a bug',
						'storefront-footer'
					),
				),
				array(
					'plugin_slug'        => QLSTFT_PROMOTE_PREMIUM_SELL_SLUG,
					'plugin_install_link'   => QLSTFT_PROMOTE_PREMIUM_INSTALL_URL,
					'plugin_install_label'  => esc_html__(
						'Purchase Now',
						'storefront-footer'
					),
					'notice_delay'       => WEEK_IN_SECONDS,
					'notice_logo'        => QLSTFT_PROMOTE_CROSS_INSTALL_1_LOGO_SRC,
					'notice_title'       => esc_html__(
						'Hello! We have a special gift!',
						'storefront-footer'
					),
					'notice_description' => sprintf(
						esc_html__(
							'Today we have a special gift for you. Use the coupon code %1$s within the next 48 hours to receive a %2$s discount on the premium version of the %3$s plugin.',
							'storefront-footer'
						),
						'ADMINPANEL20%',
						'20%',
						QLSTFT_PROMOTE_PREMIUM_SELL_NAME
					),
					'notice_more_link'   => QLSTFT_PROMOTE_PREMIUM_SELL_URL,
				),
				array(
					'plugin_slug'        => QLSTFT_PROMOTE_CROSS_INSTALL_1_SLUG,
					'notice_delay'       => MONTH_IN_SECONDS * 3,
					'notice_logo'        => QLSTFT_PROMOTE_CROSS_INSTALL_1_LOGO_SRC,
					'notice_title'       => sprintf(
						esc_html__(
							'Hello! We want to invite you to try our %s plugin!',
							'storefront-footer'
						),
						QLSTFT_PROMOTE_CROSS_INSTALL_1_NAME
					),
					'notice_description' => QLSTFT_PROMOTE_CROSS_INSTALL_1_DESCRIPTION,
					'notice_more_link'   => QLSTFT_PROMOTE_CROSS_INSTALL_1_URL
				),
				array(
					'plugin_slug'        => QLSTFT_PROMOTE_CROSS_INSTALL_2_SLUG,
					'notice_delay'       => MONTH_IN_SECONDS * 6,
					'notice_logo'        => QLSTFT_PROMOTE_CROSS_INSTALL_2_LOGO_SRC,
					'notice_title'       => sprintf(
						esc_html__(
							'Hello! We want to invite you to try our %s plugin!',
							'storefront-footer'
						),
						QLSTFT_PROMOTE_CROSS_INSTALL_2_NAME
					),
					'notice_description' => QLSTFT_PROMOTE_CROSS_INSTALL_2_DESCRIPTION,
					'notice_more_link'   => QLSTFT_PROMOTE_CROSS_INSTALL_2_URL
				),
			)
		);
	});
}
