<?php
class Admin_Model_DbTables_AdartModel extends Zend_Db_Table_Abstract {

	public function getAllAdart() {
		try {
			$select="SELECT * FROM Adart";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllAdartdesc() {
		try {
			$select="SELECT * FROM adart order by adart_id desc";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function insertAdart($data, $newid) {
		try {
			$stmt=$this->_db->prepare("INSERT INTO Adart
													(
														adart_id,
														adart_detail
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
	
	public function upAdart($data) {
		try {
			$stmt=$this->_db->prepare("UPDATE adart SET
										Adart_detail=:tos
									   WHERE adart_id=:id" );
	
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