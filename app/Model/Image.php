<?php 
App::uses ( 'Model', 'WebServiceModel' );

require_once "WebServiceModel.php";
class Image extends WebServiceModel{
	public $name = 'Image';

	public $useTable = false;

	public function Number( $aNum, $notation ){
		if ($notation === NULL) {
			// notation is null
			$service = "/glycans/$aNum/image?format=png&notation=cfg&style=extended";
			$ret = $this->gsGet ( $service );
			if($ret != NULL ) {
				$base64 = base64_encode($ret); 
			    $mime = 'image/jpg';
				$ret = 'data:'.$mime.';base64,'.$base64;
				return $ret;
			} else {
	    		return $ret = 'This encoding unsupported';
			}
		}else{
			$service = "/glycans/$aNum/image?format=png&notation=$notation&style=extended";
			$ret = $this->gsGet ( $service );
			if($ret != NULL ) {
				$base64 = base64_encode($ret); 
			    $mime = 'image/jpg';
				$ret = 'data:'.$mime.';base64,'.$base64;
				return $ret;
			} else {
	    		return $ret = 'This encoding unsupported';
			}
		}

	}

	public function Structure( $strc, $enco, $notation ){
		if ($notation === NULL) {
			// notation is null
			$service = "/glycans/image/glycan?format=png&notation=cfg&style=extended";
			$data = array (
					'structure' => "$strc",
					'encoding' => "$enco"
			);
			$ret = $this->gsPost ( $service, $data );
			if($ret != NULL ) {
				$base64 = base64_encode($ret); 
			    $mime = 'image/jpg';
				$ret = 'data:'.$mime.';base64,'.$base64;
				return $ret;
			} else {
	    		return $ret = 'This encoding unsupported';
			}
		}else{
			// notation does exist
			$service = "/glycans/image/glycan?format=png&notation=$notation&style=extended";
			$data = array (
					'structure' => "$strc",
					'encoding' => "$enco"
			);
			$ret = $this->gsPost ( $service, $data );
			if($ret != NULL ) {
				$base64 = base64_encode($ret); 
			    $mime = 'image/jpg';
				$ret = 'data:'.$mime.';base64,'.$base64;
				return $ret;
			} else {
	    		return $ret = 'This encoding unsupported';
			}
		}


	}



}
