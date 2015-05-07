<?php
class UsersController extends AppController {
	public $name = 'Users';
	public $uses = array (
			'User', 'Glycan' 
	);
	public $helpers = array (
			'Session' 
	);

	public $components = array (
			'Session' 
	);

	public $layout = 'stanzas';

	public function index() {
	}

	public function out() {
		$this->Session->delete ( 'user' );
		$this->Session->delete ( 'mod' );
		$this->redirect ( array (
				'action' => '../Stanzas/index' 
		) );
	}

	public function up() {
		$data = array (
				'loginId' => $this->data ['Username'],
				'email' => $this->data ['Email'],
				'password' => $this->data ['Password'],
				'fullName' => $this->data ['Full Name'],
				'affiliation' => $this->data ['Affiliation'] 
		);
    CakeLog::write('debug', "params:>" . json_encode($data) . "<");
		$ret = $this->User->SignUp ( $data );
    CakeLog::write('debug', "ret:>" . $ret . "<");

    if ($ret === NULL){
				$this->Session->setFlash ( "Sincere Apologies. Signup server is under maintenance.");
			$this->redirect ( array (
					'action' => '../Stanzas/index' 
			) );
    }

		if (array_key_exists ( "errors" , $ret)) {
			$errors = $ret["errors"];
			if ($errors != null) {
				$message = $errors[0];
				$this->Session->setFlash ( $message);
			$this->redirect ( array (
					'action' => '../Stanzas/index' 
			) );
			}
		}

		if (array_key_exists ( "message" , $ret)) {
			$message = $ret["message"];
			if (preg_match ( "/success/", $message )) {
				$this->Session->setFlash ( __('Please wait for approval from Administor.') );
			}
		}
		$this->redirect ( array (
			'action' => '../Stanzas/index' 
		) );
	}

	public function upTest() {
		$data = array (
				'loginId' => "aoki",
				'email' => "test@bluetree.jp",
				'password' => "testtest",
				'fullName' => "test",
				'affiliation' => "test" 
		);
		$this->log($data);
		$ret = $this->User->SignUp ( $data );

		debug($ret);

//{"errors":["password, The password length must be greater than or equal to 5, must contain one or more uppercase characters, must contain one or more lowercase characters, must contain one or more numeric values and must contain one or more special characters"],"statusCode":400,"errorCode":"INVALID_INPUT","status":"error"}

		if (array_key_exists ( "errors" , $ret)) {
		$errors = $ret["errors"];
		if ($errors != null) {
			debug("errors>".$errors."<");
			$message = $errors[0];
			debug("Invalid ".$message."<");
		}
		}

		$data = array (
				'loginId' => "aoki",
				'email' => "test@bluetree.jp",
				'password' => "t3stTe\$t",
				'fullName' => "test",
				'affiliation' => "test" 
		);
		$this->log($data);
		$ret = $this->User->SignUp ( $data );

		debug($ret);

//{"errors":["password, The password length must be greater than or equal to 5, must contain one or more uppercase characters, must contain one or more lowercase characters, must contain one or more numeric values and must contain one or more special characters"],"statusCode":400,"errorCode":"INVALID_INPUT","status":"error"}

		if (array_key_exists ( "errors" , $ret)) {
		$errors = $ret["errors"];
		if ($errors != null) {
			debug("errors>".$errors."<");
			$message = $errors[0];
			debug("Invalid ".$message."<");
		}
		}

		$data = array (
				'loginId' => "aok3",
				'email' => "t3st@bluetree.jp",
				'password' => "t3stTe\$t",
				'fullName' => "test",
				'affiliation' => "test" 
		);
		$this->log($data);
		$ret = $this->User->SignUp ( $data );

		debug($ret);

//{"errors":["password, The password length must be greater than or equal to 5, must contain one or more uppercase characters, must contain one or more lowercase characters, must contain one or more numeric values and must contain one or more special characters"],"statusCode":400,"errorCode":"INVALID_INPUT","status":"error"}

		if (array_key_exists ( "errors" , $ret)) {
			$errors = $ret["errors"];
			if ($errors != null) {
				debug("errors>".$errors."<");
				$message = $errors[0];
				debug("Invalid ".$message."<");
			}
		}
	}

