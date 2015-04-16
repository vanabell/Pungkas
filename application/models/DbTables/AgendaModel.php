<?php
class Application_Model_DbTables_AgendaModel extends Zend_Db_Table_Abstract {

	public function getAllAgenda() {
		try {
			$select="SELECT * FROM agenda";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllAgendadesc() {
		try {
			$select="SELECT * FROM agenda order by agenda_id desc";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function getAllAgendaDet($id) {
		try {
			$select="SELECT * FROM agenda where agenda_id='".$id."'";
			$rows=$this->_db->fetchAll($select);
			return $rows;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function insertAgenda($data, $newid) {
		try {
			$stmt=$this->_db->prepare("INSERT INTO agenda
													(
														agenda_id,
														agenda_detail,
														agenda_name,
														agenda_date,
														agenda_place
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
			$stmt->bindParam(':date', $data['tgl-agenda']);
			$stmt->bindParam(':place', $data['place']);
			$a = $stmt->execute();
	
			return true;
		} catch (Zend_Exception $e) {
			return $e->getMessage();
		}
	}
	
	public function upAgenda($data, $tgl) {
		try {

			$stmt=$this->_db->prepare("UPDATE agenda SET
										agenda_name=:title,
										agenda_modif=:sub,
										agenda_detail=:tos,
										agenda_date=:date,
										agenda_place=:place
									   WHERE agenda_id=:id" );
	
			$stmt->bindParam(':id', $data['id']);
			$stmt->bindParam(':title', $data['nama']);
			$stmt->bindParam(':sub', $tgl);
			$stmt->bindParam(':tos', $data['tos']);
			$stmt->bindParam(':date', $data['tgl-agenda']);
			$stmt->bindParam(':place', $data['place']);
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