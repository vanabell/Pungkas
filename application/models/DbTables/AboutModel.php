<?php
class Application_Model_DbTables_AboutModel extends Zend_Db_Table_Abstract {

	public function getAllAbout() {
		try {
			$select="SELECT * FROM aboutus";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllAboutdesc() {
		try {
			$select="SELECT * FROM aboutus order by about_id desc";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function insertAbout($data, $newid) {
		try {
			$stmt=$this->_db->prepare("INSERT INTO aboutus
													(
														about_id,
														about_detail
													)
													VALUES
													(
														:id,
														:name
													)
													"
			);
			$stmt->bindParam(':id', $newid);
			$stmt->bindParam(':name', $data['tos']);
			$a = $stmt->execute();
	
			return true;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function upAbout($data) {
		try {
			$stmt=$this->_db->prepare("UPDATE aboutus SET
										about_detail=:tos
									   WHERE about_id=:id" );
	
			$stmt->bindParam(':id', $data['id']);
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