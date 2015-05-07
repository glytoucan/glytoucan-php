<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $layout = 'stanzas';

  public $uses = array (
      'Document'
      );

	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$language = $this->Session->read( 'language' );
		CakeLog::write('debug', "mod:>". $language ."<");
		if (null == $language) {
			$this->Session->write('language', 1);
		}
		$requestList = array( "Registries/index", "Registries/graphical", "Registries/upload", "Users/listAll", "Registries/motif", "Registries/motif", "Structures/glycansList");
		
	    $here = rtrim($this->request->here, '/');
		$paths = explode("/", $here);
	    $method = end($paths);
	    $control = prev($paths);
	    
		CakeLog::write('debug', "control:>". $control . "<");
		
	    $subhere = $control . "/" . $method;
	    
		CakeLog::write('debug', "subhere:>". $subhere . "<");

		$user = $this->Session->check ( 'user' );
		if (!$user && in_array($subhere, $requestList)) {
			$this->Session->setFlash('Please login.', 'default');
	
			$this->redirect (array ('controller' => 'Users', 'action' => 'signin'));
		}

		$this->set('doc', $this->Document->getDocument($this->Session->read('language')));
		$this->set('common_doc', $this->Document->getCommonDocument($this->Session->read('language')));
	}
}
