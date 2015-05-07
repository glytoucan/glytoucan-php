<?php
App::uses ( 'Model', 'WebServiceModel' );

require_once "WebServiceModel.php";
class Glycan extends WebServiceModel{
	public $name = 'Glycan';

	public $useTable = false;

	public function FullJson(){
		return $this->gsGet('/glycans/list.json?payload=exhibit');
	}

	// /glycans/search/user/
	// /glycans/search/user/pending
	public function SearchUser($user) {
		$this->log($user);
		return $this->wsPost('/glycans/search/user.json', $user);
	}

/**
 * Glycan Management
 *
 * $strc - structure string(s)
 * $enco - encoding string
 * $user - username
 * $pass - password
 *
 */
	public function GlycanAdd($strc, $enco, $user, $pass) {
		$service = '/glycans/add';
		$data = array (
				'structure' => $strc,
				'encoding' => $enco 
		);
		return  $this->securePost( $service, $data, $user, $pass );
	}

    public function Query($aNum = NULL) {

        if ( empty ( $aNum )) {
            $serviceName = "/glycans/list";
            return $this->gsGet ($serviceName);
        }

        $serviceName = "/glycans/$aNum";
        return $this->gsGet ($serviceName);
    }

	public function exact($strc, $enco) {
		$service = '/glycans/search/exact';
		$data = array (
				'structure' => "$strc",
				'encoding' => "$enco" 
		);
		return $this->gsPost ( $service, $data );
   	}
	
	public function substructure($strc, $enco) {
		$service = '/glycans/search/substructure.json?payload=exhibit';
        $data = array(
			'structure' => "$strc",
			'encoding' => "$enco"
        );
		return $this->gsPost ( $service, $data );

 	}   


	public function SearchMotifName($name) {
		$this->log($name);
		// return $this->wsPost('/glycans/search/motif.json?payload=exhibit', $name);
		return $this->gsPost('/glycans/search/motif.json?payload=exhibit', $name);
	}

public function SearchComp($hexNacMin, $hexNacMax, $hexNMin, $hexNMax, $neuAcMin, $neuAcMax, $neuGcMin, $neuGcMax, $hexAMin, $hexAMax, $dHexMin, $dHexMax, $kdoMin, $kdoMax, $kdnMin, $kdnMax, $hexoseMin, $hexoseMax, $pentoseMin, $pentoseMax, $sulfateMin, $sulfateMax, $phosphateMin, $phosphateMax, $methylMin, $methylMax, $acetylMin, $acetylMax, $otherMin, $otherMax) {

  if (($hexNacMin != NULL && $hexNacMin != 0) && ($hexNacMax != NULL && $hexNacMax != 0))
    $query['hexNac'] = (array('min' => $hexNacMin, 'max' => $hexNacMax));
  if (($hexNMin != NULL && $hexNMin != 0) && ($hexNMax != NULL && $hexNMax != 0))
    $query['hexN'] = (array('min' => $hexNMin, 'max' => $hexNMax));
  if (($neuAcMin != NULL && $neuAcMin != 0) && ($neuAcMax != NULL && $neuAcMax != 0))
    $query['neuAc'] = (array('min' => $neuAcMin, 'max' => $neuAcMax));
  if (($neuGcMin != NULL && $neuGcMin != 0) && ($neuGcMax != NULL && $neuGcMax != 0))
    $query['neuGc'] = (array('min' => $neuGcMin, 'max' => $neuGcMax));
  if (($hexAMin != NULL && $hexAMin != 0) && ($hexAMax != NULL && $hexAMax != 0))
  $query['hexA'] = (array('min' => $hexAMin, 'max' => $hexAMax));
		if (($dHexMin != NULL && $dHexMin != 0) && ($dHexMax != NULL && $dHexMax != 0))
			$query['dHex'] = (array('min' => $dHexMin, 'max' => $dHexMax));
		if (($kdoMin != NULL && $kdoMin != 0) && ($kdoMax != NULL && $kdoMax != 0))
			$query['kdo'] = (array('min' => $kdoMin, 'max' => $dHexMax));
		if (($kdnMin != NULL && $kdnMin != 0) && ($kdnMax != NULL && $kdnMax != 0))
			$query['kdn'] = (array('min' => $kdnMin, 'max' => $kdnMax));
		if (($hexoseMin != NULL && $hexoseMin != 0) && ($hexoseMax != NULL && $hexoseMax != 0))
			$query['hexose'] = (array('min' => $hexoseMin, 'max' => $hexoseMax));
		if (($pentoseMin != NULL && $pentoseMin != 0) && ($pentoseMax != NULL && $pentoseMax != 0))
			$query['pentose'] = (array('min' => $pentoseMin, 'max' => $pentoseMax));
		if (($sulfateMin != NULL && $sulfateMin != 0) && ($sulfateMax != NULL && $sulfateMax != 0))
			$query['sulfate'] = (array('min' => $sulfateMin, 'max' => $sulfateMax));
		if (($phosphateMin != NULL && $phosphateMin != 0) && ($phosphateMax != NULL && $phosphateMax != 0))
			$query['phosphate'] = (array('min' => $phosphateMin, 'max' => $phosphateMax));
		if (($methylMin != NULL && $methylMin != 0) && ($methylMax != NULL && $methylMax != 0))
			$query['methyl'] = (array('min' => $methylMin, 'max' => $methylMax));
		if (($acetylMin != NULL && $acetylMin != 0) && ($acetylMax != NULL && $acetylMax != 0))
			$query['acetyl'] = (array('min' => $acetylMin, 'max' => $acetylMax));
		if (($otherMin != NULL && $otherMin != 0) && ($otherMax != NULL && $otherMax != 0))
			$query['other'] = (array('min' => $otherMin, 'max' => $otherMax));

  if (!isset($query)) {
    $query=null;
  }
  // var_dump($query);
  return $this->gsPost('/glycans/search/composition.json?payload=exhibit', $query);
  
}

/*
        public function Upload($data, $username, $pass) {
                return $this->SecureUploadPost('/glycans/add/batchFile', $data, $username, $pass);
	}
  */
}
