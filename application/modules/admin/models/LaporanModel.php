<?php
class Admin_Model_LaporanModel {
	protected $_dbTableProduct;
	protected $_db;

	public function __construct()
	{
		$this->_dbTableProduct = new Admin_Model_DbTables_LaporanModel();
		$this->_db = Zend_Registry::get('db_doc');
	}

	public function getAllLaporan() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllLaporan();

		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllLaporandesc() {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllLaporandesc();
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function getAllLaporanDet($id) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->getAllLaporanDet($id);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function upLaporan($data, $tgl) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->upLaporan($data,$tgl);
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}
	
	public function insertLaporan($data,$newid) {
		$productTable = $this->_dbTableProduct;
		try {
			$result = $productTable->insertLaporan($data,$newid);

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