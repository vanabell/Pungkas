<?php
class Application_Plugin_Adminauth extends Zend_Controller_Plugin_Abstract
{
public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
    	  
    	  $module = $request->getModuleName();
    	  $controller = $request->getControllerName();
    	  $action = $request->getActionName();
    	  
    	  //echo $module.$controller.$action;
    	  $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
    	  $session_admin=new Zend_Session_Namespace('session_admin');
    	  
    	  Zend_Registry::set('session_admin',$session_admin);
    	  
    	  if($module=='admin'  && $controller!='loginadmin'){/* @var $redirector Zend_Controller_Action_Helper_Redirector */
    	  	if(!isset($session_admin->user_id) || $session_admin->user_id == ''){
    	  		return $redirector->gotoSimple('index', 'loginadmin', 'admin', array());
    	  	}
    	  }
    }
}