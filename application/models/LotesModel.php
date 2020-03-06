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

		function listarImpresion($id)
		{
			$this->db->select("*");
			$this->db->join('cargo', 'cargo.id_cargo = empleado.id_cargo');
			$this->db->where("id_Empleado = $id");
			$query = $this->db->get("empleado");
			return $query->result();
		}
	}
?>
