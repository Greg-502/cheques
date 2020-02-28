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
		$this->load->model('MountModel');
		$data['base_url'] = $this->config->item('base_url');

		$year = gmdate('Y');
		$dataY = array(
			'anio' => $year
		);

		$validador = 3;
		$data['empleados'] = $this->empleado_model->listar();
		$data['numeral'] = $validador;

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

	public function imprimir(){
		$data['base_url'] = $this->config->item('base_url');

		$prueba = $_POST['prueba'];
		if ($handle = printer_open('\\\192.168.1.135\HP LaserJet Professional P1606dn')) {
			printer_set_option($handle, PRINTER_MODE, 'RAW');
			printer_start_doc($handle);
			printer_start_page($handle);

			$font = printer_create_font('Arial', 150, 80, 700, false, false, false, 0);
			printer_select_font($handle, $font);
			printer_draw_text($handle, $prueba, 150, 50);

			printer_delete_font($font);
			printer_end_page($handle);
			printer_end_doc($handle);
			printer_close($handle);
			echo "impresion exitosa";
		}else {
			echo "no se pudo conectar a la impresora";
		}
	}

	public function 	guardarcheque(){
		$data['base_url'] = $this->config->item('base_url');

		$id_empleado = $_POST['id'];
		$monto = $_POST['monto'];
		$monto_letras = $_POST['monto_letras'];

			$this->empleado_model->guardarCheque($id_empleado,$monto,$monto_letras);
			echo "Guardado exitosamente";
	}

	public function 	listarImpresion(){
		$data['base_url'] = $this->config->item('base_url');

		$from = "";
		$to = "";
		if ($this->input->post('imprimir') == 'imprimir') {
			$from = $_POST['from'];
			$to = $_POST['to'];
			$validador = 4;
			$data['numeral'] = $validador;
			$data['empleados'] = $this->empleado_model->listarImpresion($from, $to);

			$this->load->view('menu');
			$this->load->view('form',$data);
		}else {
			redirect("/Main");
		}
	}
}
