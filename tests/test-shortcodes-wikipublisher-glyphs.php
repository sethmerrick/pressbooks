<?php


class Shortcodes_WikiPublisher_GlyphsTest extends \WP_UnitTestCase {

	/**
	 * @var \Pressbooks\Shortcodes\Wikipublisher\Glyphs
	 */
	protected $glyphs;


	/**
	 *
	 */
	public function setUp() {
		parent::setUp();

		$this->glyphs = $this->getMockBuilder( '\Pressbooks\Shortcodes\Wikipublisher\Glyphs' )
			->setMethods( null )// pass null to setMethods() to avoid mocking any method
			->disableOriginalConstructor()// disable private constructor
			->getMock();
	}


	/**
	 * @covers \Pressbooks\Shortcodes\Wikipublisher\Glyphs::lang_shortcode
	 * @covers \Pressbooks\Shortcodes\Wikipublisher\Glyphs::greek
	 */
	public function test_lang_shortcode_grk() {

		$content = $this->glyphs->lang_shortcode(
			[ 'lang' => 'grc' ],
			'aeiou'
		);

		$this->assertContains( '<span lang="grc"', $content );
		$this->assertContains( '&#945;&#949;&#953;&#959;&#965;', $content );

		$content = $this->glyphs->lang_shortcode(
			[ 'lang' => 'ell' ],
			'aeiou'
		);

		$this->assertContains( '<span lang="el"', $content );
		$this->assertContains( '&#945;&#949;&#953;&#959;&#965;', $content );
	}


	/**
	 * @covers \Pressbooks\Shortcodes\Wikipublisher\Glyphs::lang_shortcode
	 * @covers \Pressbooks\Shortcodes\Wikipublisher\Glyphs::hebrew
	 */
	public function test_lang_shortcode_he() {

		$content = $this->glyphs->lang_shortcode(
			[ 'lang' => 'hbo' ],
			'aeiou'
		);

		$this->assertContains( '<span lang="he"', $content );
		$this->assertContains( '&#1463;&#1461;&#1460;&#1465;&#1467;', $content );
	}


	/**
	 * @covers \Pressbooks\Shortcodes\Wikipublisher\Glyphs::lang_shortcode
	 */
	public function test_lang_shortcode_bad() {

		$content = $this->glyphs->lang_shortcode(
			[ 'lang' => 'foobar' ],
			'aeiou'
		);

		$this->assertContains( 'ERROR', $content );
	}

}
