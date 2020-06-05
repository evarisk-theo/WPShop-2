<?php
/**
 * Gestion des filtres Stripe.
 *
 * @author    Eoxia <dev@eoxia.com>
 * @copyright (c) 2011-2020 Eoxia <dev@eoxia.com>.
 *
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 *
 * @package   WPshop\Classes
 *
 * @since     2.0.0
 */

namespace wpshop;

defined( 'ABSPATH' ) || exit;

/**
 * Stripe Filter Class
 */
class Stripe_Filter {

	/**
	 * Constructeur
	 *
	 * @since 2.0.0
	 */
	public function __construct() {
		add_filter( 'wps_payment_method_stripe_description', array( $this, 'more_stripe_description' ) );
	}

	/**
	 * Ajoutes le text pour indiquer que Stripe est en mode sandbox.
	 *
	 * @since 2.0.0
	 *
	 * @param  string $description Description actuelle.
	 *
	 * @return string              Description modifiée.
	 */
	public function more_stripe_description( $description ) {
		$stripe_options = Payment::g()->get_payment_option( 'stripe' );

		if ( $stripe_options['use_stripe_sandbox'] ) {
			$description .= __( ' SANDBOX ENABLED', 'wpshop' );
		}

		return $description;
	}
}

new Stripe_Filter();