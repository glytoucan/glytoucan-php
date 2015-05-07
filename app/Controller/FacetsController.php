<?php
class FacetsController extends AppController {
	public $name = 'Facets';

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

	public function glycansJson() {
		$ejson = $this->Session->check('exhibit');
		if ($ejson) {

			// from Conposition Search 
			// from Structure Search : Substructure
			// from Motif Search
	    	$json = $this->Session->read('exhibit');
			$notation = $this->Session->read ( 'image.notation');
			if ($notation) {
				$json = str_replace('cfg', $notation, $json);
			}
      		$this->Session->delete('exhibit');

		}else{
			// from Glycans List
			$json = $this->Glycan->FullJson();
			$notation = $this->Session->read ( 'image.notation');
			if ($notation) {
				$json = str_replace('cfg', $notation, $json);
			}
		}

		$this->set('json', $json);
		$this->render('/Facets/json/glycans_json');

	}
}
