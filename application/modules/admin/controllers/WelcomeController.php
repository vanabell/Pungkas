<?php
class Admin_WelcomeController extends Zend_Controller_Action {
	
	public function editAction() {
		$this->_helper->layout->setLayout('layoutadmin');
		$model = new Admin_Model_WelcomeModel();
		$req = $this->getRequest();
	
		$det = $model->getAllWelcome();
		$this->view->det = $det;
		if ($this->_request->isPost()) {
			$Dataform = $this->_request->getPost();
			/*Zend_Debug::dump($Dataform);die();*/
			if( $Dataform['tos']==null) {
				$this->view->message = 'Please Fill out The Form First!';
			} else {
				if($det==null){
					$iddesc = $model->getAllWelcomedesc();
					if($iddesc==null) {
						$newid=1;
					} else {
						$newid = $iddesc[0]['welcome_id']+1;
					}
					
					$insert = $model->insertWelcome($Dataform, $newid);
				} else {
				$insert = $model->upWelcome($Dataform);
				}
				if($insert===true) {
					$this->view->msg = 'Insert Success';
				} else {
					$this->view->message = 'Insert Failed';
				}
				
				$det = $model->getAllWelcome();
				$this->view->det = $det;
			}
	
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