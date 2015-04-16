<?php
class Admin_Model_StrukturModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_StrukturModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllStruktur() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllStruktur();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllStrukturdesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllStrukturdesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upStruktur($data) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upStruktur($data);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertStruktur($data,$newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertStruktur($data,$newid);

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