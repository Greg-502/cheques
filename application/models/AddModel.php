<?php 
	class AddModel extends CI_Model
	{
		function updateCargo($data, $id_cargo)
		{
			$this->db->where("id_cargo", $id_cargo);
  			return $this->db->update("cargo", $data);
		}

		function insertResidente($data)
		{
			return $this->db->insert("empleado", $data);
		}
	}
?>