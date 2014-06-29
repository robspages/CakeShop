<?php
App::uses('AppController', 'Controller');
class CartsController extends AppController {


/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

	public function add($product_id, $qty=1)
	{
		$cart = $this->findCart(); 
		CakeLog::write("debug", json_encode($cart));
		// products in cart already? 
		$products = $this->CartProducts->find("first", 
			array(
				'recursive' => -1,
				'contain' => array(
					'Product'
				),
				'conditions' => array(
					'cart_id' => $cart->id,
					'product_id' => $product_id
				)
			)
		);
		if (!empty($products))
		{
			$products->Qty = $products->Qty + $qty;
			$products->save(); 
		}
		else
		{
			$this->CartProducts->create();
			$this->CartProducts->set(array("cart_id" => $cart["Cart"]['id'], "product_id" => $product_id, "Qty" => $qty));
			$this->CartProducts->save(); 
		}
	}


	private function findCart ()
	{
		$cartID = session_id();
		CakeLog::write("debug", "cakeShop View $id: " . $cartID); 
		$cart = $this->Cart->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'sessionid' => $cartID
			)
		));
		if (empty($cart))
		{
			CakeLog::write("debug", "cakeShop couldn't find a cart for $id:" . $cartID); 
		}
		else
		{
			return $cart;
		}
	}

	public function view() {
		$cart = $this->findCart();		
		$this->set(compact('cart'));
	}
}
