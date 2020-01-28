<?php

namespace Yoast\WP\SEO\Tests\Presentations\Indexable_Presentation;

use Yoast\WP\SEO\Tests\TestCase;

/**
 * Class OG_Article_Published_Time_Test
 *
 * @coversDefaultClass \Yoast\WP\SEO\Presentations\Indexable_Presentation
 *
 * @group presentations
 * @group opengraph
 */
class OG_Article_Published_Time_Test extends TestCase {
	use Presentation_Instance_Builder;

	/**
	 * Sets up the test class.
	 */
	public function setUp() {
		parent::setUp();

		$this->set_instance();
	}

	/**
	 * Tests whether an empty string is returned.
	 *
	 * @covers ::generate_og_article_published_time
	 */
	public function test_generate_og_article_published_time_and_return_empty() {
		$this->assertEmpty( $this->instance->generate_og_article_published_time() );
	}
}
