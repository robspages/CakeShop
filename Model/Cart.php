<?php
App::uses('CakeShopAppModel', 'CakeShop.Model');
/**
 * Cart Model
 *
 * @property CartProduct $CartProduct
 */
class Cart extends CakeShopAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CartProduct' => array(
			'className' => 'CartProduct',
			'foreignKey' => 'cart_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
