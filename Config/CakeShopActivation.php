<?php
/**
* Sohp Plugin Activation
* Activation class for Sohp plugin.
*
* @package  Croogo
* @version  1.5
* @author   Rob Allen, Jeff Benson
*/
class CakeShopActivation {

	/**
	* onActivate will be called if this returns true
	*
	* @param  object $controller Controller
	* @return boolean
	*/
	public function beforeActivation(&$controller) {
		return true;
	}

	/**
	* Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
	*
	* @param object $controller Controller
	* @return void
	*/
	public function onActivation(&$controller) {
		//$controller->Croogo->addAco('HomeNode');  
		//$controller->Croogo->addAco('HomeNode/index', array('public')); 
	}

	/**
	* onDeactivate will be called if this returns true
	*
	* @param  object $controller Controller
	* @return boolean
	*/
	public function beforeDeactivation(&$controller) {
		return true;
	}

	/**
	* Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
	*
	* @param object $controller Controller
	* @return void
	*/
	public function onDeactivation(&$controller) {
		//$controller->Croogo->removeAco('HomeNode');
	}

}