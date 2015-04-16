<?php
class Admin_LoginadminController extends Zend_Controller_Action {
	public function indexAction() {
		$this->_helper->layout->disableLayout();
		$this->view->title = "Login Admin";
		
		if ($this->_request->isPost()) {
			$dataform = $this->_request->getPost();
			$user = $dataform['username'];
			$pwd = $dataform['password'];
			$model = new Admin_Model_EditorModel();
			$data = $model->getAccount($user);
			
			$passencrypt = md5($user.$pwd);
			$password = $data[0]['ua_password'];
			
			if($password==$passencrypt) {
				$sessionadmin = Zend_Registry::get('session_admin');
				$sessionadmin->user_id = $data[0]['ua_firstname'];
				$sessionadmin->noreg = $data[0]['ua_admin_id'];
				$this->_helper->redirector('index','admin','admin');
			} else {
				$this->view->message = 'Wrong Password or Email, Please Try Again..';
			}
			
			
		}
	}
	
	public function logoutAction() {
	  Zend_Session::destroy(true);
      $this->_helper->redirector('index','loginadmin','admin');	
	}
}
