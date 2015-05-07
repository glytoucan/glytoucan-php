<?php
App::uses ( 'Model', 'WebServiceModel' );

require_once "WebServiceModel.php";
class User extends WebServiceModel {
	public $name = 'User';
	
	public function SignIn($name, $pass) {
		return $this->secureGet('/users/signin.json', $name, $pass);
	}


/*
{"errors":["password, The password length must be greater than or equal to 5, must contain one or more uppercase characters, must contain one or more lowercase characters, must contain one or more numeric values and must contain one or more special characters"],"statusCode":400,"errorCode":"INVALID_INPUT","status":"error"}

array(
	'statusCode' => (int) 201,
	'message' => 'User added successfully',
	'status' => 'success'
)
*/
	public function SignUp($data) {
		$service = '/users/add';
		return $this->wsPost ( $service, $data );
	}
	
  public function Get($name, $pass) {
    $this->log("GET:name>".$name . '<pass>' . $pass);
    return $this->secureGet('/users/get/' . $name . ".json", $name, $pass);
  }

  public function ListAll($name, $pass) {
    return $this->secureGet('/users/list.json', $name, $pass);
  }

  public function Validate($name, $pass, $loginId) {
    $this->log($name . '<>' . $loginId);
    return $this->securePut('/users/' . $loginId . '/validate', "", $name, $pass);
  }
	
	public function Authorize($name, $pass, $loginId) {
		$this->log($name . '<>' . $loginId);
		return $this->securePut('/users/' . $loginId . '/activate', "", $name, $pass);
	}

	public function EmailPw($name) {
		$this->log($name);
		return $this->wsGet('/users/' . $name. '/password');
	}

	public function Recover($email) {
		$this->log($email);
		return $this->wsGet('/users/recover?email=' . $email);
	}

	public function EditPassword($name, $pass, $newpassword) {
		return $this->securePut('/users/' . $name . '/password', $newpassword, $name, $pass);
	}

	public function Janrain($token) {
		$this->log($token);
		return $this->wsGet2('/j_spring_janrain_security_check?token=' . $token, "/glyspace" );
	}
}
