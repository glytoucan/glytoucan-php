<?php
App::uses ( 'Sparql', 'Vendor/Sparql' );
App::uses ( 'Endpoint', 'Vendor/Sparql' );
App::uses ( 'Sanitize', 'Utility' );
class StructuresController extends AppController {
	
	public $uses = array('Image','Glycan','GlySpace','Document','Convert');
	public $helpers = array('Form','Html');
	public $components = array('Session');

	// View/Layouts/stanzas.ctp
	public $layout = 'stanzas'; 

	
	public function index(){} 

	public function accession () {
		
		// from accession number search
		$accNum = $this->request->data['aNum'];
		$this->redirect(array('controller' => 'Structures', 'action' => 'Glycans', $accNum));

	}

	// Glycan entry
	public function glycans(){}

	// public function glycans($aNum = NULL) {

		// if (!empty ($this->request->data)) {

			// from accession number search
			// $accNum = $this->request->data['aNum'];
			// $this->redirect(array('controller' => 'Structures2', 'action' => 'glycans', $accNum));

			// get glycan image and check support encoding
			// $image = $this->Image->Number($aNum, $this->Session->read('image.notation') );

			// get glycan information
			// $xml = $this->Glycan->Query($aNum);
			// $glycan = simplexml_load_string($xml);

			// if (strlen ($xml) <= 0) {
			// 	$this->Session->setFlash('no results', 'default', array('class' => 'text-error'));
	  		//  return $this->redirect(array('action' => '../Stanzas/index'));
			// }


   			// $this->set( 'image', $image );
			// $this->set('glycans', $glycan);
			// $this->set ( 'urlBase', $this->Glycan->urlBase() );
			// $this->render('exact');
			
		// }elseif (!empty($aNum)) {

			// GET /glycans/{accessionNumber}
			// from Glycan List 
			// get glycan image and check encoding
			// $image = $this->Image->Number($aNum, $this->Session->read('image.notation') );

			// get glycan information
			// $xml = $this->Glycan->Query($aNum);
			// $glycan = simplexml_load_string($xml);

			// if (strlen ($xml) <= 0) {
			// 	$this->Session->setFlash('no results', 'default', array('class' => 'text-error'));
	  		//  return $this->redirect(array('action' => '../Stanzas/index'));
			// }

			// $this->set( 'image', $image );
			// $this->set('glycans', $glycan);
			// $this->set ( 'urlBase', $this->Glycan->urlBase() );
			// $this->render('exact');
		// }
	// }


	// 
	public function glycansList($aNum = NULL){
		$list = $this->Glycan->Query($aNum);
		$list = simplexml_load_string($list);
		$this->set('glist', $list);
	}

	// Glycan List of exhibit facet
	public function glycansFacet() {
	    // to access exhibit api 
		$this->Session->write( 'api', true );
	    $this->render('../Facets/glycans_facet');
	    // to out exhibit api
		$this->Session->delete( 'api' );
	}

