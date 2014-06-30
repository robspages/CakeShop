<?php
/**
 * CartProductFixture
 *
 */
class CartProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'cart_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'qty' => array('type' => 'integer', 'null' => true, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'id_idx' => array('column' => 'product_id', 'unique' => 0),
			'cart-id_idx' => array('column' => 'cart_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'product_id' => 1,
			'cart_id' => 1,
			'qty' => 1
		),
	);

}