	public function in() {
		$ret = $this->User->SignIn ( $this->data ['Username'], $this->data ['Password'] );
		# {"statusCode":202,"message":"User is authorized","status":"success"}	

# array(10) { ["userId"]=> int(254) ["userName"]=> string(4) "aoki" ["loginId"]=> string(8) "aokinobu" ["email"]=> string(18) "aokinobu@gmail.com" ["active"]=> bool(true) ["validated"]=> bool(true) ["affiliation"]=> string(5) "gmail" ["roles"]=> array(1) { [0]=> array(2) { ["roleId"]=> int(3) ["roleName"]=> string(9) "MODERATOR" } } ["dateRegistered"]=> string(20) "2014-07-28T23:40:41Z" ["lastLoggedIn"]=> string(20) "2014-10-21T17:21:35Z" } 

	//	if (strpos($ret, "success") !== false) {
	//		$this->Session->write ( 'user', true );
	//	}

//		$status = $ret ['status'];

    $loginId = $ret['loginId'];
//		$this->log("loginId:>" . $loginId);

    if (!IS_NULL($loginId)) {

		$this->Session->write ( 'user', true );
		$this->Session->write ( 'user.name', $loginId);
		$this->Session->write ( 'user.pass', $this->data ['Password'] );

//		if (preg_match ( "/success/", $status) ) {
		// everything from here assumes a valid login.

		// check if moderator
    $userdata = $ret;
//		$this->log("userdata:>" . print_r($userdata));
//		$this->log("userdatauser:>" . $userdata['user']);

		$rolesarray = $userdata['roles'][0];

//		$this->log("rolesarray:>" . print_r($rolesarray));
//		$this->log("rolesarrayName:>" . $rolesarray['roleName']);
//    CakeLog::write('debug', "results for " . $userdata . ":>" . $rolesarray . "<");

		if ((preg_match ( "/admin/i", $rolesarray['roleName'])) || (preg_match ( "/moderator/i", $rolesarray['roleName']))) {
			$this->Session->write ( 'mod', true );
		}
/*
		foreach ($rolesarray as $Key => $Value) {
			debug($Key . $Value);
			if ((preg_match ( "/admin/i", $Key['@roleName'])) || (preg_match ( "/moderator/i", $Key['@roleName']))) {
				$this->Session->write ( 'mod', true );
			}
		}*/
		
		} else {
				$this->Session->setFlash('invalid login', 'default', array('class' => 'text-error'));
		}

		$this->redirect ( array (
				'action' => '../Stanzas/index' 
		) );
	}
	
	// profile will retrieve user info to display
	// everything possible in User
	// also execute search on User Glycans list.
	// /glycans/search/user
	// /glycans/search/user/pending
  public function profile() {

    // make sure we are in session
    if (!($this->Session->check('user.name')) || !($this->Session->check('user.pass'))) {
      return $this->redirect ( array ( 'action' => '../Stanzas/index' ) );
    }

    $this->log("user:>".$this->Session->read( 'user.name' )."<");
    $this->log("pass:>".$this->Session->read( 'user.pass' )."<");
    $ret = $this->User->Get( $this->Session->read( 'user.name' ), $this->Session->read( 'user.pass' ));

		//var_dump( $ret );
    //$this->log("user:>".var_dump($ret)."<");

/*
array (size=10)
  'userId' => int 2
  'userName' => string 'aoki' (length=4)
  'loginId' => string 'aoki' (length=4)
  'email' => string 'aoki@bluetree.jp' (length=16)
  'active' => boolean true
  'validated' => boolean true
  'affiliation' => string 'bluetree' (length=8)
  'roles' => 
    array (size=1)
      0 => 
        array (size=2)
          'roleId' => int 2
          'roleName' => string 'ADMIN' (length=5)
  'dateRegistered' => string '2014-07-22T12:05:40Z' (length=20)
  'lastLoggedIn' => string '2014-07-29T05:30:35Z' (length=20)
*/
    $this->set( 'user', $ret);

		$data = array (
				'loginId' => $ret["loginId"],
				'email' => $ret["email"]
		);

    $glycans = $this->Glycan->SearchUser( $data);
    //debug($glycans);

/*
array(
	'glycans' => array(
		(int) 0 => 'G98439YV',
		(int) 1 => 'G98825TE',
		(int) 2 => 'G21201AB',
		(int) 3 => 'G40194MZ',
		(int) 4 => 'G52814LJ'
	)
)
*/

    if (isset($glycans) && !IS_NULL($glycans) && array_key_exists("glycans", $glycans)) {

      $this->set ( 'glycanList', $glycans["glycans"]);
    } else {
      $this->set ( 'glycanList', null);
    }
  }

