<?php
class Application_Model_DbTables_LaporanModel extends Zend_Db_Table_Abstract {

	public function getAllLaporan() {
		try {
			$select="SELECT * FROM laporan";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllLaporandesc() {
		try {
			$select="SELECT * FROM laporan order by lap_id desc";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllLaporanDet($id) {
		try {
			$select="SELECT * FROM laporan where lap_id='".$id."'";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function insertLaporan($data, $newid) {
		try {
			$stmt=$this->_db->prepare("INSERT INTO laporan
													(
														lap_id,
														lap_detail,
														lap_name,
														lap_bulan,
														lap_tahun
													)
													VALUES
													(
														:id,
														:name,
														:title,
														:date,
														:place
													)
													"
			);
			$stmt->bindParam(':id', $newid);
			$stmt->bindParam(':name', $data['tos']);
			$stmt->bindParam(':title', $data['nama']);
			$stmt->bindParam(':date', $data['bulan']);
			$stmt->bindParam(':place', $data['tahun']);
			$a = $stmt->execute();
	
			return true;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function upLaporan($data, $tgl) {
		try {

			$stmt=$this->_db->prepare("UPDATE Laporan SET
										lap_name=:title,
										lap_detail=:tos,
										lap_bulan=:date,
										lap_tahun=:place
									   WHERE lap_id=:id" );
	
			$stmt->bindParam(':id', $data['id']);
			$stmt->bindParam(':title', $data['nama']);
			$stmt->bindParam(':tos', $data['tos']);
			$stmt->bindParam(':date', $data['bulan']);
			$stmt->bindParam(':place', $data['tahun']);
			$a = $stmt->execute();
			return true;
		} catch (Zend_Exception $e) {
			return array("sts"=>false,"msg"=>$e->getMessage());
		}
	}
	
	public function search($kategori, $kunci) {
		try {
			if($kategori=='all'){
				$select="SELECT * FROM useradmin order by ua_created desc";
				$rows=$this->_db->fetchAll($select);
				return $rows;
			} else if($kategori=='firstname') {
				$select="SELECT * FROM useradmin where ua_firstname like'%".$kunci."%'";
				$rows=$this->_db->fetchAll($select);
				return $rows;
	
			} else if($kategori=='lastname') {
				$select="SELECT * FROM useradmin where ua_lastname like'%".$kunci."%'";
				$rows=$this->_db->fetchAll($select);
				return $rows;
	
			} else if($kategori=='email') {
				$select="SELECT * FROM useradmin where ua_email like'%".$kunci."%'";
				$rows=$this->_db->fetchAll($select);
				return $rows;
	
			} else if($kategori=='akses') {
				$select="SELECT * FROM useradmin where ua_akses like'%".$kunci."%'";
				$rows=$this->_db->fetchAll($select);
				return $rows;
	
			}
	
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
}