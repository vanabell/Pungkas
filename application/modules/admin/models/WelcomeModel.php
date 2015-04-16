<?php
class Admin_Model_WelcomeModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_WelcomeModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllWelcome() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllWelcome();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllWelcomedesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllWelcomedesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upWelcome($data) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upWelcome($data);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertWelcome($data,$newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertWelcome($data,$newid);

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	

	public function search($kategori, $kunci) {
		$productTable = $this->_dbTableProduct;
		try {
				
			$result = $productTable->search($kategori, $kunci);
				
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
}