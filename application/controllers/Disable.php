<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disable extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model("DisableModel");
		$data['base_url'] = $this->config->item('base_url');

		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);

		$validador = 8;
		
		$data['empleados'] = $this->DisableModel->listar();
		$data['numeral'] = $validador;

		$this->load->view('menu');
		$this->load->view('form',$data);
		$this->load->view('footer', $dataY);
	}
}
