<?php

/** plugin requires DebugKit, Get it here: https://github.com/cakephp/debug_kit **/
CakePlugin::load('DebugKit');

//Croogo::hookRoutes('CakeShop');
	// Adds Profile tab to User Menu
	CroogoNav::add('shopping', array(
		'title' => 'Shopping',
		'url' => array(
			'admin' => true,
			'plugin' => 'CakeShop',
			'controller' => 'Products',
			'action' => 'index'
		),
	));
	