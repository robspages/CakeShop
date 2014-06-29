<?php
App::uses('CartProduct', 'CakeShop.Model');

/**
 * CartProduct Test Case
 *
 */
class CartProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.cake_shop.cart_product',
		'plugin.cake_shop.product',
		'plugin.cake_shop.cart'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CartProduct = ClassRegistry::init('CakeShop.CartProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CartProduct);

		parent::tearDown();
	}

}