	// Structure Search
	public function structureSearch(){
		$this->set('doc', $this->Document->getDocument($this->Session->read('language')));
	}
	public function structure(){
    if (isset($this->request->data['input01'])) {
		  $type = $this->request->data['input01'];
    } else {
      // if received through querystring
		  $type = $this->request->query['input01'];
    }

    if (isset($this->request->data['text1'])) {
		$strc = $this->request->data['text1'];
		$json = $this->Convert->Convert ( $strc, "Glycoct" );
		$json = json_decode($json);
		$json = $this->Convert->Convert ( $strc, "Glycoct" );
		if(preg_match('/RES/' , $json) ){
			$strc = $json;
		}else{
			$strc = json_decode($json);
			if($json[0]->status == true){
				$strc = $json[0]->result->structure;
			}else{
				$strc = $this->request->query['text1'];
			}
		}
    } else {
      // if received through querystring
		  $strc = $this->request->query['text1'];
    }

    if (isset($this->request->data['select1'])) {
		  $enco = $this->request->data['select1'];
    } else {
      // if received through querystring
		  $enco = $this->request->query['select1'];
    }
		if ($type == "exact"){

			// Exact search
			$xml = $this->Glycan->exact ( $strc, $enco );

			// get glycan image and check encoding
			// $image = $this->Image->Structure($strc, $enco, $this->Session->read( 'image.notation' ) );

			$data = simplexml_load_string ( $xml );
			$accNum = $data["accessionNumber"];

			if (strlen ($xml) <= 0) {
				$this->Session->setFlash('no results', 'default', array('class' => 'text-error'));
	 		 return $this->redirect(array('action' => 'structureSearch'));
			}

			// redirect to Stnaza : Glyan entry
			$this->redirect(array('controller' => 'Structures', 'action' => 'glycans', $accNum));

		}elseif ($type == "sub") {

			// Substructure search
			$results = $this->Glycan->substructure($strc,$enco);
			
    		CakeLog::write('debug', "results for " . $strc . ":>" . $results . "<");
			if (IS_NULL($results) || preg_match ( "/error/", $this->Glycan->status ) || strlen($results) < 1) {
				$this->Session->setFlash(__("no results found"), 'default', array('class' => 'text-error'));
				$this->redirect ( array (
					'action' => 'structureSearch'
				) );
			}

			$this->Session->write('exhibit', "$results" );
			// to access exhibit api 
			$this->Session->write( 'api', true );
			$this->render('../Facets/glycans_facet');
			// to out exhibit api
			$this->Session->delete( 'api' );
		}
	}

	// substructure
	public function searchSub(){
	}


	// Substructure
	public function sub(){
		$strc = $this->data['text1'];
		$enco = $this->data['select1'];
		$xml = $this->GlySpace->substructure($strc,$enco);
		$data = simplexml_load_string($xml);
		if (strlen ($xml) <= 0) {
			$this->Session->setFlash(__('no results'), 'default', array('class' => 'text-error'));
                	return $this->redirect(array('action' => 'searchSub'));
		}
		$this->set ( 'glycans', $data );
		$data = get_object_vars($data);
		$this->set('glist', $data);
	}

	// substructure
	public function searchExact(){

	}
	
	// To find the glycan having the exact same structure given by the user
	public function exact() {
		$strc = $this->data ['text1'];
		$enco = $this->data ['select1'];
		$xml = $this->GlySpace->exact ( $strc, $enco );

		$data = simplexml_load_string ( $xml );

//		if ($xml == false) {
//			echo "xml is not false";
//			return $this->set ( 'searchBySubstructure', $this->data);
//		}

		if (strlen ($xml) <= 0) {
			$this->Session->setFlash('no results', 'default', array('class' => 'text-error'));

                	return $this->redirect(array('action' => 'searchExact'));
		}
		
		$this->set ( 'glycans', $data );
	}

	public function checkForm() {
	}

	public function check() {
		$strc = $this->data ['text1'];
		$xml = $this->GlySpace->checkList ( $strc );
		$data = simplexml_load_string ( $xml );
		$this->set ( 'structure', $data );
	}

/*
	public function motif() {
		$name = "Glycosphingolipid Isoglobo series";
		$name = urlencode ( $name );
		$name = $this->GlySpace->searchMotif ( $name );
		$this->set ( 'glycans', $name );
	}
*/
  public function motif() {
		$name = $this->request->query['name'];
    $this->log('name:>' . $name);
		// $list = $this->Glycan->SearchMotifName( $name );
		$results = $this->Glycan->SearchMotifName( $name );
	    $this->Session->write('exhibit', "$results" );
	    // to access exhibit api 
		$this->Session->write( 'api', true );
	    $this->render('../Facets/glycans_facet');
	    // to out exhibit api
		$this->Session->delete( 'api' );


		// $this->set('list', $list["items"]);
  }


	public function searchComp() {
		$this->set('doc', $this->Document->getDocument($this->Session->read('language')));
	}

