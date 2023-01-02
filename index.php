<?php

 /**
  * Plugin Name: Change Storefront Footer Copyright Text
  * Plugin URI:  https://quadlayers.com
  * Description: Allows you to change the official Woocommerce Storefront theme footer copyright credit text.
  * Version:     1.2.4
  * Author:      QuadLayers
  * Author URI:  https://quadlayers.com
  * Text Domain: storefront-footer
  * License: GPLv3
  * License URI: https://www.gnu.org/licenses/gpl-3.0.html
  * WC requires at least: 3.1.0
  * WC tested up to: 7.2
  */

if ( ! function_exists( 'storefront_credit' ) ) {
	function storefront_credit() {
		?>
		<div class="site-info">
			<?php
			echo wp_kses_post( $GLOBALS['storefront_footer']['footer_credit'] );
			?>
		</div><!-- .site-info -->
		<?php
	}
}

define( 'QLSTFT_PLUGIN_NAME', 'Storefront Footer' );
define( 'QLSTFT_PURCHASE_URL', 'https://quadlayers.com/portfolio/woocommerce-checkout-manager/?utm_source=qlstft_admin' );
define( 'QLSTFT_DEMO_URL', 'https://quadmenu.com/storefront?utm_source=qlstft_admin' );
define( 'QLSTFT_PLUGIN_FILE', __FILE__ );
define( 'QLSTFT_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'QLSTFT_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'QLSTFT_PREFIX', 'qlstft' );
define( 'QLSTFT_DOMAIN', QLSTFT_PREFIX );
define( 'QLSTFT_REVIEW_URL', 'https://wordpress.org/support/plugin/woocommerce-checkout-manager/reviews/?filter=5#new-post' );
define( 'QLSTFT_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=wooccm_admin' );

define( 'QLSTFT_PREMIUM_SELL_SLUG', 'woocommerce-direct-checkout-pro' );
define( 'QLSTFT_PREMIUM_SELL_NAME', 'WooCommerce Direct Checkout' );
define( 'QLSTFT_PREMIUM_SELL_URL', 'https://quadlayers.com/portfolio/woocommerce-direct-checkout/?utm_source=qlstft_admin' );

define( 'QLSTFT_CROSS_INSTALL_SLUG', 'woocommerce-checkout-manager' );
define( 'QLSTFT_CROSS_INSTALL_NAME', 'Checkout Manager' );
define( 'QLSTFT_CROSS_INSTALL_DESCRIPTION', esc_html__( 'Checkout Field Manager( Checkout Manager ) for WooCommerce allows you to add custom fields to the checkout page, related to billing, Shipping or Additional fields sections.', 'storefront-footer' ) );
define( 'QLSTFT_CROSS_INSTALL_URL', 'https://quadlayers.com/portfolio/woocommerce-checkout-manager/?utm_source=qlstft_admin' );


