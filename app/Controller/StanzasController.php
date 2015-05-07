<?php
class StanzasController extends AppController {
	public $name = 'Stanzas';
	public $helpers = array (
			'Form',
			'Html' 
	);
	public $uses = array('Document');
	public $components = array ('Session');
	public $layout = 'stanzas';
	public function index() {
		if(!$this->Session->check('language')){
			$this->Session->write('language','en');
		}
		$this->set('doc', $this->Document->getDocument($this->Session->read('language')));
	}
	private function exitIfEmpty($data) {
		if (! isset ( $data )) {
			$this->render ( 'no_data' );
			exit ();
		}
	}
}
