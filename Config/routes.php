<?php

	Router::connect('/product/:slug', array('controller' => 'products', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/brand/:slug', array('controller' => 'brands', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/category/:slug', array('controller' => 'categories', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/customer', array('controller' => 'users', 'action' => 'dashboard', 'customer' => true));