if ( ! class_exists( 'Storefront_Footer' ) ) {

	class Storefront_Footer {


		private $options;

		public function __construct() {
			add_action( 'init', array( $this, 'options' ) );
			add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
			add_action( 'admin_init', array( $this, 'page_init' ) );
			add_action( 'admin_init', array( $this, 'ql_init' ) );
		}

		public function options() {
			global $storefront_footer;

			$title       = get_bloginfo( 'title' );
			$url         = get_bloginfo( 'url' );
			$description = get_bloginfo( 'description' );

			$defaults = array(
				'footer_credit' => "© QuadLayers 2018 <br/> <a href='#' target='_blank' title='{$url}' rel='author'>{$title}</a> - {$description}",
			);

			$storefront_footer = $this->options = wp_parse_args( (array) get_option( 'storefront_footer' ), $defaults );
		}

		public function ql_init() {
			include_once QLSTFT_PLUGIN_DIR . 'includes/quadlayers/widget.php';
			include_once QLSTFT_PLUGIN_DIR . 'includes/quadlayers/notices.php';
			include_once QLSTFT_PLUGIN_DIR . 'includes/quadlayers/links.php';
		}

		public function add_plugin_page() {
			add_options_page( 'Settings Admin', 'Storefront Footer', 'manage_options', 'storefront-footer', array( $this, 'create_admin_page' ) );
		}

		public function create_admin_page() {
			?>
			<div class="wrap about-wrap">

				<h1><?php echo esc_html( QLSTFT_PLUGIN_NAME ); ?></h1>

				<p class="about-text"><?php printf( esc_html__( 'Thanks for using %s! We will do our best to offer you the best and improved experience with our products.', 'wp-whatsapp-chat' ), QLSTFT_PLUGIN_NAME ); ?></p>

				<p class="about-text">
					<?php printf( '<a href="%s" target="_blank">%s</a>', QLSTFT_PURCHASE_URL, esc_html__( 'About Us', 'wp-whatsapp-chat' ) ); ?></a> |
					<?php printf( '<a href="%s" target="_blank">%s</a>', QLSTFT_DEMO_URL, esc_html__( 'Demo', 'wp-whatsapp-chat' ) ); ?></a>
				</p>

				<?php
				printf(
					'<a href="%s" target="_blank"><div style="
             background: #006bff url(%s) no-repeat;
             background-position: top center;
             background-size: 130px 130px;
             color: #fff;
             font-size: 14px;
             text-align: center;
             font-weight: 600;
             margin: 5px 0 0;
             padding-top: 120px;
             height: 40px;
             display: inline-block;
             width: 140px;
             " class="wp-badge">%s</div></a>',
					'https://quadlayers.com/?utm_source=qlstft_admin',
					plugins_url( '/assets/quadlayers.jpg', __FILE__ ),
					esc_html__( 'QuadLayers', 'wp-whatsapp-chat' )
				);
				?>

			</div>
			<style>
				.about-wrap>form h2 {
					display: none;
				}
			</style>
			<div class="wrap about-wrap">
				<form method="post" action="options.php">
					<?php
					// This prints out all hidden setting fields
					settings_fields( 'storefront_footer' );
					do_settings_sections( 'storefront-footer' );
					submit_button();
					?>
				</form>
			</div>
			<?php
		}

		public function page_init() {
			register_setting( 'storefront_footer', 'storefront_footer', array( $this, 'sanitize' ) );

			add_settings_section( 'setting_section_id', 'Settings', array( $this, 'print_section_info' ), 'storefront-footer' );

			add_settings_field( 'footer_credit', 'Footer Credit', array( $this, 'footer_credit_callback' ), 'storefront-footer', 'setting_section_id' );

			/*
			 *
			 * add_settings_field(
			'title', 'Title', array($this, 'title_callback'), 'storefront-footer', 'setting_section_id'
			); */
		}

		public function sanitize( $input ) {
			$new_input = array();

			if ( isset( $input['footer_credit'] ) ) {
				$new_input['footer_credit'] = wp_kses_post( $input['footer_credit'] );
			}

			/*
			 *
			 * if (isset($input['title']))
			$new_input['title'] = sanitize_text_field($input['title']); */

			return $new_input;
		}

		public function print_section_info() {
			print 'Enter your settings below:';
		}

		function footer_credit_callback() {
			wp_editor(
				$this->options['footer_credit'],
				'footer_credit',
				array(
					'media_buttons' => true,
					'textarea_rows' => 5,
					'textarea_name' => 'storefront_footer[footer_credit]',
				)
			);
		}

		/*
		 *
		 * public function footer_credit_callback() {
		printf(
		'<input type="text" id="footer_credit" name="storefront_footer[footer_credit]" value="%s" />', isset($this->options['footer_credit']) ? esc_attr($this->options['footer_credit']) : ''
		);
		}

		public function title_callback() {
		printf(
		'<input type="text" id="title" name="storefront_footer[title]" value="%s" />', isset($this->options['title']) ? esc_attr($this->options['title']) : ''
		);
		} */
	}

	new Storefront_Footer();
}
