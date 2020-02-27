<?php 
	class DisableModel extends CI_Model
	{
		function listar() {
			$this->db->select('*');
			$this->db->join('cargo', 'cargo.id_cargo = empleado.id_cargo');
			$this->db->where('status', 0);
			$query = $this->db->get('empleado');
			return $query->result();
		}
	}
?>