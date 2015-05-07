<?php
App::uses ( 'AppController', 'Controller' );
App::uses ( 'AppController', 'Controller' );
App::uses ( 'Sparql', 'Vendor/Sparql' );
App::uses ( 'Endpoint', 'Vendor/Sparql' );
class InsertsController extends AppController {
	public $name = 'Inserts';
	public $uses = array (
			'Virtuoso' 
	);
	public $helpers = array (
			'Html',
			'Form' 
	);
	public $components = array ();
	public function index() {
		// $this->autoLayout = false;
		// $this->redirect('http://rings.t.soka.ac.jp/glytoucan/');
		// $this->autoRender = false;
		// echo "<h1>glytoucan</h1>";
		$this->set ( "rdf", "INSERT_RDF" );
		/*
		 * $this->modelClase = null; if ($this->request->data){ $result = Sanitize::stripAll( $this->request->data['text1']); } else { $result = "no data."; } $this->set("result", $result);
		 */
	}
	/*
	 * public function form() { $text1 = $this->data["text1"]; $this->set("text1", $text1); }
	 */
	public function insert_rdf($gid = NULL) {
		// $this->autoRender = true;
		// echo "<h2>Insert</h2>";
		// $this->exitIfEmpty($gid);
		// $gid = $this-requeset->data['text1'];
		$this->modelClase = null;
		
		$query = <<<EOL
		prefix rings: <http://www.rings.t.soka.ac.jp/2013/12/rdf#>
		INSERT INTO <http://purl.jp/bio/test/rings/glycan/rdf>
		{
		<http://www.rings.t.soka.ac.jp/rdf/glycan/G00001>
		a rings:glycan ;
		rings:has_glycan_id "$gid" ;
		rings:has_image <http://www.rings.t.soka.ac.jp/cgi-bin/tools/search/KCaMHiLiter2.pl?G00001> ;
		rings:has_sequence <http://www.rings.t.soka.ac.jp/rdf/glycan_sequence/kcf/G00001>, <http://www.rings.t.soka.ac.jp/rdf/glycan_sequence/linearcode/G00001>, <http://www.rings.t.soka.ac.jp/rdf/glycan_sequence/glycoct/G00001>, <http://www.rings.t.soka.ac.jp/rdf/glycan_sequence/linucs/G00001> ;
		rdfs:sameAs <http://www.glycome-db.org/database/showStructure.action?glycomeId=1808> ;
		rings:has_interaction <http://www.rings.t.soka.ac.jp/rdf/interaction/R05969>, <http://www.rings.t.soka.ac.jp/rdf/interaction/R05970> .

		}
EOL;
		/*
		 * $glycan = $this->Virtuoso->query($query); if (empty($glycan['results']['bindings'][0]['gid'])) { $this->render('no_data'); return; }
		 */
		$this->Virtuoso->query ( $query );
		// $this->set('glycan', $glycan);
	}
	
	/*
	 * public function interaction($rid = NULL) { $this->exitIfEmpty($rid); $query = <<<EOL prefix rings:<http://www.rings.t.soka.ac.jp/2013/12/rdf#> select ?rid ?type ?sgid ?simage ?pgid ?pimage from <http://www.rings.t.soka.ac.jp/2013/12/rdf> where { ?interaction rings:has_interaction_id "$rid" ; rings:has_interaction_type ?type ; rings:has_interaction_id ?rid . optional { ?interaction rings:has_glycan_substrate ?substrates . ?substrates rings:has_glycan_id ?sgid . ?substrates rings:has_image ?simage . } optional { ?interaction rings:has_glycan_product ?products . ?products rings:has_glycan_id ?pgid . ?products rings:has_image ?pimage . } } EOL; $interaction = $this->Virtuoso->query($query); if (empty($interaction['results']['bindings'][0]['rid'])) { $this->render('no_data'); return; } $interaction = $this->adjust_interaction($interaction); $this->set('interaction', $interaction); } private function adjust_interaction($interactions) { $adjusted = array(); foreach ($interactions['results']['bindings'] as $interaction) { if (!empty($interaction['sgid'])) $adjusted["substrate"][$interaction['sgid']['value']] = $interaction['simage']['value']; if (!empty($interaction['pgid'])) $adjusted["product"][$interaction['pgid']['value']] = $interaction['pimage']['value']; if (!empty($interaction['type'])) $adjusted["type"] = $interaction["type"]["value"]; if (!empty($interaction['rid'])) $adjusted["rid"] = $interaction["rid"]["value"]; } return $adjusted; } private function exitIfEmpty($data) { if (!isset($data)) { $this->render('no_data'); exit; } }
	 */
}
