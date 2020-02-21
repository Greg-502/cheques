<?php
	class MountModel extends CI_Model
	{
		function mounts(){
			$this->db->order_by("id_monto", "ASC");
			$query = $this->db->get("monto");
			return $query->result();
		}
	}
?>