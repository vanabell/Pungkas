<?php

class LaporanController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	
    }

    public function indexAction()
    {
        // action body
    	//$this->_helper->layout->disableLayout();
    	$model = new Application_Model_LaporanModel();
    	$getall = $model->getAllLaporan();
    	$this->view->data = $getall;
    }
    
    public function detailAction()
    {
    	// action body
    	//$this->_helper->layout->disableLayout();
    	$model = new Application_Model_LaporanModel();
    	$req = $this->getRequest();
    	$id = $req->getParam('p');
    	$getlaporan = $model->getAllLaporanDet($id);
    	$this->view->data = $getlaporan;
    }
    
    

}

