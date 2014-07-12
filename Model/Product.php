<?php
App::uses('CakeShopAppModel', 'CakeShop.Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Brand $Brand
 * @property OrderItem $OrderItem
 * @property Productmod $Productmod
 */
class Product extends CakeShopAppModel {

	public $actAs = array('Containable'); 

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/*public $hasAndBelongsToMany = array(
		'ShoppingCarts' => array(
				'className' => 'Cart',
				'joinTable' => 'cart_products',
				'foreignKey' => 'product_id',
				'associationForeignKey' => 'cart_id' 
			)

	);*/
}
