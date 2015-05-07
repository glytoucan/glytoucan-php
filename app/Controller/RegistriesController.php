<?php
class RegistriesController extends AppController {

  public $name = 'Registries';

  public $uses = array (
      'Convert',
      'GlySpace',
      'Glycan',
      'Motif',
      'Document' 
      );

  public $helpers = array (
      'Form',
      'Html',
      'Session' 
      );

  public $components = array ();

  public $layout = 'stanzas';

  public function index() {
    $this->set('doc', $this->Document->getDocument($this->Session->read('language')));
  }

  public function graphical() {
    $this->set('doc', $this->Document->getDocument($this->Session->read('language')));
    if (isset($this->request->data['text'])) {
      $text = $this->request->data['text'];
    } else {
      // if received through querystring
      $text = $this->request->query['text'];
    }

    if (IS_NULL($text) || strlen($text) < 1) {
      return;
    }
    CakeLog::write('debug', "sequence:" . $text . "<");

    $this->Session->write( 'text', $text);

    $this->confirm($text);
    $this->render('confirmation' );
  }

  public function upload() {
    $this->set('doc', $this->Document->getDocument($this->Session->read('language')));
  }

  public function checkUpload() {

  /* form submitted? */
  if ($this->request->is('post')) {
      $upDir = '/home/rings/uploads/';
      $now   = new DateTime;
      $formattedNow = $now->format( 'Y-d-m' ).'-'.microtime(true);
      $username = $this->Session->read ( 'user.name' );
      $filename = $upDir . $username . '-' . $this->data['submittedfile']['name'] . '-' . $formattedNow;

  /* copy uploaded file */
  if (move_uploaded_file($this->data['submittedfile']['tmp_name'],$filename)) {
      $this->Session->setFlash($this->data['submittedfile']['name'].' uploaded successfully.');
    /* process file here. */

      $name=$this->Session->read ( 'user.name' );
      $pass=$this->Session->read ( 'user.pass' );

      $file_contents = file_get_contents($filename);    

      $this->log($file_contents);
      $this->confirm($file_contents);
      //$result = $this->Glycan->GlycanAddList($file_contents, 'glycoct', $name, $pass);

      $this->render('confirmation' );
    }
  }

/*
   if ($result['code'] != 0) {
   $errorMsg = $result['errors']; // error messages
   $this->Session->setFlash($errorMsg[0], 'default', array('class' => 'text-error'));
   $this->redirect ( array (
   'action' => '../Registries/upload' 
   ) );
   } else {
   $this->Session->setFlash(__('The file was uploaded successfully.'));
   }
   } else {
   $this->Session->setFlash('There was a problem uploading file. Please try again.');
   }
   }
 */
    $this->log('done');

  }