	public function listAll() {
    // make sure we are in session
    if (!($this->Session->check('user.name')) || !($this->Session->check('user.pass'))) {
      return $this->redirect ( array ( 'action' => '../Stanzas/index' ) );
    }
	//	'loginId' => $this->data ['Username'],
	//	'email' => $this->data ['Email'],
		$this->log('ret:>' . $this->Session->read( 'user.name' ) . $this->Session->read( 'user.pass' ));
		$ret = $this->User->ListAll( $this->Session->read( 'user.name' ), $this->Session->read( 'user.pass' ));
		$this->log('ret:>' . print_r($ret ));
//		$userlist = Xml::toArray(Xml::build($ret));
		//debug($userlist);
		//$this->log('userList:>' . print_r($userList));
		$this->set ( 'userList', $ret['users'] );
	}

	public function validateUser() { 
    // make sure we are in session
    if (!($this->Session->check('user.name')) || !($this->Session->check('user.pass'))) {
      return $this->redirect ( array ( 'action' => '../Stanzas/index' ) );
    }
		$this->log('userid:>' . $this->data['userId'] );
		$ret = $this->User->Validate( $this->Session->read( 'user.name' ), $this->Session->read( 'user.pass' ), $this->data['userId'] );
		$this->log('result:>' . $ret);
		$this->redirect ( array (
				'action' => 'listAll' 
		) );
	}

  public function emailpwform() { }

  public function emailpw() {
		$this->log('name:>' . $this->data['name'] );
		$ret = $this->User->EmailPw( $this->data['name'] );

    if (is_array($ret) && array_key_exists ( "errors" , $ret)) {
// 2014-07-29 12:26:30 Error: contents>{"errors":["user with email aoki@bluetree.j does not exist in the database"],"statusCode":404,"errorCode":"NOT_FOUND","status":"error"}<
      $error = $ret["errors"]["0"];
      $this->Session->setFlash($error, 'default', array('class' => 'text-error'));
		  $this->render('emailpwform');
    } else {
			$this->Session->setFlash (__("A recovery email has been sent."));
		  $this->redirect ( array (
		  		'action' => '../Stanzas/index' 
		  ) );
    }

  }

  public function recoveruserform() { }

  public function recoveruser() { 
		$this->log('email:>' . $this->data['email'] );
		$ret = $this->User->Recover( $this->data['email'] );
		
    if (is_array($ret) && array_key_exists ( "errors" , $ret)) {
// 2014-07-29 12:26:30 Error: contents>{"errors":["user with email aoki@bluetree.j does not exist in the database"],"statusCode":404,"errorCode":"NOT_FOUND","status":"error"}<
      $error = $ret["errors"]["0"];
      $this->Session->setFlash($error, 'default', array('class' => 'text-error'));
		  $this->render('recoveruserform');
    } else {
		  $this->set ( 'username', $ret );
    }
  }

