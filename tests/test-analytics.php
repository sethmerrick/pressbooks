<?php

require_once( PB_PLUGIN_DIR . 'includes/admin/pb-analytics.php' );

class AnalyticsTest extends \WP_UnitTestCase {


	/**
	 * @covers \Pressbooks\Admin\Analytics\analytics_settings_section_callback
	 */
	public function test_add_menu() {

		$this->expectOutputRegex( '/<\/p>/' );
		\Pressbooks\Admin\Analytics\analytics_settings_section_callback();
	}


	/**
	 * @covers \Pressbooks\Admin\Analytics\analytics_ga_mu_uaid_sanitize
	 */
	public function test_analytics_ga_mu_uaid_sanitize() {

		$this->assertInternalType( 'string', \Pressbooks\Admin\Analytics\analytics_ga_mu_uaid_sanitize( 'UA-123456-7890' ) );
	}


	/**
	 * @covers \Pressbooks\Admin\Analytics\analytics_ga_mu_site_specific_allowed_sanitize
	 */
	public function test_analytics_ga_mu_site_specific_allowed_sanitize() {

		$this->assertInternalType( 'int', \Pressbooks\Admin\Analytics\analytics_ga_mu_site_specific_allowed_sanitize( 1 ) );
	}

}
