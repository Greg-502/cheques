<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("UsuariosModel");
	}

	public function index(){
		if ($this->session->userdata("login")) {
			redirect(base_url()."Main");
		} else {
			$year = gmdate('Y');
			$data = array(
				'anio' => $year
			);

			$this->load->view('login', $data);
		}

	}

	public function login(){
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		$res = $this->UsuariosModel->login($user, sha1($pass));

		if (!$res) {
			$this->session->set_flashdata("error","Credenciales incorrectas");
			redirect(base_url());
		} else {
			$data = array(
				'id_admin' => $res->id_admin,
				'user' => $res->usuario,
				'login' => TRUE
			);

			$this->session->set_userdata($data);
			redirect(base_url()."Main");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
