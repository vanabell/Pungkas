<?php
class Admin_AdminController extends Zend_Controller_Action {
	
	public function indexAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_EditorModel();
		$listadmin = $model->getAdminlist();
		$this->view->detail = $listadmin;
		if ($this->_request->isPost()) {
			$Dataform = $this->_request->getPost();
			$kategori = $Dataform['kategori'];
			$kunci = $Dataform['key'];
				
			if($kategori=='0') {
				$this->view->msg = 'Inputan tidak boleh kosong';
			} else {
				$data = $model->search($kategori, $kunci);
				$this->view->detail = $data;
			}
		}
	}
	
	public function addAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		if ($this->_request->isPost()) {
			$model = new Admin_Model_EditorModel();
			$Dataform = $this->_request->getPost();
				
			if($Dataform['nama']==null || $Dataform['lastname']==null || $Dataform['email']==null || $Dataform['password']==null || $Dataform['akses']==null) {
				$this->view->message = 'Please Fill out The Form First!';
			} else if (!filter_var($Dataform['email'], FILTER_VALIDATE_EMAIL)) {
				$this->view->message = "Invalid email format"; 
			} else {
				$time = new Zend_Date();
				$tgl = $time->get('YYYY-MM-dd HH:mm:ss');
				$cekemail = $model->cekAdmin($Dataform['email']);
				//Zend_Debug::dump(count($cekemail));die();
				if(count($cekemail)==0) {	
					$password = md5($Dataform['email'].$Dataform['password']);
					$insert = $model->insertAdmin($Dataform, $password);
					if($insert===true) {
						//zend_debug::dump($insert);die();
						$this->view->msg = 'Insert Success';
					} else {
						$this->view->message = 'Insert Failed';
					}
				} else {
					$this->view->message = 'Email is Already Use';
				}
				
				
			}		
		}
	}
	
	public function editAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_EditorModel();
		$req = $this->getRequest();
		$id = $req->getParam('p');
	
		$det = $model->getAdmindet($id);
		$this->view->det = $det;
		if ($this->_request->isPost()) {
			$Dataform = $this->_request->getPost();
			/*Zend_Debug::dump($Dataform);die();*/
			if($Dataform['nama']==null || $Dataform['lastname']==null) {
				$this->view->message = 'Please Fill out The Form First!';
			} else if($Dataform['password']!=''|| $Dataform['password']!=null) {
				$time = new Zend_Date();
				$tgl = $time->get('YYYY-MM-dd HH:mm:ss');
				$password = md5($Dataform['email'].$Dataform['password']);
				//Zend_Debug::dump($Dataform);die();
				$insert = $model->updateAdminPass($Dataform, $password, $tgl);
			}
			else 
			{
				$time = new Zend_Date();
				$tgl = $time->get('YYYY-MM-dd HH:mm:ss');
				//Zend_Debug::dump($Dataform);die();
				$insert = $model->updateAdmin($Dataform, $tgl);
			}
	
			if($insert===true) {
				$this->view->msg = 'Insert Success';
			} else {
				$this->view->message = 'Insert Failed';
			}
	
		}
	
		$id = $req->getParam('p');
		if($id!='') {
			$det = $model->getAdmindet($id);
			$this->view->det = $det;
		}
	}
	
	
	public function deleteAction() {
		$model = new Admin_Model_EditorModel();
		$req = $this->getRequest();
		$id = $req->getParam('key');
	
		$delete = $model->delAdmin($id);
	
		return $this->_helper->json(
				array(
						'edit' => $delete,
				)
		);
	
	
	}
	
}