<?php
class Admin_NewsController extends Zend_Controller_Action {
	
	public function indexAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_NewsModel();
		$list = $model->getAllNews();
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
			$model = new Admin_Model_NewsModel();
			$Dataform = $this->_request->getPost();
			$upload = new Zend_File_Transfer();
			$info = $upload->getFileInfo('file');
			$file=$info['file']['name'];
			$size = $info['file']['size'];
			
				if($Dataform['nama']==null || $Dataform['tos']==null) {
					$this->view->message = 'Please Fill out The Form First!';
				} else if($size>=600000) {
					$this->view->message = 'Image Maximum 600Kb';
				} else {
						$iddesc = $model->getAllNewsdesc();
						$newid = $iddesc[0]['news_id']+1;
						//Zend_Debug::dump($info);die();
						if($file!="") {
								$filename = 'news-'.$newid.'.jpg';
								$path = realpath(APPLICATION_PATH . '/../public/img/news');
								if (file_exists($path.$filename))
								{
									unlink($path.$filename);
									$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
								} else {
									$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
								}
								
						} else {
							$filename = null;
						}
						$insert = $model->insertNews($Dataform, $filename, $newid);
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
		$model = new Admin_Model_NewsModel();
		$req = $this->getRequest();
		$id = $req->getParam('p');
	
		$det = $model->getAllNewsDet($id);
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
					$path = realpath(APPLICATION_PATH . '/../public/img/news/');
					//Zend_Debug::dump($path.'/'.$filename);die();
					if (file_exists($path.'/'.$filename))
					{
						unlink($path.'/'.$filename);
						$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
					} else {
						$filename = 'news-'.$Dataform['id'].'.jpg';
						$a =  move_uploaded_file($info['file']['tmp_name'],$path.'/'.$filename);
					}
				} else {
					$filename = $Dataform['image'];
				}
				$time = new Zend_Date();
				$tgl = $time->get('YYYY-MM-dd HH:mm:ss');
				$insert = $model->upNews($Dataform, $tgl, $filename);
				if($insert===true) {
					$this->view->msg = 'Insert Success';
				} else {
					$this->view->message = 'Insert Failed';
				}
			}
	
		}
	
		$id = $req->getParam('p');
		if($id!='') {
			$det = $model->getAllNewsDet($id);
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