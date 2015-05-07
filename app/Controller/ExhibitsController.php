<?php
App::uses ( 'Sparql', 'Vendor/Sparql' );
App::uses ( 'Endpoint', 'Vendor/Sparql' );
App::uses ( 'Sanitize', 'Utility' );
class ExhibitsController extends AppController {
	public $name = 'Exhibits';
	public $uses = array (
			'GlySpace' 
	);
	public $helpers = array (
			'Form',
			'Html' 
	);
	public $components = array ();
	public $layout = 'exhibits';
	public function index($gid = NULL) {
		$xml = $this->GlySpace->queryJson ( "G64497KW" );
		$JsonUrl = "http://www.glyspace.org/service/glycans/G64497KW.json";
		// $xml = simplexml_load_string($xml);
		// $xml = get_object_vars($xml);
		$this->set ( 'glist', $xml );
		$this->set ( 'url', $JsonUrl );
	}
}
