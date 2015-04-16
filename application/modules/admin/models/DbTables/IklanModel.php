<?php
class Admin_Model_DbTables_IklanModel extends Zend_Db_Table_Abstract {

	public function getAllIklan() {
		try {
			$select="SELECT * FROM iklan";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllIklandesc() {
		try {
			$select="SELECT * FROM iklan order by iklan_id desc";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllIklanDet($id) {
		try {
			$select="SELECT * FROM iklan where iklan_id='".$id."'";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function insertIklan($data, $filename, $newid) {
		try {
			$stmt=$this->_db->prepare("INSERT INTO iklan
													(
														iklan_id,
														iklan_detail,
														iklan_name,
														iklan_image,
														iklan_status,
														iklan_owner,
														cp
													)
													VALUES
													(
														:id,
														:detail,
														:name,
														:image,
														:stat,
														:own,
														:cp
													)
													"
			);
			$stmt->bindParam(':id', $newid);
			$stmt->bindParam(':detail', $data['tos']);
			$stmt->bindParam(':name', $data['nama']);
			$stmt->bindParam(':image', $filename);
			$stmt->bindParam(':stat', $data['status']);
			$stmt->bindParam(':own', $data['owner']);
			$stmt->bindParam(':cp', $data['cp']);
			$a = $stmt->execute();
	
			return true;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function upIklan($data, $tgl, $filename) {
		try {
			$stmt=$this->_db->prepare("UPDATE iklan SET
										iklan_name=:title,
										iklan_modif=:sub,
										iklan_detail=:tos,
										iklan_image=:image,
										iklan_status=:stat,
										iklan_owner=:own,
										cp=:cp
									   WHERE iklan_id=:id" );
	
			$stmt->bindParam(':id', $data['id']);
			$stmt->bindParam(':title', $data['nama']);
			$stmt->bindParam(':sub', $tgl);
			$stmt->bindParam(':tos', $data['tos']);
			$stmt->bindParam(':image', $filename);
			$stmt->bindParam(':stat', $data['status']);
			$stmt->bindParam(':own', $data['owner']);
			$stmt->bindParam(':cp', $data['cp']);
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