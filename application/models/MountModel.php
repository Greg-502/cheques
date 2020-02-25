<?php
	class MountModel extends CI_Model
	{
		function mounts(){
			$this->db->order_by("id_cargo", "ASC");
			$query = $this->db->get("cargo");
			return $query->result();
		}
	}
?>