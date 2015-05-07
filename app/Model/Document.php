<?php
class document extends AppModel {
	public $name = 'HelpDcument';
	public $useTable = false;
	
	public function getDocument( $lanId) {
		
		$docFile = dirname(__FILE__)."/../tmp/$lanId.doc";
		
		if(file_exists ($docFile)){
			$json = file_get_contents($docFile);
		}else{
			//$json = file_get_contents ( 'http://localhost/localizations/get_json/'."$lanId".'.json' );
			$json = file_get_contents ( 'http://local.glytoucan.org/localizations/get_json/'."$lanId".'.json' );
			file_put_contents($docFile, $json);
		}
		return $this->getJsonFile($json);
	}
	
	public function getJsonFile($json) {
		$return = array ();
		$path = $_SERVER['REQUEST_URI'];
		if($_SERVER['REQUEST_URI']=='/'){
 			$path = '/Stanzas/index';
		}
		$path = ltrim($path, '/') ;
		$paths = explode("/", $path);
		if(count($paths) == 1){
			$paths[] = 'index';
		}

		$doc = json_decode($json , true);
		$doc = $doc["result"]["article"][$paths[0]][$paths[1]];

		foreach ($doc as $key => $value) {
			if (! preg_match ( "/Figure/", $key )) {
                                 if (count($value) > 0) {
                                         foreach ( $value as &$value2 ) {
                                                  $value2 = nl2br ( htmlspecialchars ( $value2 ) );
                                          }
                                  }
                          }
                          
			if ( count($value) > 0 ) {
                                 $return += array ( $key => $value);
                         }
		}

		return $return;
	}

	public function getCommonDocument($lanId){
		$docFile = dirname(__FILE__)."/../tmp/$lanId.doc";
		
		if(file_exists ($docFile)){
			$json = file_get_contents($docFile);
		}else{
			//$json = file_get_contents ( 'http://localhost/localizations/get_json/'."$lanId".'.json' );
			$json = file_get_contents ( 'http://local.glytoucan.org/localizations/get_json/'."$lanId".'.json' );
			file_put_contents($docFile, $json);
		}
		return $this->getCommonJsonFile($json);
	}

	public function getCommonJsonFile($json) {
		$doc = json_decode($json , true);
		return $doc["result"]["common"];
	}
}
?>
