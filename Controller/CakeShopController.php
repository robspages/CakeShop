<?php

App::uses('AppController', 'Controller');

class CakeShopController extends AppController {

//////////////////////////////////////////////////

	public $components = array(
		'Cart',
		'Paypal',
		'AuthorizeNet'
	);

}