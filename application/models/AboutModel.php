<?php
class Application_Model_AboutModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Application_Model_DbTables_AboutModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllAbout() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAbout();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllAboutdesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAboutdesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upAbout($data) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upAbout($data);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertAbout($data,$newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertAbout($data,$newid);

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