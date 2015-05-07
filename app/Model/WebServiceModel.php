<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');
App::uses('HttpSocket', 'Network/Http');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class WebServiceModel extends AppModel {

	public $useTable = false;

#  protected $serviceHost = 'glycomics.ccrc.uga.edu';
	protected $serviceHost = 'test.glytoucan.org';
  protected $urlHost = '${hostname}';
  // protected $serviceHost = 'glytoucan.org';
  // protected $urlHost = 'glytoucan.org';
#	protected $serviceHost = 'localhost';
#	protected $servicePort = '8080'; // don't forget the :
	protected $serviceBase = '/glyspace/service';
  protected $schemeBase = 'http://';

  public function wsBase() {
    $url = $this->schemeBase.$this->serviceHost;
    if($this->servicePort != "") $url.=":";
    $url.=$this->servicePort.$this->serviceBase;
    return $url;
  }

  public function urlBase() {
    $url = $this->schemeBase.$this->urlHost;
    if($this->servicePort != "") $url.=":";
    $url.=$this->servicePort.$this->serviceBase;
    return $url;
  }

	protected function gsPost($serviceName, $data) {
		//$this->log('POST servicename:>' . $serviceName . '<:data>' . $data . '<');
		$url = $this->wsBase() . $serviceName;
		$options = array (
				'http' => array (
						'method' => 'POST',
						'header' => 'Content-Type: application/json',
						'content' => json_encode ( $data ) 
				) 
		);
		//debug(json_encode ( $data ) );
		return @file_get_contents ( $url, false, stream_context_create ( $options ) );
	}
	
	protected function gsGet($serviceName) {
		$this->log('GET servicename:>' . $serviceName . '<');
		$url = $this->wsBase() . $serviceName;
		$options = array (
				'http' => array (
						'method' => 'GET',
						'header' => 'Content-Type: application/json'
				) 
		);
		return @file_get_contents ( $url, false, stream_context_create ( $options ) );
	}
	
public function securePost($serviceName, $data, $name, $pass) {
  $this->log('POST servicename:>' . $serviceName . '<:data>' . $data. '<user>'.$name);
  $npEnc = base64_encode ( "$name:$pass" );
  $headers = array (
    "Content-Type: application/json",
    "Authorization: Basic " . "$npEnc" 
  );

  $opt = array (
    'http' => array (
    'method' => 'POST',
    'header' => implode ( "\r\n", $headers ),
    'content' => json_encode($data)
    //'content' => json_encode($data, JSON_UNESCAPED_SLASHES)
    )
    );


  $content = stream_context_create ( $opt );
  $request = array(
    'method' => 'POST',
    'uri' => array(
        'scheme' => 'http',
        'host' => $this->serviceHost,
        'port' => $this->servicePort,
        'user' => null,
        'pass' => null,
        'path' => $this->serviceBase . $serviceName,
        'query' => null,
        'fragment' => null
    ),
    'auth' => array(
        'method' => 'Basic',
        'user' => $name,
        'pass' => $pass 
    ),
    'version' => '1.1',
    'body' => json_encode($data),
    'line' => null,
    'header' => array(
      'Content-Type' => 'application/json',
      'Connection' => 'close',
      'User-Agent' => 'CakePHP'
    ),
    'raw' => null,
    'redirect' => false,
    'cookies' => array()
);

	$http = new HttpSocket();

	$contents = $http->request($request);
  
  return json_decode($contents,true);
}

/*
	public function secureGet($serviceName, $name, $pass) {
		$this->log('GET servicename:>' . $serviceName . '<:user>'.$name);
		$url = $this->urlBase() . $serviceName;
    $this->log('url>'.$url.'<');
		$npEnc = base64_encode ( "$name:$pass" );
		$headers = array (
				"Content-Type: application/json",
				"Authorization: Basic " . "$npEnc" 
		);
		$opt = array (
				'http' => array (
						'method' => 'GET',
						'header' => implode ( "\r\n", $headers ) 
				) 
		);
		$content = stream_context_create ( $opt );
		$contents = @file_get_contents ( $url, false, $content );
		//return json_decode($contents, true);
		return $contents;
	}
*/

public function secureGet($serviceName, $name, $pass) {
  $this->log('GET servicename:>' . $serviceName . '<:user>'.$name);
  $npEnc = base64_encode ( "$name:$pass" );
  $headers = array (
    "Content-Type: application/json",
    "Authorization: Basic " . "$npEnc" 
  );

  $opt = array (
    'http' => array (
    'method' => 'GET',
    'header' => implode ( "\r\n", $headers )
    )
  );

  $content = stream_context_create ( $opt );

  $request = array(
    'method' => 'GET',
    'uri' => array(
      'scheme' => 'http',
      'host' => $this->serviceHost,
      'port' => $this->servicePort,
      'user' => null,
      'pass' => null,
      'path' => $this->serviceBase . $serviceName,
      'query' => null,
      'fragment' => null
    ),
    'auth' => array(
        'method' => 'Basic',
        'user' => $name,
        'pass' => $pass 
    ),
    'version' => '1.1',
    'line' => null,
    'header' => array(
      'Content-Type' => 'application/json',
      'Connection' => 'close',
      'User-Agent' => 'CakePHP'
    ),
    'raw' => null,
    'redirect' => false,
    'cookies' => array()
);

	$http = new HttpSocket();

	$contents = $http->request($request);

#  $this->log('output:>' . $contents. '<');

  return json_decode($contents,true);
}
/*
public function securePut($serviceName, $name, $pass) {
  $this->log('PUT servicename:>' . $serviceName . '<:user>'.$name);
  $url = $this->urlBase() . $serviceName;
  $npEnc = base64_encode ( "$name:$pass" );
  $this->log('PUT npEcn:>' . $pass . "Authorization: Basic " . "$npEnc". "<");
  $headers = array (
    "Content-Type: application/json",
    "Authorization: Basic " . "$npEnc" 
  );
  $opt = array (
    'http' => array (
      'method' => 'PUT',
      'header' => implode ( "\r\n", $headers ) 
    ) 
  );
  $content = stream_context_create ( $opt );
  $contents = @file_get_contents ( $url, false, $content );
  //return json_decode($contents, true);
  return $contents;
}
*/

public function wsPost($serviceName, $data) {
  $this->log('POST servicename:>' . $serviceName . '<:data>' . json_encode($data) . '<');
  $headers = array (
    "Content-Type: application/json"
  );

  $opt = array (
    'http' => array (
      'method' => 'POST',
      'header' => implode ( "\r\n", $headers ),
      'content' => json_encode($data)
      //'content' => json_encode($data, JSON_UNESCAPED_SLASHES)
    )
  );

  $content = stream_context_create ( $opt );
  $request = array(
    'method' => 'POST',
    'uri' => array(
        'scheme' => 'http',
        'host' => $this->serviceHost,
        'port' => $this->servicePort,
        'user' => null,
        'pass' => null,
        'path' => $this->serviceBase . $serviceName,
        'query' => null,
        'fragment' => null
    ),
    'version' => '1.1',
    'body' => json_encode($data),
    'line' => null,
    'header' => array(
      'Content-Type' => 'application/json',
      'Connection' => 'close',
      'User-Agent' => 'CakePHP'
    ),
    'raw' => null,
    'redirect' => false,
    'cookies' => array()
  );

  $http = new HttpSocket();

  $contents = $http->request($request);

  $this->log("contents>".$contents."<");
  return json_decode($contents,true);
}

public function wsGet($serviceName) {
  $this->log('GET servicename:>' . $serviceName . '<');
  $request = array(
    'method' => 'GET',
    'uri' => array(
        'scheme' => 'http',
        'host' => $this->serviceHost,
        'port' => $this->servicePort,
        'user' => null,
        'pass' => null,
        'path' => $this->serviceBase . $serviceName,
        'query' => null,
        'fragment' => null
    ),
    'version' => '1.1',
    'line' => null,
    'header' => array(
      'Content-Type' => 'application/json',
      'Connection' => 'close',
      'User-Agent' => 'CakePHP'
    ),
    'raw' => null,
    'redirect' => false,
    'cookies' => array()
  );

  $http = new HttpSocket();

  $contents = $http->request($request);

  $this->log("contents>".$contents."<");
  //debug("contents>".$contents."<");
  return json_decode($contents,true);
}

public function securePut($serviceName, $data, $name, $pass) {
  $this->log('POST servicename:>' . $serviceName . '<:data>' . $data. '<user>'.$name);
  $npEnc = base64_encode ( "$name:$pass" );
  $headers = array (
    "Content-Type: application/json",
    "Authorization: Basic " . "$npEnc" 
  );

  $opt = array (
    'http' => array (
    'method' => 'PUT',
    'header' => implode ( "\r\n", $headers ),
    'content' => json_encode($data)
    )
  );

  $content = stream_context_create ( $opt );
  $request = array(
    'method' => 'PUT',
    'uri' => array(
        'scheme' => 'http',
        'host' => $this->serviceHost,
        'port' => $this->servicePort,
        'user' => null,
        'pass' => null,
        'path' => $this->serviceBase . $serviceName,
        'query' => null,
        'fragment' => null
    ),
    'auth' => array(
        'method' => 'Basic',
        'user' => $name,
        'pass' => $pass 
    ),
    'version' => '1.1',
    'body' => json_encode($data),
    'line' => null,
    'header' => array(
      'Content-Type' => 'application/json',
      'Connection' => 'close',
      'User-Agent' => 'CakePHP'
    ),
    'raw' => null,
    'redirect' => false,
    'cookies' => array()
);

	$http = new HttpSocket();

	$contents = $http->request($request);
  
  return json_decode($contents,true);
}

public function wsGet2($serviceName, $serviceBase ) {
  $this->log('GET servicename:>' . $serviceName . '<');
  $request = array(
    'method' => 'GET',
    'uri' => array(
        'scheme' => 'http',
        'host' => $this->serviceHost,
        'port' => $this->servicePort,
        'user' => null,
        'pass' => null,
        'path' => $serviceBase . $serviceName,
        'query' => null,
        'fragment' => null
    ),
    'version' => '1.1',
    'line' => null,
    'header' => array(
      'Content-Type' => 'application/json',
      'Connection' => 'close',
      'User-Agent' => 'CakePHP'
    ),
    'raw' => null,
    'redirect' => false,
    'cookies' => array()
  );

  $http = new HttpSocket();

  $contents = $http->request($request);

  $this->log("contents>".$contents."<");
  return json_decode($contents,true);
}

}