  public function editpassword() {
	//var_dump($this->Session->read('user.pass'));
	// make sure we are in session
	if (!($this->Session->check('user.name') && $this->Session->check('user.pass'))) {
		return $this->redirect ( array ( 'action' => '../Stanzas/index' ) );
	}

    //var_dump($this->Session->read('user.name') . $this->Session->read('user.pass'));
//    $this->log($this->Session->read('user.name') . $this->Session->read('user.pass'));
//    $npEnc = base64_encode ( $this->Session->read('user.name') . ":" . $this->Session->read('user.pass') );

    //$this->log("npEnc->" . $npEnc . "<");
	$username = $this->Session->read('user.name');
	$current = null;
	$password = null;
	$confirmpassword = null;

	if (isset($this->data['current'])) { $current = $this->data['current']; } else return;
	if (isset($this->data['password'])) { $password = $this->data['password']; } else return;
	if (isset($this->data['confirmpassword'])) { $confirmpassword = $this->data['confirmpassword']; } else return;

$this->log('current:>' . $current);
$this->log('new:>' . $password );
$this->log('confirmnew:>' . $confirmpassword );

	// check the new matches confirmation
	if($password != $confirmpassword) {
		return $this->Session->setFlash(__("passwords do not match"), 'default', array('class' => 'text-error'));
	}

	$ret = $this->User->SignIn ( $username, $current);
	//var_dump($ret);
	if (is_array($ret) && array_key_exists ( "errors" , $ret)) {
// 2014-07-29 12:26:30 Error: contents>{"errors":["user with email aoki@bluetree.j does not exist in the database"],"statusCode":404,"errorCode":"NOT_FOUND","status":"error"}<
		$error = $ret["errors"]["0"];
		$this->Session->setFlash( $error, 'default', array('class' => 'text-error'));
		return $this->redirect ( array ( 'action' => '../Users/editpassword' ) );
	}

	// update to new
	// /users/{userName}/password
	$ret = $this->User->EditPassword( $username, $current, $password);
	//var_dump("editpass:>".$ret);
	$status = $ret ['status'];
	if (preg_match ( "/success/", $status) ) {
		return $this->Session->setFlash("the new password was updated.", 'default');
	} else {
		return $this->Session->setFlash("pw must contain symbol, number, and capital letter.", 'default');
	}

//	  return $this->out();
}

  public function role() {
    if (!($this->Session->check('user.name') && $this->Session->check('user.pass'))) {
      return $this->redirect ( array ( 'action' => '../Stanzas/index' ) );
    }

  }

	public function janrain() {
    //$token = $this->request->query['token'];
    $token = $this->data ['token'];
		$this->log("token:>" . urlencode ($token));
		//$ret = $this->User->Janrain ( $token );
		//$this->log("token:>" . print_r($ret));
		$ret = $this->User->SignIn ( $token, 'token' );
		# {"statusCode":202,"message":"User is authorized","status":"success"}	
		//var_dump( $ret );
		$this->log("ret:>" . print_r($ret) . "<");

	//	if (strpos($ret, "success") !== false) {
	//		$this->Session->write ( 'user', true );
	//	}

			
		// everything from here assumes a valid login.

		// check if moderator
//		$userdata = $this->User->Get ( $this->data ['token'], 'token' );

//		$this->log("userdata:>" . print_r($userdata));

    $loginId = $ret['loginId'];
		$this->log("loginId:>" . $loginId);

    if (!IS_NULL($loginId)) {

		$this->Session->write ( 'user', true );
		$this->Session->write ( 'user.name', $loginId);
		$this->Session->write ( 'user.pass', 'token' );

		$rolesarray = $ret['roles'][0];
		
		$this->log("rolesarray:>" . print_r($rolesarray));
		$this->log("rolesarrayName:>" . $rolesarray['roleName']);

		if ((preg_match ( "/admin/i", $rolesarray['roleName'])) || (preg_match ( "/moderator/i", $rolesarray['roleName']))) {
			$this->Session->write ( 'mod', true );
		}
/*
		foreach ($rolesarray as $Key => $Value) {
			debug($Key . $Value);
			if ((preg_match ( "/admin/i", $Key['@roleName'])) || (preg_match ( "/moderator/i", $Key['@roleName']))) {
				$this->Session->write ( 'mod', true );
			}
		}*/
		
		} else {
				$this->Session->setFlash('Please wait to be validated by a moderator.', 'default');
		}

		$this->redirect ( array (
				'action' => '../Stanzas/index' 
		) );
	}
	
	public function signin() {
	}
	
	public function signup() {
	}
}
