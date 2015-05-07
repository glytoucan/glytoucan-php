<?php
class Contributor extends AppModel
{
	public $name = 'Contributor';
	public $useTable = false;

/**
 * Contributor Management
*/

	// GET/contributor/{username}
	public function contributor($name=NULL) {
		return file_get_contents("http://${webservice.url}/glyspace/service/contributor/$name");
	}

}
?>
