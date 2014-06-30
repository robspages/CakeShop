<?php
App::uses('Product', 'CakeShop.Model');

/**
 * Product Test Case
 *
 */
class ProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.cake_shop.product',
		'plugin.cake_shop.category',
		'plugin.cake_shop.brand',
		'plugin.cake_shop.order_item',
		'plugin.cake_shop.productmod'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Product = ClassRegistry::init('CakeShop.Product');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Product);

		parent::tearDown();
	}

}
