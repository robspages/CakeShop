<?php
App::uses('ProductAttribute', 'CakeShop.Model');

/**
 * ProductAttribute Test Case
 *
 */
class ProductAttributeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.cake_shop.product_attribute',
		'plugin.cake_shop.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProductAttribute = ClassRegistry::init('CakeShop.ProductAttribute');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProductAttribute);

		parent::tearDown();
	}

}
