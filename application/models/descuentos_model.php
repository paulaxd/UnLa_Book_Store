<?php
class Descuentos_model extends CI_Model {
    
    public function get_descuentos(){
        $query = $this->db->get('descuentos');
	return $query->result_array();	
    }
    
    public function update_descuentos($id_descuento, $descuento, $cantidad){
	$data = array(
	    'descuento' => $descuento,	
	    'cantidad' => $cantidad,
	);
	
	$this->db->where('id_descuento', $id_descuento);
	$this->db->update('descuentos', $data); 
    }
    
    public function delete_descuentos($id_descuento){
	$this->db->where('id_descuento', $id_descuento);
	$this->db->delete('descuentos'); 
    }
    
    public function create_descuentos($descuento, $cantidad){
	$data = array(
	    'descuento' => $descuento,	
	    'cantidad' => $cantidad,
	);
	$this->db->insert('descuentos', $data);
    }
    
    public function get_descuento_byid($id_descuento){
	$query = $this->db->get_where('descuentos', array('id_descuento' => $id_descuento));
	return $query->row_array();
    }
    
}