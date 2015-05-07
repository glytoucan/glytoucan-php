<?php
class Virtuoso extends AppModel {
	public $name = 'Virtuoso';
	public $useTable = false;
	public function query($query) {
		$sparql = new Sparql ();
		$sparql->init ( false );
		$sparql->iri ( 'http://150.37.133.59:10000/sparql/' );
		$sparql->config ( array (
				'default-graph' => '',
				'should-sponge' => 'soft',
				'debug' => 'off',
				'timeout' => '',
				'format' => 'application/json',
				'save' => 'display',
				'fname' => '',
				'query' => $query 
		) );
		return json_decode ( $sparql->query (), true );
	}
}
