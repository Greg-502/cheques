<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function residente(){
		$this->load->model("empleado_model");

		$idRe = $_POST['id'];
		$data = array(
			'nombre' => $_POST['nombre'],
			'nit' => $_POST['nit'],
			'id_cargo' => $_POST['cargo']
		);

		$datos = $this->empleado_model->update_residente($idRe, $data);
		print json_encode($datos, JSON_UNESCAPED_UNICODE);
	}
}
