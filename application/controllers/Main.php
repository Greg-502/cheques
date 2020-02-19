<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('empleado_model');

	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');

		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);
		$data['empleados'] = $this->empleado_model->listar();


		$this->load->view('menu');
		$this->load->view('form',$data);
		$this->load->view('footer', $dataY);
	}

	public function cambiarStatus(){
		$data['base_url'] = $this->config->item('base_url');

		$id_empleado = $_POST['id'];
		$status = $_POST['status'];

		if ($status == "1") {
			$this->empleado_model->dar_baja($id_empleado);
			echo "Se dió de baja exitosamente";
		}elseif($status == "0"){
			$this->empleado_model->dar_alta($id_empleado);
			echo "Se dió de alta exitosamente";
		}
	}
}
