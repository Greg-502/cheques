<?php 
	class NitModel extends CI_Model
	{
		function searchNit($nit)
		{
			$this->db->select('nit');
		    $this->db->where('nit', $nit);
		    $resultado = $this->db->get("empleado");
		    return $resultado->row();
		}
	}
?>