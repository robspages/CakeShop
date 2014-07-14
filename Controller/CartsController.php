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
  			
  			$stats['count'] = $stats['count'] + $product['CartProduct']['qty'];
  			$stats['subtotal'] = $stats['subtotal'] + ($product['Product']['price'] * $product['CartProduct']['qty']);
  			if(isset($stats['products'][$product['Product']['id']]))
  			{
  				$stats['products'][$product['Product']['id']]['qty']++; 
  			}
  			else
  			{
  				$stats['products'][$product['Product']['id']] = $product['Product'];
  				$stats['products'][$product['Product']['id']]['qty'] = $product['CartProduct']['qty'];
  			}
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
			$this->debugLog("Add to cart Post: " . json_encode($_POST));
			$qty = $_POST['qty']; 

			$cart = $this->findCart(); 
			$this->debugLog("Cart Object: " . json_encode($cart));
				
			$this->loadModel('CakeShop.CartProduct');
			$this->CartProduct->find('first', array('conditions' => array('cart_id' => $cart['Cart']['id'], 'product_id' => $product_id)));
			if($this->CartProduct->id > 0)
			{
				$this->CartProduct->set('qty',$this->CartProduct->qty + $qty);
			}
			else
			{
				$this->CartProduct->create();
				$this->CartProduct->set(array("cart_id" => $cart["Cart"]['id'], "product_id" => $product_id, "Qty" => $qty));
			}
			$this->CartProduct->save(); 
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
		$this->loadModel('CakeShop.Product');
		$this->debugLog("cart object in GetCartProducts: " . json_encode($cart) );
		$conditions = ($product_id === null ?
							array('cart_id' => $cart['cart']['id']) : 
						    array('cart_id' => $cart['cart']['id'],
								  'product_id' => $product_id)
					   );
		

		$products = $this->CartProduct->find("all", 
			array(
				'contain' => array('Product'),
				'conditions' => $conditions
			)
		);

		$this->debugLog('CartProducts Returned: ' . json_encode($products));
		return $products; 
	}

	private function findCart ()
	{
		$cartID = session_id();
		CakeLog::write("debug", "cakeShop session id: " . $cartID); 
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
			$cart = $this->Cart->find('first', array(
				'recursive' => -1,
				'conditions' => array('sessionid' => $cartID)
			));
		}
		return $cart;
	}

	private function debugLog($msg)
	{
		CakeLog::write("debug", $msg);
	}
}
