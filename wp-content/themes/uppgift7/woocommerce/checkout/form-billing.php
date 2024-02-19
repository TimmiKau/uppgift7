<?php

/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

$checkout = WC()->checkout();
?>
<div class="woocommerce-billing-fields">
	<?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>

		<h3><?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?></h3>

	<?php else : ?>

		<h3><?php esc_html_e('Billing details', 'woocommerce'); ?></h3>

	<?php endif; ?>

	<?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields('billing');

		// First Name
		woocommerce_form_field('billing_first_name', $fields['billing_first_name'], $checkout->get_value('billing_first_name'));

		// Last Name
		woocommerce_form_field('billing_last_name', $fields['billing_last_name'], $checkout->get_value('billing_last_name'));

		// Company Name
		woocommerce_form_field('billing_company', $fields['billing_company'], $checkout->get_value('billing_company'));

		// Street Address
		woocommerce_form_field('billing_address_1', $fields['billing_address_1'], $checkout->get_value('billing_address_1'));

		woocommerce_form_field('billing_city', $fields['billing_city'], $checkout->get_value('billing_city'));

		// ZIP code


		// Town / City

		// Province
		$fields['billing_province'] = array(
			'type'        => 'select',
			'label'       => 'Province',
			'required'    => false,
			'class'       => array('form-row-wide'),
			'clear'       => true,
			'options'     => array(
				''         => __('Western Province', 'woocommerce'),
				'province1' => __('Eastern Province', 'woocommerce'),
				'province2' => __('Northen Province', 'woocommerce'),
				// Add more options as needed
			)
		);
		woocommerce_form_field('billing_province', $fields['billing_province'], $checkout->get_value('billing_province'));

		$fields['billing_zipcode']['label'] = 'ZIP code';
		woocommerce_form_field('billing_zipcode', $fields['billing_zipcode'], $checkout->get_value('billing_zipcode'));

		// Country / Region
		woocommerce_form_field('billing_country', $fields['billing_country'], $checkout->get_value('billing_country'));

		// Phone
		woocommerce_form_field('billing_phone', $fields['billing_phone'], $checkout->get_value('billing_phone'));

		// Email Address
		woocommerce_form_field('billing_email', $fields['billing_email'], $checkout->get_value('billing_email'));

		woocommerce_form_field('billing_additional_info', array(
			'type'        => 'textarea',
			'class'       => array('form-row-wide'),
			'placeholder' => 'Additional information',
			'required'    => false,
		), $checkout->get_value('billing_additional_info'));
		?>
	</div>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
</div>

</div>

<?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>
</div>

<?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) : ?>
	<div class="woocommerce-account-fields">
		<?php if (!$checkout->is_registration_required()) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e('Create an account?', 'woocommerce'); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

		<?php if ($checkout->get_checkout_fields('account')) : ?>

			<div class="create-account">
				<?php foreach ($checkout->get_checkout_fields('account') as $key => $field) : ?>
					<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>
	</div>
<?php endif; ?>