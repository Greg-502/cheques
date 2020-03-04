<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

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

	function fetch()
	{
   		if($this->input->post('cargo_re'))
		{
			$datos["cargo_monto"] = $this->MountModel->fetch($this->input->post('cargo_re'));
			echo $datos["cargo_monto"]->monto;
		}
	}

	function fetch_le()
	{
   		if($this->input->post('cargo_re'))
		{
			$datos["cargo_monto"] = $this->MountModel->fetch($this->input->post('cargo_re'));
			echo $datos["cargo_monto"]->monto_letras;
		}
	}

	function monto() {
		$id_cargo = $this->input->post("cargo");

		$data = array(
			'monto' => $this->input->post("monto"),
		    'monto_letras' => $this->input->post("letras")
		);
		if ($this->AddModel->updateCargo($data,$id_cargo)) {
			echo "1";
		} else {
			echo "0";
		}
	}

	function residente(){
		$status = 1;
		$nit = $this->input->post("nit");

		if ($this->NitModel->searchNit($nit)) {
			redirect(base_url()."Add/error");
		} else {
			$data = array(
				'nombre' => $this->input->post("nombres"),
				'status' => $status,
				'nit' => $nit,
				'id_cargo' => $this->input->post("cargo")
			);

			if ($this->AddModel->insertResidente($data)) {
	//			redirect(base_url());
					echo "1";
			} else {
	//			redirect(base_url()."Add/error");
					echo "0";
			}
		}
	}

	function error(){
		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);

		$this->load->view('menu');
		$this->load->view('error');
		$this->load->view('footer', $dataY);
	}
}
