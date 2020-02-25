<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function residente(){
		$this->load->model("empleado_model");
		$idRe = $_POST['idRe'];
		$data = array(
			'nombre' => $_POST['nombreRE'],
			'nit' => $_POST['nitRE']
		);

		if ($this->empleado_model->update_residente($idRe, $data)) {
			redirect(base_url()."Main");
		}else{
			redirect(base_url()."Main/errores");
		}
	}
}
