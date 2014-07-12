<?php

App::uses('AppController', 'Controller');
class CartsController extends AppController {

	/* Setup and scaffolding */

	public function beforeFilter() {
        parent::beforeFilter();
     	$this->Security->unlockedActions = array('add', 'view', 'cartCount');
	    $this->Auth->allow('add','view','cartCount');
	    $this->Security->csrfCheck = true;
	    $this->Security->validatePost = false;
	}


	/* Ajax Methods */ 

	/**
	 * 
	 *
	 */
	public function cartCount()
	{
		$this->autoRender = false;
  		$this->layout = 'ajax';
  		$cart = $this->findCart(); 
		$products = $this->getCartProducts($cart, null);
		$stats = array("count" => 0, "subtotal" => 0); 
		$this->debugLog("CartProducts Object Array: " . json_encode($products));
		foreach($products as $product)
  		{
  			print_r($product);
  			$stats['count'] = $stats['count'] + $product['CartProduct']['qty'];
  			$stats['subtotal'] = $stats['subtotal'] + ($product['Product']['price'] * $product['CartProduct']['qty']);	
  		}
  		$this->debugLog("Stats Object: " . json_encode($stats));
  		return json_encode($stats); 
  	}
	
  	/**
  	*
  	*
  	*
  	*/
	public function add()
	{
		$this->autoRender = false;
  		$this->layout = 'ajax';
		if(!empty($_POST))
		{

			$product_id = $_POST['product_id']; 
			$qty = $_POST['qty']; 

			$cart = $this->findCart(); 
			$this->debugLog("Cart Object: " . json_encode($cart));
			// products in cart already? 
			$this->loadModel('CartProduct');
			$products = $this->getCartProducts($cart, $product_id);
			if (!empty($products))
			{
				$products->Qty = $products->Qty + $qty;
				$products->save(); 
			}
			else
			{
				$this->CartProduct->create();
				$this->CartProduct->set(array("cart_id" => $cart["Cart"]['id'], "product_id" => $product_id, "Qty" => $qty));
				$this->CartProduct->save(); 
			}
			return "yay";
		}
		else
		{
			return "boo";
		}

	}


	/* Methods that render a page */

	public function view() {
		$cart = $this->findCart();		
		$this->set(compact('cart'));
	}


	/* Private Helper methods */ 

	/**
	*
	*
	*/ 
	private function getCartProducts($cart, $product_id)
	{
		

		$this->loadModel('CakeShop.CartProduct');
		$conditions = ($product_id === null ?
							array('cart_id' => $cart['Cart']['id']) : 
						    array('cart_id' => $cart['Cart']['id'],
								  'product_id' => $product_id)
					   ); 
		$this->loadModel('CakeShop.Product');

		$products = $this->CartProduct->find("all", 
			array(
				'recursive' => 0,
				'contain' => array('Product'),
				'conditions' => $conditions
			)
		);
		return $products; 
	}

	private function findCart ()
	{
		$cartID = session_id();
		CakeLog::write("debug", "cakeShop View id: " . $cartID); 
		$cart = $this->Cart->find('first', array(
			'recursive' => -1,
			'conditions' => array('sessionid' => $cartID)
		));
		if (empty($cart))
		{
			CakeLog::write("debug", "cakeShop couldn't find a cart for id:" . $cartID); 
			$this->Cart->create();
			$now = date("Y-m-d H:i:s");
			$this->Cart->set(array("sessionid" => $cartID, "created" => $now, "modified" => $now));
			$this->Cart->save();
			$cart = $this->Cart; 
		}
		return $cart;
	}

	private function debugLog($msg)
	{
		CakeLog::write("debug", $msg);
	}
}
