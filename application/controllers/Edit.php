<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->helper('url');
	}

	public function residente(){
		$this->load->model("empleado_model");

		$id = $_POST['idRe'];

		$data = array(
			'nombre' => $_POST['nombreRE'],
			'nit' => $_POST['nitRE'],
			'id_cargo' => $_POST['cargoRE']
		);

		$datos = $this->empleado_model->update_residente($id, $data);
		if ($datos) {
			echo "1";
		} else {
			echo "0";
		}

	}
}
