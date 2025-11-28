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
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_SLUG', 'wp-whatsapp-chat' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_NAME', 'Social Chat' );
		define(
			'QLSTFT_PROMOTE_CROSS_INSTALL_1_TITLE',
			wp_kses(
				sprintf(
					'<h3 style="margin:0">%s</h3>',
					esc_html__( 'Turn more visitors into customers.', 'storefront-footer' )
				),
				array(
					'h3' => array(
						'style' => array()
					)
				)
			)
		);
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_DESCRIPTION', esc_html__( 'Social Chat allows your users to start a conversation from your website directly to your WhatsApp phone number with one click.', 'storefront-footer' ) );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_URL', 'https://quadlayers.com/products/whatsapp-chat/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=cross_sell&utm_content=social_chat_link' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_1_LOGO_SRC', plugins_url( '/assets/backend/img/wp-whatsapp-chat.jpeg', QLSTFT_PLUGIN_FILE ) );
		/**
		 * Notice cross sell 2
		 */
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_SLUG', 'woocommerce-checkout-manager' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_NAME', 'WooCommerce Checkout Manager' );
		define(
			'QLSTFT_PROMOTE_CROSS_INSTALL_2_TITLE',
			wp_kses(
				sprintf(
					'<h3 style="margin:0">%s</h3>',
					esc_html__( 'Customize your checkout in minutes.', 'storefront-footer' )
				),
				array(
					'h3' => array(
						'style' => array()
					)
				)
			)
		);
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_DESCRIPTION', esc_html__( 'WooCommerce Checkout Manager allows you to add custom fields to the checkout page, related to billing, Shipping or Additional fields sections.', 'storefront-footer' ) );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_URL', 'https://quadlayers.com/products/woocommerce-checkout-manager/?utm_source=qlstft_plugin&utm_medium=dashboard_notice&utm_campaign=cross_sell&utm_content=checkout_manager_link' );
		define( 'QLSTFT_PROMOTE_CROSS_INSTALL_2_LOGO_SRC', plugins_url( '/assets/backend/img/woocommerce-checkout-manager.jpg', QLSTFT_PLUGIN_FILE ) );

		new \QuadLayers\WP_Notice_Plugin_Promote\Load(
			QLSTFT_PLUGIN_FILE,
			array(
				array(
					'type'               => 'ranking',
					'notice_delay'       => 0,
					'notice_logo'        => QLSTFT_PROMOTE_LOGO_SRC,
					'notice_title'       => wp_kses(
						sprintf(
							'<h3 style="margin:0">%s</h3>',
							esc_html__( 'Enjoying Storefront Footer?', 'storefront-footer' )
						),
						array(
							'h3' => array(
								'style' => array()
							)
						)
					),
					'notice_description' => esc_html__( 'A quick 5-star review helps us keep improving the plugin and supporting users like you. It only takes 2 seconds — thank you!', 'storefront-footer' ),
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
					'notice_logo'        => QLSTFT_PROMOTE_LOGO_SRC,
					'notice_title'       => wp_kses(
						sprintf(
							'<h3 style="margin:0">%s</h3>',
							esc_html__( 'Save 20% today!', 'storefront-footer' )
						),
						array(
							'h3' => array(
								'style' => array()
							)
						)
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
					'notice_title'       => QLSTFT_PROMOTE_CROSS_INSTALL_1_TITLE,
					'notice_description' => QLSTFT_PROMOTE_CROSS_INSTALL_1_DESCRIPTION,
					'notice_more_link'   => QLSTFT_PROMOTE_CROSS_INSTALL_1_URL
				),
				array(
					'plugin_slug'        => QLSTFT_PROMOTE_CROSS_INSTALL_2_SLUG,
					'notice_delay'       => MONTH_IN_SECONDS * 6,
					'notice_logo'        => QLSTFT_PROMOTE_CROSS_INSTALL_2_LOGO_SRC,
					'notice_title'       => QLSTFT_PROMOTE_CROSS_INSTALL_2_TITLE,
					'notice_description' => QLSTFT_PROMOTE_CROSS_INSTALL_2_DESCRIPTION,
					'notice_more_link'   => QLSTFT_PROMOTE_CROSS_INSTALL_2_URL
				),
			)
		);
	});
}
