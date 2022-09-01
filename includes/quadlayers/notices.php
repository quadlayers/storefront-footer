<?php

class QLSTFT_Notices {

	protected static $_instance;

	public function __construct() {
		add_action( 'wp_ajax_qlstft_dismiss_notice', array( $this, 'ajax_dismiss_notice' ) );
		add_action( 'admin_notices', array( $this, 'add_notices' ) );
		add_filter( 'plugin_action_links_' . plugin_basename( QLSTFT_PLUGIN_FILE ), array( $this, 'add_action_links' ) );
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function ajax_dismiss_notice() {
		if ( check_admin_referer( 'qlstft_dismiss_notice', 'nonce' ) && isset( $_REQUEST['notice_id'] ) ) {

			$notice_id = sanitize_key( $_REQUEST['notice_id'] );

			update_user_meta( get_current_user_id(), $notice_id, true );
			set_transient( 'qlstft-notice-delay', true, MONTH_IN_SECONDS );

			wp_send_json( $notice_id );
		}

		wp_die();
	}

	public function add_notices() {

		$transient = get_transient( 'qlstft-notice-delay' );

		if ( $transient ) {
			return;
		}

		?>
		<script>
			(function($) {
				$(document).ready(()=> {
					$('.qlstft-notice').on('click', '.notice-dismiss', function(e) {
						e.preventDefault();
						var notice_id = $(e.delegateTarget).data('notice_id');
						$.ajax({
						type: 'POST',
						url: ajaxurl,
						data: {
							notice_id: notice_id,
							action: 'qlstft_dismiss_notice',
							nonce: '<?php echo esc_attr( wp_create_nonce( 'qlstft_dismiss_notice' ) ); ?>'
						},
							success: function(response) {
							console.log(response);
						},
						});
					});
				})
			})(jQuery);
		</script>
		<?php

		$user_rating     = ! get_user_meta( get_current_user_id(), 'qlstft-user-rating', true );
		$user_premium    = ! get_user_meta( get_current_user_id(), 'qlstft-user-premium', true ) && ! $this->is_installed( 'storefront-footer-pro/storefront-footer-pro.php' );
		$user_cross_sell = ! get_user_meta( get_current_user_id(), 'qlstft-user-cross-sell', true );

		if ( $user_rating ) {
			?>
			<div id="qlstft-admin-rating" class="qlstft-notice notice notice-info is-dismissible" data-notice_id="qlstft-user-rating">
				<div class="notice-container" style="padding-top: 10px; padding-bottom: 10px; display: flex; justify-content: left; align-items: center;">
					<div class="notice-image">
						<img style="border-radius:50%;max-width: 90px;" src="<?php echo plugins_url( '/assets/backend/img/logo.jpg', QLSTFT_PLUGIN_FILE ); ?>" alt="<?php echo esc_html( QLSTFT_PLUGIN_NAME ); ?>>">
					</div>
					<div class="notice-content" style="margin-left: 15px;">
						<p>
							<?php printf( esc_html__( 'Hello! Thank you for choosing the %s plugin!', 'storefront-footer' ), QLSTFT_PLUGIN_NAME ); ?>
							<br/>
							<?php esc_html_e( 'Could you please give it a 5-star rating on WordPress?. Your feedback will boost our motivation and help us promote and continue to improve this product.', 'storefront-footer' ); ?>
						</p>
						<a href="<?php echo esc_url( QLSTFT_REVIEW_URL ); ?>" class="button-primary" target="_blank">
							<?php esc_html_e( 'Yes, of course!', 'storefront-footer' ); ?>
						</a>
						<a href="<?php echo esc_url( QLSTFT_SUPPORT_URL ); ?>" class="button-secondary" target="_blank">
							<?php esc_html_e( 'Report a bug', 'storefront-footer' ); ?>
						</a>
					</div>
				</div>
			</div>
			<?php
			return;
		}

		if ( ! $user_rating && $user_premium ) {
			?>
			<div class="qlstft-notice notice notice-info is-dismissible" data-notice_id="qlstft-user-premium">
				<div class="notice-container" style="padding-top: 10px; padding-bottom: 10px; display: flex; justify-content: left; align-items: center;">
					<div class="notice-image">
						<img style="border-radius:50%;max-width: 90px;" src="<?php echo esc_url( plugins_url( '/assets/backend/img/logo.jpg', QLSTFT_PLUGIN_FILE ) ); ?>" alt="<?php echo esc_html( QLSTFT_PLUGIN_NAME ); ?>>">
					</div>
					<div class="notice-content" style="margin-left: 15px;">
						<p>
						<?php esc_html_e( 'Hello! We have a special gift!', 'storefront-footer' ); ?>
							<br />
						<?php
						printf(
							esc_html__( 'Today we want to make you a special gift. Using this coupon before the next 48 hours you can get a 20 percent discount on the premium version of the %s plugin.', 'storefront-footer' ),
							'WooCommerce Checkout Manager'
						)
						?>
						</p>
						<a href="<?php echo esc_url( QLSTFT_PURCHASE_URL ); ?>" class="button-primary" target="_blank">
							<?php esc_html_e( 'More info', 'storefront-footer' ); ?>
						</a>
						<input style="width:95px" type="text" value="ADMINPANEL20%"/>
					</div>
				</div>
			</div>
			<?php
			return;
		}

		if ( ! $user_rating && ! $user_premium && $user_cross_sell ) {

			$cross_sell = $this->get_cross_sell();

			if ( empty( $cross_sell ) ) {
				return;
			}

			list($title, $description, $link, $action, $action_link) = $cross_sell;

			?>
			<div class="qlstft-notice notice notice-info is-dismissible" data-notice_id="qlstft-user-cross-sell">
				<div class="notice-container" style="padding-top: 10px; padding-bottom: 10px; display: flex; justify-content: left; align-items: center;">
					<div class="notice-image">
						<img style="border-radius:50%;max-width: 90px;" src="<?php echo plugins_url( '/assets/backend/img/logo.jpg', QLSTFT_PLUGIN_FILE ); ?>" alt="<?php echo esc_html( QLSTFT_PLUGIN_NAME ); ?>>">
					</div>
					<div class="notice-content" style="margin-left: 15px;">
						<p>
						<?php printf( esc_html__( 'Hello! We want to invite you to try our %s plugin!', 'storefront-footer' ), $title ); ?>
							<br/>
						<?php echo esc_html( $description ); ?>
						</p>
						<a href="<?php echo esc_url( $action_link ); ?>" class="button-primary">
						<?php echo esc_html( $action ); ?>
						</a>
						<a href="<?php echo esc_url( $link ); ?>" class="button-secondary" target="_blank">
						<?php esc_html_e( 'More info', 'storefront-footer' ); ?>
						</a>
					</div>
				</div>
			</div>
			<?php
			return;
		}

	}

	function get_cross_sell() {

		$title       = 'Direct Checkout';
		$description = esc_html__( 'Direct Checkout for WooCommerce allows you to reduce the steps in the checkout process by skipping the shopping cart page. This can encourage buyers to shop more and quickly. You will increase your sales reducing cart abandonment.', 'storefront-footer' );
		$link        = 'https://quadlayers.com/portfolio/woocommerce-direct-checkout/?utm_source=qlstft_admin';

		$screen = get_current_screen();

		if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
			return array();
		}

		$plugin_slug = 'woocommerce-direct-checkout';

		$plugin_file = "{$plugin_slug}/{$plugin_slug}.php";

		if ( is_plugin_active( $plugin_file ) ) {
			return array();
		}

		if ( $this->is_installed( $plugin_file ) ) {

			if ( ! current_user_can( 'activate_plugins' ) ) {
				return array();
			}

			return array(
				$title,
				$description,
				$link,
				esc_html__( 'Activate', 'storefront-footer' ),
				wp_nonce_url( "plugins.php?action=activate&amp;plugin={$plugin_file}&amp;plugin_status=all&amp;paged=1", "activate-plugin_{$plugin_file}" ),
			);

		}

		if ( ! current_user_can( 'install_plugins' ) ) {
			return array();
		}

		return array(
			$title,
			$description,
			$link,
			esc_html__( 'Install', 'storefront-footer' ),
			wp_nonce_url( self_admin_url( "update.php?action=install-plugin&plugin={$plugin_slug}" ), "install-plugin_{$plugin_slug}" ),
		);

	}

	function is_installed( $path ) {

		$installed_plugins = get_plugins();

		return isset( $installed_plugins[ $path ] );
	}

	function add_action_links( $links ) {
		$links[] = '<a target="_blank" href="' . QLSTFT_PURCHASE_URL . '">' . esc_html__( 'Premium', 'storefront-footer' ) . '</a>';
		$links[] = '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=' . sanitize_title( QLSTFT_PREFIX ) ) . '">' . esc_html__( 'Settings', 'storefront-footer' ) . '</a>';
		return $links;
	}

}

QLSTFT_Notices::instance();
