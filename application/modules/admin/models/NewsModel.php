<?php
class Admin_Model_NewsModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_NewsModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllNews() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllNews();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllNewsdesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllNewsdesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllNewsDet($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllNewsDet($id);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upNews($data, $tgl, $filename) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upNews($data,$tgl, $filename);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertNews($data, $filename, $newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertNews($data, $filename, $newid);

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