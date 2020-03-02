<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

	public function login($user, $pass){
		$this->db->where("usuario", $user);
		$this->db->where("password", $pass);
		$this->db->where("estado =", "1");

		$resultado = $this->db->get("admin");
		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		} else {
			return 0;
		}
	}
}
