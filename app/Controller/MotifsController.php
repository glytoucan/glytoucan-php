<?php
App::uses ( 'Sparql', 'Vendor/Sparql' );
App::uses ( 'Endpoint', 'Vendor/Sparql' );
App::uses ( 'Sanitize', 'Utility' );
class MotifsController extends AppController {

	public $name = 'Motifs';
	
	public $uses = array('GlySpace', 'Motif','Document');

	public $helpers = array('Form','Html');

	public $components = array();

	public $layout = 'stanzas'; 

	//private $urlBase = 'http://www.glyspace.org/service'; 
	//private $urlBase = 'http://150.37.133.58:8080/GlySpace-0.2/service'; 

	public function motifsSearch(){} 

	public function results(){
		$motif01 = $this->request->data['select01'];
		$motif02 = $this->request->data['select02'];
		$motif03 = $this->request->data['input03'];
		$motif = $this->GlySpace->motifSearch($motif01,$motif02,$motif03);
		$motif = simplexml_load_string($motif);
		$this->set('tag',$motif01);
		$this->set('tag2',$motif02);
		$this->set('type',$motif03);
		$this->set('motifs',$motif);
	}

	public function listAll(){
		$list = $this->GlySpace->motifList();
		//$list = json_decode($list, true);
		$list = simplexml_load_string($list);
		//$list = get_object_vars($list);
		//echo var_dump($list);
		$this->set('motifs', $list);
		$this->set('urlBase',$this->Motif->urlBase());
		$this->set('doc', $this->Document->getDocument($this->Session->read('language')));
	}


	//=> motifs.ctp
	public function motifs(){
		$motif = $this->request->query['name'];
		$motif = urlencode($motif);
		$motif = $this->GlySpace->motifGet($motif);
		$motif = simplexml_load_string($motif);
		$motifId = $motif->attributes()->motifId ;
		$accNum = 'G000' . $motifId . 'MO' ;
		$this->set('accNum', $accNum);
		$this->set('motifs',$motif);
		$this->set('urlBase',$this->Motif->urlBase());
	}


	// Tag  => list_all
	public function motifsTag(){
		$motif1 = $this->request->query['tag'];
		$motif = $this->GlySpace->motifSearch($motif1);
		$motif = simplexml_load_string($motif);
		$this->set('tag',$motif1);
		$this->set('motifs',$motif);
		$this->set('urlBase',$this->Motif->urlBase());
		$this->render('list_all');
	}

  public function search() {
    $list = $this->Motif->motifList();
    $this->set('doc', $this->Document->getDocument($this->Session->read('language')));
    /*

array (size=1)
'motifs' => 
    array (size=61)
    0 => 
      array (size=4)
      'motifId' => int 12
      'name' => string 'Glycosphingolipid Isoglobo series' (length=33)
      'tags' => 
        array (size=2)
        0 => 
          array (size=1)
          'tag' => string 'full' (length=4)
        1 => 
          array (size=1)
          'tag' => string 'Glycosphingolipid' (length=17)
      'sequences' => 
        array (size=1)
        0 => 
          array (size=3)
            'sequenceId' => int 101
            'reducing' => boolean true
            'sequence' => string 'RES 1b:x-dglc-HEX-x:x 2b:b-dgal-HEX-1:5 3b:a-dgal-HEX-1:5 4b:b-dgal-HEX-1:5 5s:n-acetyl LIN 1:1o(4+1)2d 2:2o(3+1)3d 3:3o(3+1)4d 4:4d(2+1)5n' (length=139)
    1 => 
      array (size=4)
        'motifId' => int 13
        'name' => string 'Glycosphingolipid Muco series' (length=29)
        'tags' => 
          array (size=2)
            ...
        'sequences' => 
          array (size=1)
            ...
    echo var_dump($list);
    echo var_dump($list["motifs"][0]);
    */
    $this->set('motifs', $list["motifs"]);
    $this->set('urlBase',$this->Motif->urlBase());
	}
}
