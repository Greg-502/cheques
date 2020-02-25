<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class XLote extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('LotesModel');
	}

	public function index()
	{
		$from = $_POST['from'];
		$to = $_POST['to'];

		//consulta si $to es igual o menor a el ultimo id en la base de datos
		if ($this->LotesModel->maximum()) {
			$data = array(
				'maximo' => $this->LotesModel->maximum()
			);

			$maximo = $data['maximo']->maximum;

			if (($to < $from) || ($to > $maximo)) {
				redirect(base_url()."Xlote/code_5");
			} else {
				echo "OK";
			}
		} else {
			redirect(base_url()."Xlote/errores");
		}
	}

	public function code_5()
	{
		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);


		$this->load->view('menu');
		$this->load->view('code_5');
		$this->load->view('footer', $dataY);
	}
}