	public function comp() {
//		$glycanType = $this->data ['glycanType'];
		$hexNacMin = $this->data ['hexNacMin'];
		$hexNacMax = $this->data ['hexNacMax'];
		$hexNMin = $this->data ['hexNMin'];
		$hexNMax = $this->data ['hexNMax'];
		$neuAcMin = $this->data ['neuAcMin'];
		$neuAcMax = $this->data ['neuAcMax'];
		$neuGcMin = $this->data ['neuGcMin'];
		$neuGcMax = $this->data ['neuGcMax'];
		$hexAMin = $this->data ['hexAMin'];
		$hexAMax = $this->data ['hexAMax'];
		$dHexMin = $this->data ['dHexMin'];
		$dHexMax = $this->data ['dHexMax'];
		$kdoMin = $this->data ['kdoMin'];
		$kdoMax = $this->data ['kdoMax'];
		$kdnMin = $this->data ['kdnMin'];
		$kdnMax = $this->data ['kdnMax'];
		$hexoseMin = $this->data ['hexoseMin'];
		$hexoseMax = $this->data ['hexoseMax'];
		$pentoseMin = $this->data ['pentoseMin'];
		$pentoseMax = $this->data ['pentoseMax'];
		$sulfateMin = $this->data ['sulfateMin'];
		$sulfateMax = $this->data ['sulfateMax'];
		$phosphateMin = $this->data ['phosphateMin'];
		$phosphateMax = $this->data ['phosphateMax'];
		$methylMin = $this->data ['methylMin'];
		$methylMax = $this->data ['methylMax'];
		$acetylMin = $this->data ['acetylMin'];
		$acetylMax = $this->data ['acetylMax'];
		$otherMin = $this->data ['otherMin'];
		$otherMax = $this->data ['otherMax'];

		$results = $this->Glycan->SearchComp ( $hexNacMin, $hexNacMax, $hexNMin, $hexNMax, $neuAcMin, $neuAcMax, $neuGcMin, $neuGcMax, $hexAMin, $hexAMax, $dHexMin, $dHexMax, $kdoMin, $kdoMax, $kdnMin, $kdnMax, $hexoseMin, $hexoseMax, $pentoseMin, $pentoseMax, $sulfateMin, $sulfateMax, $phosphateMin, $phosphateMax, $methylMin, $methylMax, $acetylMin, $acetylMax, $otherMin, $otherMax );
		// debug("results>" . $results);

	    //debug($this->Glycan->status);
	    if (IS_NULL($results) || preg_match ( "/error/", $this->Glycan->status )) {
	      $this->Session->setFlash(__("no results found"), 'default', array('class' => 'text-error'));

	      $this->redirect ( array (
	        'action' => 'searchComp'
	        ) );
	      }
	    $this->Session->write('exhibit', "$results" );
		// to access exhibit api 
		$this->Session->write( 'api', true );

	    $this->render('../Facets/glycans_facet');
		// to out exhibit api
		$this->Session->delete( 'api' );
	}
		
	// graphical 
	public function graphical(){
    /* always by substructure search
    if (isset($this->request->data['input01'])) {
		  $type = $this->request->data['input01'];
    } else {
      // if received through querystring
		  $type = $this->request->query['input01'];
    }*/

    if (isset($this->request->data['text1'])) {
		  $strc = $this->request->data['text1'];
    } else {
      // if received through querystring
		  $strc = $this->request->query['text1'];
    }

    if (IS_NULL($strc) || strlen($strc) < 1) {
      return;
    }
		$this->Session->write( 'text1', $strc);
    // substructure search
    //$results = $this->Glycan->substructure($strc,$enco);

			// Exact search
			$xml = $this->Glycan->exact ( $strc, $enco );

			// get glycan image and check encoding
			// $image = $this->Image->Structure($strc, $enco, $this->Session->read( 'image.notation' ) );

			$data = simplexml_load_string ( $xml );
			$accNum = $data["accessionNumber"];

			if (strlen ($xml) <= 0) {
				$this->Session->setFlash('no results', 'default', array('class' => 'text-error'));
	 		 return $this->redirect(array('action' => 'structureSearch'));
			}

			// redirect to Stnaza : Glyan entry
			$this->redirect(array('controller' => 'Structures', 'action' => 'glycans', $accNum));

	}
}
