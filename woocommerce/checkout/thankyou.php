<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>

<!-- Checkout Progress Indicator -->
<div class="checkout-progress">
    <div class="progress-step completed">
        <div class="step-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 11l3 3L22 4"></path>
                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
            </svg>
        </div>
        <span class="step-label"><?php esc_html_e('Carrinho', 'tema_aromas'); ?></span>
    </div>
    <div class="progress-line completed"></div>
    <div class="progress-step completed">
        <div class="step-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 11l3 3L22 4"></path>
                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
            </svg>
        </div>
        <span class="step-label"><?php esc_html_e('Checkout', 'tema_aromas'); ?></span>
    </div>
    <div class="progress-line completed"></div>
    <div class="progress-step active">
        <div class="step-icon">
            <span class="step-number">3</span>
        </div>
        <span class="step-label"><?php esc_html_e('Concluído', 'tema_aromas'); ?></span>
    </div>
</div>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<div class="order-failed-state">
				<div class="failed-icon-circle">
					<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
						<circle cx="12" cy="12" r="10"></circle>
						<line x1="12" y1="8" x2="12" y2="12"></line>
						<line x1="12" y1="16" x2="12.01" y2="16"></line>
					</svg>
				</div>
				<p class="failed-message"><?php esc_html_e( 'Infelizmente, o pagamento não foi processado. Isso pode acontecer por diversos motivos.', 'tema_aromas' ); ?></p>
				<p class="failed-reassurance"><?php esc_html_e( 'Não se preocupe, seu pedido foi salvo. Tente novamente.', 'tema_aromas' ); ?></p>
				<div class="failed-actions">
					<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button btn-checkout"><?php esc_html_e( 'Tentar Pagamento Novamente', 'tema_aromas' ); ?></a>
					<?php if ( is_user_logged_in() ) : ?>
						<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button btn-view-cart"><?php esc_html_e( 'Minha Conta', 'tema_aromas' ); ?></a>
					<?php endif; ?>
				</div>
			</div>

		<?php else : ?>

			<!-- Success Celebration -->
			<div class="order-success-hero">
				<div class="success-icon-circle">
					<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
						<polyline points="20 6 9 17 4 12"></polyline>
					</svg>
				</div>
				<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>
				<p class="success-subtitle"><?php esc_html_e( 'Enviamos uma confirmação para o seu email', 'tema_aromas' ); ?></p>
			</div>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

			<!-- Next Steps -->
			<div class="order-next-steps">
				<h3 class="next-steps-title"><?php esc_html_e( 'Próximos passos', 'tema_aromas' ); ?></h3>
				<div class="next-steps-grid">
					<div class="next-step">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
							<polyline points="22,6 12,13 2,6"></polyline>
						</svg>
						<p><?php esc_html_e( 'Verifique seu email para a confirmação do pedido', 'tema_aromas' ); ?></p>
					</div>
					<div class="next-step">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<rect x="1" y="3" width="15" height="13"></rect>
							<polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
							<circle cx="5.5" cy="18.5" r="2.5"></circle>
							<circle cx="18.5" cy="18.5" r="2.5"></circle>
						</svg>
						<p><?php
							printf(
								wp_kses(
									__( 'Acompanhe seu pedido na página de <a href="%s">rastreamento</a>', 'tema_aromas' ),
									array( 'a' => array( 'href' => array() ) )
								),
								esc_url( home_url( '/rastreamento/' ) )
							);
						?></p>
					</div>
					<div class="next-step">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
						</svg>
						<p><?php
							printf(
								wp_kses(
									__( 'Dúvidas? <a href="%s">Fale conosco</a>', 'tema_aromas' ),
									array( 'a' => array( 'href' => array() ) )
								),
								esc_url( home_url( '/fale-conosco/' ) )
							);
						?></p>
					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

	<?php endif; ?>

</div>
