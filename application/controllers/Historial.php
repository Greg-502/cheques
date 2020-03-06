<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historial extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index($id)
	{
		redirect(base_url()."XLote/code_5");
		/*$this->load->model("HistorialModel");
		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);

		if ($id > 0) {
			$data = array(
				'historia' => $this->HistorialModel->invoice($id)
			);

			if (!$data) {
				redirect(base_url()."Add/error");
			} else {
				$this->load->view("menu");
				$this->load->view("historial",$data);
				$this->load->view("footer", $dataY);
			}
		} else {
			redirect(base_url()."Add/error");
		}*/

	}
}