  public function complete() {
    $num = $this->data ['num'];
    $original = array ();
    $no = array ();$res = array ();
    $imgs = array ();
    $glycocts = array ();
    $wurcs = array ();
  foreach ( $num as $i ) {
    if ($i != 0) {
      $npEnc = base64_encode ( $this->Session->read ( 'user.name' ) . ":" . $this->Session->read ( 'user.pass' ) );
      $re = $this->GlySpace->glycansAdd ( $this->data ['gly'] [$i - 1], "glycoCT_condensed", $npEnc );
      $re = json_decode ( $re );
      array_push ( $res, $re );
      array_push ( $original, $this->data ['gly'] [$i - 1] );
      array_push ( $no, $i );
      array_push ( $imgs, $this->data ['img'] [$i - 1] );
      $glycoct = @$this->Convert->Convert ( $this->data ['gly'] [$i - 1], "Glycoct" );
      $w = @$this->Convert->Convert ( $glycoct, "Wurcs" );
      array_push ( $glycocts, $glycoct );
      array_push ( $wurcs, $w );
    }
  }
  $this->set ( 'newStRes', $res );
  $this->set ( 'original', $original );
  $this->set ( 'no', $no );
  $this->set ( 'imgs', $imgs );
  $this->set ( 'glycoct', $glycocts );
  $this->set ( 'wurcs', $wurcs );
#$this->set ( 'debug', $this->data ['debug'] );
}

public function confirmation() {
  $input = rtrim ( $this->data ['text'] );
  $this->confirm($input);
  $this->set('doc', $this->Document->getDocument($this->Session->read('language')));
}

public function confirm($input) {
  
  
  if(!strstr($input, "RES")){
  
  $json = $this->Convert->Convert ( $input, "Glycoct" );
  $ctdata = json_decode($json);

  $orgArray = array();
  $ctArray = array();
  
  foreach ($ctdata as $value) {
  	if($value->status == true){
  		array_push($orgArray,$value->submitData->structure);
  		array_push($ctArray,rtrim ($value->result->structure));
  	}else{
  		array_push($orgArray,$value->submitData->structure);
  		array_push($ctArray,"err");
   	}
  }

  }else{
  	$orgArray = $this->Convert->toArrayData ( $input );
  	$ctArray = $orgArray;
  }
  
  $res = $this->GlySpace->checkList2 ( $ctArray, "glycoct" );
  
  $res = json_decode ( $res, true );
  $responses = $res ['responses'];
 
  
  $errRes = $res ['errorResponses'];
  $j = 0;
  $k = 0;
  for($i = 0; $i < count ( $responses ); $i ++) {

    if ($responses [$i] ['existing']) {
    	
    $ret [$j] ['ct'] = $responses [$i] ['structure'];
    $ret[$j]['id'] = $responses[$i]['accessionNumber'];
      $str1 = str_replace(array("\r\n","\r","\n"), '', $ret [$j] ['ct']);
      for($num=0 ;$num< count($ctArray);$num++){
      	$str2 = str_replace(array("\r\n","\r","\n"), '', $ctArray[$num]);
      	if($str1 == $str2){
      		$ret [$j] ['org'] = $orgArray[$num];
      	}
      }
      
      $j ++;
    } else  {
      $ret2 [$k] ['img'] = $this->GlySpace->imageGlycan ( $responses [$i] ['structure'], "glycoct" );
      $ret2 [$k] ['ct'] = $responses [$i] ['structure'];
      
      $str1 = str_replace(array("\r\n","\r","\n"), '', $ret2 [$k] ['ct']);
      for($num=0 ;$num< count($ctArray);$num++){
      	$str2 = str_replace(array("\r\n","\r","\n"), '', $ctArray[$num]);
      	if($str1 == $str2){
      		$ret2 [$k] ['org'] = $orgArray[$num];
      	}
      }
      //$ret2 [$k] ['org'] = $orgArray-> $responses [$i] ['structure'];
      $k ++;
    }
  }
  for($i = 0; $i < count ( $errRes ); $i ++) {
  	
    $ret3 [$i] ['ct'] = $errRes [$i] ['structure'];
    
    $str1 = str_replace(array("\r\n","\r","\n"), '', $ret3 [$i] ['ct']);
      for($num=0 ;$num< count($ctArray);$num++){
      	$str2 = str_replace(array("\r\n","\r","\n"), '', $ctArray[$num]);
      	if($str1 == $str2){
      	  $ret3 [$i] ['org'] = $orgArray[$num];
      	}
      }
      $ret3 [$i] ['mess'] = $errRes [$i] ['errorMessage'];
  }

  if ($j > 0) {
    $this->set ( 'exist', $ret );
  }
  if ($k > 0) {
    $this->set ( 'newSt', $ret2 );
  }
  if ($i > 0) {
    $this->set ( 'errSt', $ret3 );
  }
}

public function motif() {}

public function create() {
  //debug($this->data ['name']);
  //debug($this->data ['endings']);
  debug($this->data ['sequences']);
  //debug($this->data ['tags']);
  $results = $this->Motif->create_motif( $this->data ['name'], $this->data ['endings'], $this->data ['sequences'],  $this->data ['tags'],  $this->Session->read ( 'user.name' ), $this->Session->read ( 'user.pass' ) );

  $status = $results['status']; // return status

  if (preg_match ( "/error/", $status)) {
    $errorMsg = $results['errors']; // error messages
    $this->Session->setFlash($errorMsg[0], 'default', array('class' => 'text-error'));

    $this->redirect ( array (
          'action' => '../registries/motif' 
          ) );

  } else {
    $this->Session->setFlash($results['message']);
  }
}

  public function  download() {
  		$new = $this->request->data ['newOrg'];
  		$newct = $this->request->data ['newCt'];
  		$ex = $this->request->data ['existOrg'];
  		$exId = $this->request->data ['existId'];
  		$exct = $this->request->data ['existCt'];
  		$err = $this->request->data ['errOrg'];
  		$errct = $this->request->data ['errCt'];
  		$errmes = $this->request->data ['errMes'];
  		$this->autoRender = false;

  		$csv_file = sprintf("DL.csv", date("Ymd-hi")); 
  		header ("Content-disposition: attachment; filename=" . $csv_file);
  		header ("Content-type: application/octet-stream; name=" . $csv_file);
  		
  		$buf .= "original,glycoct,id\n";
  		for($i = 0;$i<count($ex);$i++ ){
  			$buf = $buf .'"'. $ex[$i].'","'.$exct[$i].'",'.$exId[$i]."\n";
  		}
  		$buf .= "original,glycoct\n";
  		for($i = 0;$i<count($new);$i++ ){
  			$buf = $buf .'"'. $new[$i].'","'."$newct[$i]".'"'."\n";
  		}
  		$buf .= "original,glycoct,messeage\n";	
  		for($i = 0;$i<count($err);$i++ ){
  			$buf = $buf .'"'. $err[$i].'","'."$errct[$i]".'",'.$errmes[$i]."\n";
  		}
  		print($buf);
  		return;
  	
  }
}
