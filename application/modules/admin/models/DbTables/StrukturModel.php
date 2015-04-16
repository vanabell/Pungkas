<?php
class Admin_Model_DbTables_StrukturModel extends Zend_Db_Table_Abstract {

	public function getAllStruktur() {
		try {
			$select="SELECT * FROM Struktur";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllStrukturdesc() {
		try {
			$select="SELECT * FROM Struktur order by Struktur_id desc";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function insertStruktur($data, $newid) {
		try {
			$stmt=$this->_db->prepare("INSERT INTO struktur
													(
														struktur_id,
														struktur_detail,
														struktur_periode
													)
													VALUES
													(
														:id,
														:name,
														:title
													)
													"
			);
			$stmt->bindParam(':id', $newid);
			$stmt->bindParam(':name', $data['tos']);
			$stmt->bindParam(':title', $data['nama']);
			$a = $stmt->execute();
	
			return true;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function upStruktur($data) {
		try {
			$stmt=$this->_db->prepare("UPDATE struktur SET
										struktur_detail=:tos,
										struktur_periode=:title
									   WHERE struktur_id=:id" );
	
			$stmt->bindParam(':id', $data['id']);
			$stmt->bindParam(':title', $data['nama']);
			$stmt->bindParam(':tos', $data['tos']);
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