<?php 
	class LotesModel extends CI_Model
	{
		function maximum()
		{
			$this->db->select("MAX(id_Empleado) as maximum");
			$this->db->where("status =", "1");
			$query = $this->db->get("empleado");
			return $query->row();
		}
	}
?>