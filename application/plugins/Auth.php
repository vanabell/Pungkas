<?php
class Application_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        //$authNamespace = new Zend_Session_Namespace('kuis');
        $module = $request->getModuleName();
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        
        $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
        $session_admin=new Zend_Session_Namespace('session_admin');
         
        Zend_Registry::set('session_admin',$session_admin);
         
        
	        if( $this->_request->getControllerName() != 'index'
		    && $this->_request->getControllerName() != 'register'
		    && $this->_request->getControllerName() != 'api'
		    && $this->_request->getControllerName() != 'veritrans')
		{
				if($module=='admin'){/* @var $redirector Zend_Controller_Action_Helper_Redirector */
		    	  	if(!isset($session_admin->user_id) || $session_admin->user_id == ''){
		    	  		return $redirector->gotoSimple('index', 'loginadmin', 'admin', array());
		    	  	}
		    	  }
	        } 
        	
    }
}