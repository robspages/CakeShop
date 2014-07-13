<?php
App::uses('AppController', 'Controller');
/**
 * CartProducts Controller
 *
 */
class CartsProductsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */


	/**
	*
	*
	*/ 
	private function getCartProducts($cart, $product_id)
	{
		
		$conditions = ($product_id === null ?
							array('cart_id' => $cart['Cart']['id']) : 
						    array('cart_id' => $cart['Cart']['id'],
								  'product_id' => $product_id)
					   ); 
		$products = $this->CartProduct->find("all", 
			array(
				'recursive' => 0,
				'contain' => array('Product'),
				'conditions' => $conditions
			)
		);
		return $products; 
	}

}
