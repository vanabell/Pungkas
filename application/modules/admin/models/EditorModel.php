<?php
class Admin_Model_EditorModel {
	protected $_dbTableProduct;
	protected $_db;
	
	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_EditorModel();
		$this->_db = Zend_Registry::get('db_doc');
	}
	
	public function getAccount($email) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAccount($email);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAdminlist() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAdminlist();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAdmindet($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAdmindet($id);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function updateAdmin($data, $time) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->updateAdmin($data, $time);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function updateAdminPass($data, $password,$time) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->updateAdminPass($data,$password, $time);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function delAdmin($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->delAdmin($id);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertAdmin($data, $password) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertAdmin($data, $password);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function cekAdmin($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->cekAdmin($id);
	
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