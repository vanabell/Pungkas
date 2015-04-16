<?php

class AgendaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	
    }

    public function indexAction()
    {
        // action body
    	//$this->_helper->layout->disableLayout();
    	$model = new Application_Model_AgendaModel();
    	$getallagenda = $model->getAllAgenda();
    	$this->view->data = $getallagenda;
    }
    
    public function detailAction()
    {
    	// action body
    	//$this->_helper->layout->disableLayout();
    	$model = new Application_Model_AgendaModel();
    	$req = $this->getRequest();
    	$id = $req->getParam('p');
    	$getagenda = $model->getAllAgendaDet($id);
    	$this->view->data = $getagenda;
    }
    
    

}

