<?php 
	class AddModel extends CI_Model
	{
		function insertMount($data)
		{
			return $this->db->insert("monto", $data);
		}

		function insertResidente($data)
		{
			return $this->db->insert("empleado", $data);
		}
	}
?>