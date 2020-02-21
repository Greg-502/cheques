<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model("AddModel");
		$this->load->model("MountModel");
		$this->load->model("NitModel");
	}

	public function index()
	{
		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);

		$data = array(
			'montos' => $this->MountModel->mounts(),
		);

		$this->load->view('menu');
		$this->load->view('add', $data);
		$this->load->view('footer', $dataY);
	}

	function monto() {
		$data = array(
			'monto' => $this->input->post("monto"),
		    'monto_letras' => $this->input->post("letras")
		);
		if ($this->AddModel->insertMount($data)) {
			redirect(base_url()."Add");
		} else {
			redirect(base_url()."Main/errores");
		}
	}

	function residente(){
		$status = 1;
		$nit = $this->input->post("nit");

		if ($this->NitModel->searchNit($nit)) {
			redirect(base_url()."Main/errores");
		} else {
			$data = array(
				'nombre' => $this->input->post("nombres"),
				'cargo' => $this->input->post("cargo"),
				'status' => $status,
				'nit' => $nit,
				'id_monto' => $this->input->post("monto")
			);

			if ($this->AddModel->insertResidente($data)) {
				redirect(base_url());
			} else {
				redirect(base_url()."Main/errores");
			}
		}
	}
}
