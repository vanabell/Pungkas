<?php
class Admin_Model_AdartModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_AdartModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllAdart() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAdart();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllAdartdesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAdartdesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upAdart($data) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upAdart($data);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertAdart($data,$newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertAdart($data,$newid);

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