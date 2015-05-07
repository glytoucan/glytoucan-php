<?php
class Convert extends AppModel {
	public $name = 'Convert';
	public $useTable = false;
	public function Convert($glycan = null, $format = null) {
		$url = 'http://rings.t.soka.ac.jp/cgi-bin/tools/utilities/convert/convertJson.pl';
		$data = array (
				'in_data' => $glycan,
				'convert_to' => $format,
				'convert_path' => '',
				'type' => 'text' 
		);
		$data = http_build_query ( $data, "", "&" );
		$header = array (
				"Content-Type: application/x-www-form-urlencoded",
				"Content-Length: " . strlen ( $data ) 
		);
		$options = array (
				'http' => array (
						'method' => 'POST',
						'header' => implode ( "\r\n", $header ),
						'content' => $data 
				) 
		);
		$contents = @file_get_contents ( $url, false, stream_context_create ( $options ) );
		return $contents;
	}
	public function toArrayData($input = null) {
		$array = explode ( "\n", $input ); 
		$array = array_map ( 'trim', $array ); 
		$array = array_filter ( $array, 'strlen' ); 
		$input = implode ( "\t", $array );
		if (preg_match ( '/RES/', $input )) {
			$array = preg_split ( '/RES\t1[^0-9]/', $input, null, PREG_SPLIT_OFFSET_CAPTURE );
			
			for($i = 0; $i < count ( $array ); $i ++) {
				$ret [$i] = str_replace ( "\t", "\n", substr ( $input, $array [$i] [1] - 6, 6 ) ) . str_replace ( "\t", "\n", $array [$i] [0] );
			}
			array_shift ( $ret );
		} else if (preg_match ( '/<\/sugar\>/', $input )) {
		} else if (preg_match ( '/Glyde/', $input )) {
		} else if (preg_match ( '/NODE/', $input )) {
		} else if (preg_match ( '/^\[\]/', $input )) {
		} else if (preg_match ( '/[ab][0-9]-[0-9]/', $input )) {
			$array = explode ( "\t", $input );
		} else if (preg_match ( '/([A-Z]{1,3})[ab\?](\?|\d)/', $input )) {
			$array = explode ( "\t", $input );
		}
		return $ret;
	}
	public function getImg($kcf = null) {
		$url = 'http://rings.t.soka.ac.jp/cgi-bin/tools/utilities/KCFtoIMAGE/KCF_to_IMAGE.pl';
		$data = array (
				'KCF' => $kcf 
		);
		$data = http_build_query ( $data, "", "&" );
		$header = array (
				"Content-Type: application/x-www-form-urlencoded",
				"Content-Length: " . strlen ( $data ) 
		);
		$options = array (
				'http' => array (
						'method' => 'POST',
						'header' => implode ( "\r\n", $header ),
						'content' => $data 
				) 
		);
		$contents = file_get_contents ( $url, false, stream_context_create ( $options ) );
		return $contents;
	}
}
