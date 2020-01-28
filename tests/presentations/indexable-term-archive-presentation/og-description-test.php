<?php

namespace Yoast\WP\SEO\Tests\Presentations\Indexable_Term_Archive_Presentation;

use Yoast\WP\SEO\Tests\TestCase;

/**
 * Class Open_Graph_Description_Test
 *
 * @coversDefaultClass \Yoast\WP\SEO\Presentations\Indexable_Term_Archive_Presentation
 *
 * @group presentations
 * @group opengraph
 * @group opengraph-description
 */
class Open_Graph_Description_Test extends TestCase {
	use Presentation_Instance_Builder;

	/**
	 * Does the setup for testing.
	 */
	public function setUp() {
		parent::setUp();

		$this->set_instance();
		$this->indexable->object_id = 1;
	}

	/**
	 * Tests the situation where the OpenGraph description is given.
	 *
	 * @covers ::generate_og_description
	 */
	public function test_with_set_og_description() {
		$this->indexable->og_description = 'OpenGraph description';

		$this->assertEquals( 'OpenGraph description', $this->instance->generate_og_description() );
	}

	/**
	 * Tests the situation where the meta description is given.
	 *
	 * @covers ::generate_og_description
	 */
	public function test_with_term_description() {
		$this->indexable->og_description  = '';
		$this->instance->meta_description = '';

		$this->taxonomy_helper
			->expects( 'get_term_description' )
			->with( $this->indexable->object_id )
			->once()
			->andReturn( 'Term description' );

		$this->assertEquals( 'Term description', $this->instance->generate_og_description() );
	}
}
