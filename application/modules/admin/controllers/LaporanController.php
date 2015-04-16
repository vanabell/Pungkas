<?php
class Admin_LaporanController extends Zend_Controller_Action {
	
	public function indexAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_LaporanModel();
		$list = $model->getAllLaporan();
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
			$model = new Admin_Model_LaporanModel();
			$Dataform = $this->_request->getPost();
			
				if($Dataform['nama']==null || $Dataform['tos']==null) {
					$this->view->message = 'Please Fill out The Form First!';
				} else {
						$iddesc = $model->getAllLaporandesc();
						if($iddesc==null) {
							$newid=1;
						} else {
							$newid = $iddesc[0]['lap_id']+1;
						}
						
						//Zend_Debug::dump($info);die();
						$insert = $model->insertLaporan($Dataform, $newid);
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
		$model = new Admin_Model_LaporanModel();
		$req = $this->getRequest();
		$id = $req->getParam('p');
	
		$det = $model->getAllLaporanDet($id);
		$this->view->det = $det;
		if ($this->_request->isPost()) {
			$Dataform = $this->_request->getPost();
			
			if($Dataform['nama']==null || $Dataform['tos']==null) {
				$this->view->message = 'Please Fill out The Form First!';
			} else {
				$time = new Zend_Date();
				$tgl = $time->get('YYYY-MM-dd HH:mm:ss');
				$insert = $model->upLaporan($Dataform, $tgl);
				if($insert===true) {
					$this->view->msg = 'Insert Success';
				} else {
					$this->view->message = 'Insert Failed';
				}
			}
	
		}
	
		$id = $req->getParam('p');
		if($id!='') {
			$det = $model->getAllLaporanDet($id);
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