<?php
	class LotesModel extends CI_Model
	{
		/*function maximum()
		{
			$this->db->select("MAX(id_Empleado) as maximum");
			$this->db->where("status =", "1");
			$query = $this->db->get("empleado");
			return $query->row();
		}*/

		function listarImpresion($from, $to)
		{
			$this->db->select("*");
			$this->db->join('cargo', 'cargo.id_cargo = empleado.id_cargo');
			$this->db->where("(id_Empleado BETWEEN $from AND $to) AND status = 1");
			$query = $this->db->get("empleado");
			return $query->result();
		}
	}
?>
