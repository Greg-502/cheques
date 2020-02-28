<?php 
	class HistorialModel extends CI_Model
	{
		function invoice($id) {
			$this->db->select('cheque.id_cheque, cheque.monto, cheque.monto_letras,
								cheque.fecha, empleado.nombre');
			$this->db->join('empleado', 'empleado.id_Empleado = cheque.id_empleado');
			$this->db->order_by('cheque.fecha desc');
			$this->db->where('empleado.id_Empleado', $id);
			$query = $this->db->get('cheque');
			return $query->result();
		}
	}
?>