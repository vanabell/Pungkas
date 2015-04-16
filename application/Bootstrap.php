<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initSession(){
		$session = new Zend_Session_Namespace('session_doc');
		Zend_Registry::set('session_doc', $session);
	}
	
	 public function  _initRegistry(){
		$this->bootstrap('multidb');
		$docDb = $this->getResource('multidb');
		Zend_Registry::set('db_doc', $docDb->getDb('doc'));
	} 
	
	/*
	protected function _initSetting()
	{
		$setting = new Zend_Config_Ini(APPLICATION_PATH . '/configs/setting.ini', APPLICATION_ENV);
		Zend_Registry::set('setting', $setting);
		return $setting;
	}*/
	
	protected function _initPlugin()
	{
		$this->bootstrap('frontcontroller');
		$frontController = $this->getResource('frontcontroller');
		/* @var $frontController Zend_Controller_Front */
	
		$frontController->registerPlugin(new Application_Plugin_Adminauth());
	}
}

