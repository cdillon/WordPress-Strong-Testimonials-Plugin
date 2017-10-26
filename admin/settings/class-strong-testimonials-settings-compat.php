<?php
/**
 * Class Strong_Testimonials_Settings_Compat
 */
class Strong_Testimonials_Settings_Compat {

	const TAB_NAME = 'compat';

	const OPTION_NAME = 'wpmtst_compat_options';

	const GROUP_NAME = 'wpmtst-compat-group';

	const PARTIALS = WPMTST_ADMIN . 'settings/partials/compat/';

	/**
	 * Strong_Testimonials_Settings_Compat constructor.
	 */
	public function __construct() {}

	/**
	 * Initialize.
	 */
	public static function init() {
		self::add_actions();
	}

	/**
	 * Add actions and filters.
	 */
	public static function add_actions() {
	    add_action( 'wpmtst_register_settings', array( __CLASS__, 'register_settings' ) );
	    add_action( 'wpmtst_settings_tabs', array( __CLASS__, 'register_tab' ), 25, 2 );
	    add_filter( 'wpmtst_settings_callbacks', array( __CLASS__, 'register_settings_page' ) );
	}

	/**
	 * Register settings tab.
	 *
	 * @param $active_tab
	 * @param $url
	 */
	public static function register_tab( $active_tab, $url ) {
		printf( '<a href="%s" class="nav-tab %s">%s</a>',
			esc_url( add_query_arg( 'tab', self::TAB_NAME, $url ) ),
			esc_attr( $active_tab == self::TAB_NAME ? 'nav-tab-active' : '' ),
			__( 'Compatibility', 'strong-testimonials' )
		);
	}

	/**
	 * Register settings.
	 */
	public static function register_settings() {
		register_setting( self::GROUP_NAME, self::OPTION_NAME, array( __CLASS__, 'sanitize_options' ) );
	}

	/**
     * Register settings page.
     *
	 * @param $pages
	 *
	 * @return mixed
	 */
	public static function register_settings_page( $pages ) {
	    $pages[ self::TAB_NAME ] = array( __CLASS__, 'settings_page' );
	    return $pages;
	}

	/**
	 * Print settings page.
	 */
	public static function settings_page() {
		settings_fields( self::GROUP_NAME );
		include( self::PARTIALS . 'compat.php' );
	}

	/**
	 * Sanitize settings.
	 *
	 * @param $input
	 *
	 * @return array
	 */
	public static function sanitize_options( $input ) {
		$input['prerender']               = sanitize_text_field( $input['prerender'] );
		$input['ajax']['method']          = sanitize_text_field( $input['ajax']['method'] );
		$input['ajax']['universal_timer'] = floatval( sanitize_text_field( $input['ajax']['universal_timer'] ) );
		$input['ajax']['observer_timer']  = floatval( sanitize_text_field( $input['ajax']['observer_timer'] ) );
		$input['ajax']['container_id']    = sanitize_text_field( $input['ajax']['container_id'] );
		$input['ajax']['addednode_id']    = sanitize_text_field( $input['ajax']['addednode_id'] );
		$input['ajax']['event']           = sanitize_text_field( $input['ajax']['event'] );
		$input['ajax']['script']          = sanitize_text_field( $input['ajax']['script'] );

		return $input;
	}

}

Strong_Testimonials_Settings_Compat::init();
