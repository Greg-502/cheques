<?php
	class MountModel extends CI_Model
	{
		function mounts(){
			$this->db->order_by("id_cargo", "ASC");
			$query = $this->db->get("cargo");
			return $query->result();
		}

		function fetch($cargo_re)
		{
			$this->db->select('monto, monto_letras');
			$this->db->where('id_cargo', $cargo_re);
		  	$query = $this->db->get('cargo');
			return $query->row();
		}
	}
?>