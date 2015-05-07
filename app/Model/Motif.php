<?php
require_once "WebServiceModel.php";

class Motif extends WebServiceModel 
{
	public $name = 'Motif';
	public $useTable = false;

/**
 * Motif Management
*/

	// GET /motifs/list
	public function motifList() {
    return $this->wsGet("/motifs/list.json");
	}
	

	// GET /motifs/search(?tag,queryType)    e.g. /motifs/search?tag=full&tag=O-glycan&queryType=OR
	public function motifSearch($tag=NULL,$tag2=NULL,$type=NULL) {
		if (empty($tag2)){
			return file_get_contents("/motifs/search?tag=$tag");
		}
		if (isset($tag,$tag2)){
			return file_get_contents("/motifs/list");
		}
		//return file_get_contents("http://www.glyspace.org/motifs/search?tag=full&tag=N-Glycan&queryType=AND");
		return file_get_contents("/motifs/search?tag=$tag&tag=$tag2&queryType=$type");
	}


	// GET /motifs/get(?motifName="")   e.g.  http://www.glyspace.org/motifs/get?motifName=Galalpha1-3Gal%20epitope
	public function motifGet($name=NULL) {
		return file_get_contents("/motifs/get?motifName=$name");
	}


	// GET/motifs/image/{sequenceid}     e.g.  http://www.glyspace.org/motifs/image/135?format=png&notation=cfg&style=extended
	public function motifImage($seqid,$format,$notation,$style) {
		return file_get_contents("/motifs/image/$seqid?format=$format&notation=$notation&style=$style");
	}


	// POST /motifs/add/
	public function create_motif($name, $endings, $sequences, $tags, $username, $pass) {
		debug($tags);
//		$sequences = urlencode($sequences);
//		$sequences = str_replace(array("\r\n", "\r", "\n", " "), '\n', $sequences);
		debug($sequences);
		// Input data  
                //$data = array( 'tags' => array("$tags"), 'sequences' => $sequences, 'name' => "$name", 'reducing' => array("$endings"));
                $data = array('tags' => array($tags), 'sequences' => array( array('reducing' => true, 'sequence' => $sequences) ), 'name' => $name);
                //$data = array( 'tags' => array($tags), 'sequences' => array(null), 'name' => $name );
                //$data = array( 'tags' => array($tags), 'sequences' => array("reducing=true&valid=true"), 'name' => $name );
                //$data = array('tags' => array($tags), 'sequences' => array($endings), 'name' => $name);
		$service = '/motifs/add';
                //debug(json_encode($data, JSON_UNESCAPED_SLASHES));
		return $this->securePost ( $service, $data, $username, $pass);



/**

/app/Model/Motif.php (line 46)
'test6'
/app/Model/Motif.php (line 49)
'RES\n1b:a-dgal-HEX-1:5\n2s:n-acetyl\n3b:b-dgal-HEX-1:5\nLIN\n1:1d(2+1)2n\n2:1o(3+1)3d'
/app/Model/Motif.php (line 58)
'{"tags":["test6"],"sequences":[{"reducing":true,"sequence":"RES\n1b:a-dgal-HEX-1:5\n2s:n-acetyl\n3b:b-dgal-HEX-1:5\nLIN\n1:1d(2+1)2n\n2:1o(3+1)3d"}],"name":"test6"}'
/app/Controller/RegistriesController.php (line 111)
'{"statusCode":201,"message":"Motif added successfully","status":"success"}'


*/



        }

/*

	// POST /motifs/add/{motifname}/sequence
	public function motif_add($mname,$reducing,$seqId,$valid,$seq) {
		$url = "http://www.glyspace.org/motifs/add/$mname/sequence";
		// Input data  
                $data = array(
						'reducing' => "$reducing",
						'sequenceId' => "$seqId",   // int
						'valid' => "$valid",
						'sequence' => "$seq"
                );
                $options = array('http' => array(
                        'method' => 'POST',
						'header' => 'Content-Type: application/json',  // If use GlycanInput.xsd, content-type is "application/xml".
                        'content' => json_encode($data)  // encoding GlycanInput.json
                ));
                $contents = file_get_contents($url, false, stream_context_create($options));
		return $contents;
        }


	// PUT /motifs/update/{sequenceId}/reducing
	public function update_reducing($seqId,$value=NULL){
		// $value is parameter which is "true" or "false"
		// return XML format
		return file_get_contents("http://www.glyspace.org/motifs/$seqId/reducing?value=$value");

	}



	// PUT /motifs/update/{sequenceId}/valid
	public function update_valid($seqId,$value=NULL){
		// $value is parameter which is "true" or "false"
		// return XML format
		return file_get_contents("http://www.glyspace.org/motifs/$seqId/reducing?value=$value");

	}
*/

}
?>
