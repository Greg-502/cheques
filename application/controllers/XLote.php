<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class XLote extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->helper('url');
		$this->load->model('LotesModel');
	}

	public function index()
	{
			$year = gmdate('Y');
			$dataY = array(
				'anio' => $year
			);

		$from = $_POST['from'];
		$to = $_POST['to'];

		$validador = 4;
		$data['numeral'] = $validador;
		$data['empleados'] = $this->LotesModel->listarImpresion($from, $to);

		$this->load->view('menu');
		$this->load->view('form',$data);
		$this->load->view('footer', $dataY);
		// consulta si $to es igual o menor a el ultimo id en la base de datos
		// if ($this->LotesModel->maximum()) {
		// 	$data = array(
		// 		'maximo' => $this->LotesModel->maximum()
		// 	);
		//
		// 	$maximo = $data['maximo']->maximum;
		//
		// 	if (($to < $from) || ($to > $maximo)) {
		// 		redirect(base_url()."Xlote/code_5");
		// 	} else {
		// 		echo "OK";
		// 	}
		// } else {
		// 	redirect(base_url()."Xlote/errores");
		// }
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
