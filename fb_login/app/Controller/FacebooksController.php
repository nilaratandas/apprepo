<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FacebooksController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Facebooks';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {
		App::import('Vendor', 'facebook', array('file' => 'facebook' . DS . 'facebook.php'));
		// Create our Application instance (replace this with your appId and secret key).
		$facebook = new Facebook(array(
		  'appId' => '544301475678853',
		  'secret' => '0a2c92aa0894692c5ba5675cd0e0f849',
		));

		// Get User ID
		$user = $facebook->getUser();

		// We may or may not have this data based on whether the user is logged in. If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access token is invalid if the user logged out of Facebook.

		if ($user) {
		  try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $facebook->api('/me');//User details
			//$me  = $facebook->api('/me');// User details same as $user_profile
		  } catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		  }
		}
		// Login or logout url will be needed depending on current user state.
		if ($user) {
		  $logoutUrl = $facebook->getLogoutUrl();
		} else {
		  $loginUrl = $facebook->getLoginUrl();
		}
		$this->set(compact('user', 'user_profile','loginUrl', 'logoutUrl'));
	}
}
