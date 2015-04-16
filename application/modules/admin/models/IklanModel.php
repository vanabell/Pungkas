<?php
class Admin_Model_IklanModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_IklanModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllIklan() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllIklan();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllIklandesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllIklandesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllIklanDet($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllIklanDet($id);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upIklan($data, $tgl, $filename) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upIklan($data,$tgl, $filename);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertIklan($data, $filename, $newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertIklan($data, $filename, $newid);

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