<?php
class Admin_IklanController extends Zend_Controller_Action {
	
	public function indexAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_IklanModel();
		$list = $model->getAllIklan();
		$this->view->detail = $list;
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
			$model = new Admin_Model_IklanModel();
			$Dataform = $this->_request->getPost();
			$upload = new Zend_File_Transfer();
			$info = $upload->getFileInfo('file');
			$file=$info['file']['name'];
			$size = $info['file']['size'];
			
				if($Dataform['nama']==null || $Dataform['tos']==null) {
					$this->view->message = 'Please Fill out The Form First!';
				} else if($size>=1000000) {
					$this->view->message = 'Image Maximum 1MB';
				} else {
						$iddesc = $model->getAllIklandesc();
						if($iddesc==null) {
							$newid = 1;
						} else {
							$newid = $iddesc[0]['iklan_id']+1;
						}
						
						//Zend_Debug::dump($info);die();
						if($file!="") {
								$filename = 'iklan-'.$newid.'.jpg';
								$path = realpath(APPLICATION_PATH . '/../public/img/iklan');
								if (file_exists($path.'/'.$filename))
								{
									unlink($path.'/'.$filename);
									$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
								} else {
									$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
								}
								
						} else {
							$filename = null;
						}
						$insert = $model->insertIklan($Dataform, $filename, $newid);
						//Zend_Debug::dump($insert);die();
						if($insert===true) {
							$this->view->msg = 'Insert Success';
						} else {
							$this->view->message = 'Insert Failed';
						}
				}
		}		
		
	}
	
	public function editAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_IklanModel();
		$req = $this->getRequest();
		$id = $req->getParam('p');
	
		$det = $model->getAllIklanDet($id);
		$this->view->det = $det;
		if ($this->_request->isPost()) {
			$Dataform = $this->_request->getPost();
			$upload = new Zend_File_Transfer();
			$info = $upload->getFileInfo('file');
			$file=$info['file']['name'];
			$size = $info['file']['size'];
			/*Zend_Debug::dump($Dataform);die();*/
			if($Dataform['nama']==null || $Dataform['tos']==null) {
				$this->view->message = 'Please Fill out The Form First!';
			} else if($size>=600000) {
					$this->view->message = 'Image Maximum 600Kb';
			} else {
				if($file!="") {
					$filename = $Dataform['image'];
					$path = realpath(APPLICATION_PATH . '/../public/img/iklan/');
					//Zend_Debug::dump($path.'/'.$filename);die();
					if (file_exists($path.'/'.$filename))
					{
						unlink($path.'/'.$filename);
						$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
					} else {
						$filename = 'iklan-'.$Dataform['id'].'.jpg';
						$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
					}
				} else {
					$filename = $Dataform['image'];
				}
				$time = new Zend_Date();
				$tgl = $time->get('YYYY-MM-dd HH:mm:ss');
				$insert = $model->upIklan($Dataform, $tgl, $filename);
				if($insert===true) {
					$this->view->msg = 'Insert Success';
				} else {
					$this->view->message = 'Insert Failed';
				}
			}
	
		}
	
		$id = $req->getParam('p');
		if($id!='') {
			$det = $model->getAllIklanDet($id);
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