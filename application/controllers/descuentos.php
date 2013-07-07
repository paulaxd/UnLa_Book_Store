<?php if (!defined('BASEPATH')) die();
class Descuentos extends CI_Controller {
    
    public function __construct()
	{
            parent::__construct();
            $this->load->library('session');
            $this->load->model('descuentos_model');
            $this->load->helper('html');
            $this->load->library('tank_auth');
            $this->load->helper('form');
            $this->load->library('form_validation');
	}
    
    public function index()
    {
      $data['descuentos'] = $this->descuentos_model->get_descuentos();
      $data['mensaje'] = null;
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menubar', $data);
      $this->load->view('descuentos/descuentos_form', $data);
      $this->load->view('templates/footer');
    }
    
    public function update_form(){
	$id_descuento = $this->input->post('id_descuento');
	
	if($id_descuento != null){
	    $data['descuentos'] = $this->descuentos_model->get_descuento_byid($id_descuento);
	    $this->load->view('templates/header');
	    $this->load->view('templates/menubar');
	    $this->load->view('descuentos/descuentos_update', $data);
	    $this->load->view('templates/footer');
	}
	else{
	    echo 'aaaa';
	}
	
    }
    
    public function create_form(){
	$this->load->view('templates/header');
	$this->load->view('templates/menubar');
	$this->load->view('descuentos/descuentos_create');
	$this->load->view('templates/footer');
    }
    
    public function delete_form(){
	$id_descuento = $this->input->post('id_descuento');
	
	$data['descuentos'] = $this->descuentos_model->get_descuento_byid($id_descuento);
	$this->load->view('templates/header');
	$this->load->view('templates/menubar');
	$this->load->view('descuentos/descuentos_delete', $data);
	$this->load->view('templates/footer');
    }
    
    public function update(){
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('descuento', 'descuento', 'required|numeric');
        $this->form_validation->set_rules('cantidad', 'cantidad', 'required|numeric');
	$id_descuento = $this->input->post('id_descuento');
	$descuento = $this->input->post('descuento');
	$cantidad = $this->input->post('cantidad');
	
	$data['descuentos'] = $this->descuentos_model->get_descuento_byid($id_descuento);
	$data['descuentos']['cantidad'] = $cantidad;
	$data['descuentos']['descuento'] = $descuento;
	
	if ($this->form_validation->run() === FALSE)
	{
	      $this->load->view('templates/header');   
	      $this->load->view('templates/menubar');
	      $this->load->view('descuentos/descuentos_update', $data);
	      $this->load->view('templates/footer');
	}
	else
	{
	    $this->descuentos_model->update_descuentos($id_descuento, $descuento, $cantidad);
	    $data['descuentos'] = $this->descuentos_model->get_descuentos();
	    $data['mensaje'] = 'Se modifico el Descuento correctamente';
	    $this->load->view('templates/header');
	    $this->load->view('templates/menubar');
	    $this->load->view('descuentos/descuentos_form', $data);
	    $this->load->view('templates/footer');
	}
    }
    
    public function delete(){
	$id_descuento = $this->input->post('id_descuento');
	$this->descuentos_model->delete_descuentos($id_descuento);
	
	$data['descuentos'] = $this->descuentos_model->get_descuentos();
	$data['mensaje'] = 'Se elimino el Descuento correctamente';
	$this->load->view('templates/header');
	$this->load->view('templates/menubar');
	$this->load->view('descuentos/descuentos_form', $data);
	$this->load->view('templates/footer');
    }
    
    public function create(){
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('descuento', 'descuento', 'required|numeric');
        $this->form_validation->set_rules('cantidad', 'cantidad', 'required|numeric');
	
	if ($this->form_validation->run() === FALSE)
	{
	      $this->load->view('templates/header');   
	      $this->load->view('templates/menubar');
	      $this->load->view('descuentos/descuentos_create');
	      $this->load->view('templates/footer');
	}
	else
	{
	      $descuento = $this->input->post('descuento');
	      $cantidad = $this->input->post('cantidad');
	      $this->descuentos_model->create_descuentos($descuento, $cantidad);
	      
	      $data['descuentos'] = $this->descuentos_model->get_descuentos();
	      $data['mensaje'] = 'Se ingreso el Descuento correctamente';
	      $this->load->view('templates/header');
	      $this->load->view('templates/menubar');
	      $this->load->view('descuentos/descuentos_form', $data);
	      $this->load->view('templates/footer');
	}
    }
    
    public function get_byid(){
	$id_descuento = $this->input->post('id_descuento');
	$this->descuentos_model->get_descuento_byid($id_descuento);
    }
}