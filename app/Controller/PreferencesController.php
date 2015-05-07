<?php
class PreferencesController extends AppController {
	public $name = 'Preferences';

	public $uses = array('Image','Glycan','Document');

	public $helpers = array (
			'Form',
			'Html' 
	);
	public $components = array (
		'Session',
		'RequestHandler'
	);
	public $layout = 'stanzas';

	public function index (){
		if(!$this->Session->read('image.notation')){
			$this->Session->write('image.notation', 'cfg');
		}
		$this->set('doc', $this->Document->getDocument($this->Session->read('language')));
	}

	public function Image($imageType = NULL){
		$this->Session->write('image.notation', $imageType);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
}
