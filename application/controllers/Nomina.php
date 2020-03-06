<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Guatemala');

class Nomina extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->add_package_path( APPPATH . 'third_party/fpdf');
		$this->load->library('renglones');
		$this->load->model("empleado_model");
	}

	public function pdf($nomina)
	{
		if ($nomina > 5) {
			redirect(base_url()."Xlote/code_5");
		} else {

			$data['empleados'] = $this->empleado_model->listarImpresion($nomina);
			$contador = 1;

			$mes = date('m');
			$mes = $mes - 1;
			$anio = date('Y');
			if ($mes == 1) {
				$current = 'ENERO';
				$nominaResidente = '001';
				$nominaEPS = '002';
			} elseif ($mes == 2) {
				$current = 'FEBRERO';
				$nominaResidente = '003';
				$nominaEPS = '004';
			} elseif ($mes == 3) {
				$current = 'MARZO';
				$nominaResidente = '005';
				$nominaEPS = '006';
			} elseif ($mes == 3) {
				$current = 'ABRIL';
				$nominaResidente = '007';
				$nominaEPS = '008';
			} elseif ($mes == 3) {
				$current = 'MAYO';
				$nominaResidente = '009';
				$nominaEPS = '010';
			} elseif ($mes == 3) {
				$current = 'JUNIO';
				$nominaResidente = '011';
				$nominaEPS = '012';
			} elseif ($mes == 3) {
				$current = 'JULIO';
				$nominaResidente = '013';
				$nominaEPS = '014';
			} elseif ($mes == 3) {
				$current = 'AGOSTO';
				$nominaResidente = '015';
				$nominaEPS = '016';
			} elseif ($mes == 3) {
				$current = 'SEPTIEMBRE';
				$nominaResidente = '017';
				$nominaEPS = '018';
			} elseif ($mes == 3) {
				$current = 'OCTUBRE';
				$nominaResidente = '019';
				$nominaEPS = '020';
			} elseif ($mes == 3) {
				$current = 'NOVIEMBRE';
				$nominaResidente = '021';
				$nominaEPS = '022';
			} elseif ($mes == 3) {
				$current = 'DICIEMBRE';
				$nominaResidente = '023';
				$nominaEPS = '024';
			}

			if ($nomina == 1) {
				$residente = 'MÉDICO RESIDENTE   I';
			} elseif ($nomina == 2) {
				$residente = 'MÉDICO RESIDENTE   II';
			} elseif ($nomina == 3) {
				$residente = 'MÉDICO RESIDENTE III';
			} elseif ($nomina == 4) {
				$residente = 'MÉDICO RESIDENTE IV';
			} elseif ($nomina == 5) {
				$residente = 'MÉDICO RESIDENTE EPS';
			}


			$this->pdf = new renglones();
	        $this->pdf->Add_Page('L','Letter',0);
	        $this->pdf->AliasNbPages();
			$this->pdf->SetFont('Arial', '', 10);
			$this->pdf->SetTitle('Residentes');
			$this->pdf->SetXY(135,17.5);
			$this->pdf->Cell(40,10, ($current." ".$anio));

			$this->pdf->SetXY(229,10);
			$this->pdf->SetFont('Arial', 'B', 16);
			$this->pdf->MultiCell(40,8, utf8_decode($residente), 1, 'C');

			$this->pdf->SetXY(120,31.5);
			$this->pdf->SetFont('Arial', '', 10);

			//TABLA
			if ($nomina == 5) {
				$this->pdf->MultiCell(194,5,'NOMINAS No. '.$nominaEPS);
			} else {
				$this->pdf->MultiCell(194,5,'NOMINAS No. '.$nominaResidente);
			}
			
			$this->pdf->Ln();
			$this->pdf->SetFont('Arial', 'B', 10);
	        $this->pdf->Cell(10,6,"NO.",1,0,'C');
	        $this->pdf->Cell(80,6,"NOMBRE",1);
	        $this->pdf->Cell(31,6,utf8_decode("NO. CHEQUE"),1,0,'C');
	        $this->pdf->Cell(28,6,utf8_decode("MONTO"),1,0,'C');
	        $this->pdf->Cell(55,6,utf8_decode("FIRMA Y SELLO"),1,0,'C');
	        $this->pdf->Cell(54,6,"NO. DPI",1,0,'C');
	        $this->pdf->Ln();

	        foreach ($data['empleados'] as $key) {
	        	$this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10,15, $contador++,1,0,'C');
                $this->pdf->SetFont('Arial', 'B', 10);
                $this->pdf->Cell(80,15,utf8_decode($key->nombre),1);
                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(31,15,'',1);
                $this->pdf->Cell(28,15,'Q          '.$key->monto,1,0,'C');
                $this->pdf->Cell(55,15,'',1);
                $this->pdf->Cell(54,15,'',1);
                $this->pdf->Ln();
            }

	        $this->pdf->Output( 'Proveedor.pdf' , 'I' );
		}
	}
}
