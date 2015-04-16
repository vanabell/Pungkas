<?php
class Admin_Model_AgendaModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_AgendaModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllAgenda() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAgenda();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllAgendadesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAgendadesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllAgendaDet($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllAgendaDet($id);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upAgenda($data, $tgl) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upAgenda($data,$tgl);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertAgenda($data,$newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertAgenda($data,$newid);

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