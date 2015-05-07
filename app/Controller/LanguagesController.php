<?php
class LanguagesController extends AppController {
	public $name = 'Languages';
	public $components = array ('Session');
	public function index() {}
	public function en() {
		$this->Session->write('language', 1);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	public function ja() {
		$this->Session->write('language', 2);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	public function ch1() {
		$this->Session->write('language', 3);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	public function ch2() {
		$this->Session->write('language', 4);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	public function fr() {
		$this->Session->write('language', 5);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	public function de() {
		$this->Session->write('language', 6);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	public function ru() {
		$this->Session->write('language', 7);
		return $this->redirect(array('controller' => '/Preferences/index'));
	}
	
	public function rmtmp($url) {
		$docFile = dirname(__FILE__)."/../tmp/" . $this->Session->read('language') . ".doc";
		if($_SERVER["SERVER_NAME"] == 'test.glytoucan.org' || $_SERVER["SERVER_NAME"] == 'www.test.glytoucan.org'){
			unlink($docFile);
		}
		if($_SERVER["SERVER_NAME"] == 'yamazaki.glytoucan.org' || $_SERVER["SERVER_NAME"] == 'www.yamazaki.glytoucan.org'){
			unlink($docFile);
		}
		$url = '/'.str_replace("_", "/", $url);
		print $url;
		return $this->redirect(array('controller' => $url));
	}
}
