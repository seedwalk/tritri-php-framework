	
<?php
class MDLUsers {
	var $fields = array();

	public function __construct() {
		
		$this->fields['id']['type'] = 'unset';
		$this->fields['id']['value'] = 0;
		
		$this->fields['email']['type'] = 'unset';
		
		$this->fields['firstname']['type'] = 'unset';
		
		$this->fields['lastname']['type'] = 'unset';
		
		$this->fields['password']['type'] = 'unset';
		
		$this->fields['phone']['type'] = 'unset';
		
		$this->fields['mobile']['type'] = 'unset';
		
		$this->fields['country']['type'] = 'unset';
		
		$this->fields['city']['type'] = 'unset';
		
		$this->fields['id_upload']['type'] = 'unset';
		
		$this->fields['hash']['type'] = 'unset';
		
		$this->fields['change_pwd']['type'] = 'unset';
		
		$this->fields['dias_consecutivos']['type'] = 'unset';
		
		$this->fields['libros_vistos']['type'] = 'unset';
		
		$this->fields['mejor_tiempo_ lesson_secs']['type'] = 'unset';
		
		$this->fields['ultima_lesson_vista']['type'] = 'unset';
		
		$this->fields['lessons_in_a_row']['type'] = 'unset';
		
		$this->fields['escuelas_egresadas']['type'] = 'unset';
		
		$this->fields['desafios_ganados']['type'] = 'unset';
		
		$this->fields['desafios_invicto']['type'] = 'unset';
		
		$this->fields['user_type']['type'] = 'unset';
		
		$this->fields['acepto_policy']['type'] = 'unset';
		
		$this->fields['created']['type'] = 'unset';
		
		$this->fields['updated']['type'] = 'unset';
		
		$this->fields['created_by']['type'] = 'unset';
		
	}

	

	public function setId($val) {
		$this->fields['id']['value'] = $val;
	}

	public function getId() {
		return $this->fields['id']['value'];
	}


	

	public function setEmail($val) {
		$this->fields['email']['value'] = $val;
	}

	public function getEmail() {
		return $this->fields['email']['value'];
	}


	

	public function setFirstname($val) {
		$this->fields['firstname']['value'] = $val;
	}

	public function getFirstname() {
		return $this->fields['firstname']['value'];
	}


	

	public function setLastname($val) {
		$this->fields['lastname']['value'] = $val;
	}

	public function getLastname() {
		return $this->fields['lastname']['value'];
	}


	

	public function setPassword($val) {
		$this->fields['password']['value'] = $val;
	}

	public function getPassword() {
		return $this->fields['password']['value'];
	}


	

	public function setPhone($val) {
		$this->fields['phone']['value'] = $val;
	}

	public function getPhone() {
		return $this->fields['phone']['value'];
	}


	

	public function setMobile($val) {
		$this->fields['mobile']['value'] = $val;
	}

	public function getMobile() {
		return $this->fields['mobile']['value'];
	}


	

	public function setCountry($val) {
		$this->fields['country']['value'] = $val;
	}

	public function getCountry() {
		return $this->fields['country']['value'];
	}


	

	public function setCity($val) {
		$this->fields['city']['value'] = $val;
	}

	public function getCity() {
		return $this->fields['city']['value'];
	}


	

	public function setIdUpload($val) {
		$this->fields['id_upload']['value'] = $val;
	}

	public function getIdUpload() {
		return $this->fields['id_upload']['value'];
	}


	

	public function setHash($val) {
		$this->fields['hash']['value'] = $val;
	}

	public function getHash() {
		return $this->fields['hash']['value'];
	}


	

	public function setChangePwd($val) {
		$this->fields['change_pwd']['value'] = $val;
	}

	public function getChangePwd() {
		return $this->fields['change_pwd']['value'];
	}


	

	public function setDiasConsecutivos($val) {
		$this->fields['dias_consecutivos']['value'] = $val;
	}

	public function getDiasConsecutivos() {
		return $this->fields['dias_consecutivos']['value'];
	}


	

	public function setLibrosVistos($val) {
		$this->fields['libros_vistos']['value'] = $val;
	}

	public function getLibrosVistos() {
		return $this->fields['libros_vistos']['value'];
	}


	

	public function setMejorTiempolessonSecs($val) {
		$this->fields['mejor_tiempo_ lesson_secs']['value'] = $val;
	}

	public function getMejorTiempolessonSecs() {
		return $this->fields['mejor_tiempo_ lesson_secs']['value'];
	}


	

	public function setUltimaLessonVista($val) {
		$this->fields['ultima_lesson_vista']['value'] = $val;
	}

	public function getUltimaLessonVista() {
		return $this->fields['ultima_lesson_vista']['value'];
	}


	

	public function setLessonsInARow($val) {
		$this->fields['lessons_in_a_row']['value'] = $val;
	}

	public function getLessonsInARow() {
		return $this->fields['lessons_in_a_row']['value'];
	}


	

	public function setEscuelasEgresadas($val) {
		$this->fields['escuelas_egresadas']['value'] = $val;
	}

	public function getEscuelasEgresadas() {
		return $this->fields['escuelas_egresadas']['value'];
	}


	

	public function setDesafiosGanados($val) {
		$this->fields['desafios_ganados']['value'] = $val;
	}

	public function getDesafiosGanados() {
		return $this->fields['desafios_ganados']['value'];
	}


	

	public function setDesafiosInvicto($val) {
		$this->fields['desafios_invicto']['value'] = $val;
	}

	public function getDesafiosInvicto() {
		return $this->fields['desafios_invicto']['value'];
	}


	

	public function setUserType($val) {
		$this->fields['user_type']['value'] = $val;
	}

	public function getUserType() {
		return $this->fields['user_type']['value'];
	}


	

	public function setAceptoPolicy($val) {
		$this->fields['acepto_policy']['value'] = $val;
	}

	public function getAceptoPolicy() {
		return $this->fields['acepto_policy']['value'];
	}


	


	public function retrieve() {
		$result = LogicUsers::doList('id = '.$this->getId());
		if ($result->num_rows == 0) {
			$this->setId(0);
			return false; 
		}
		$status = $result->fetch_object();
		foreach ($this->fields as $key => $value) {
			$this->fields[$key]['value'] = $status->$key;

		}
		return true;
	}

	public function update() {

		$result = LogicUsers::update($this->fields);
		return $result;
	}

	public function updatePass() {
		$result = LogicUsers::updatePass($this->fields['id']['value'], $this->fields['pwd']);
		return $result;
	}
}
?>
