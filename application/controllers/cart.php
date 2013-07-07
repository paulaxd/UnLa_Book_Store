<?php if (!defined('BASEPATH')) die();
class cart extends CI_Controller {
   
   public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('books_model');
      $this->load->model('tank_auth/users');
      $this->load->helper('html');
		$this->load->library('tank_auth');
		$this->load->library('session');
      $this->load->library('form_validation');
      $this->load->library('security');
      
   }

   public function index(){
      
      if($this->tank_auth->is_logged_in()){
	 
      }else{
	 $message = "Debes estar logueado para acceder a tu carrito."; //manejar carrito deslogueado
	 $this->session->set_flashdata('message', $message);
	 redirect(base_url());
      }
      if(!$this->cart->contents()){
         $message = "Debes seleccionar algún libro para acceder a tu carrito de compras."; //manejar carrito deslogueado
         $this->session->set_flashdata('message', $message);
         redirect(base_url());
      }
      $this->load->helper('form');
	
      $this->load->view('templates/header');
      $this->load->view('templates/menubar');
      $this->load->view('books/cart_view');
      $this->load->view('templates/footer');
      
   }
   
   public function update(){
   $this->load->helper('form');

   $i= 1;
   while(isset($_POST[$i.'rowid']))
   {
      
      $rowid = $_POST[$i.'rowid'];
      $qty = $_POST[$i.'qty'];
      
      $data = array(
		  'rowid' => $rowid,
		  'qty'   => $qty
	       );
   
       $this->cart->update($data); 
       $i++;
   }
   
   $data['status'] =' Tu carrito Se ha actualizado con éxito';
   $this->load->view('templates/header');
   $this->load->view('templates/menubar');
   $this->load->view('books/cart_view', $data);
   $this->load->view('templates/footer');
   }


   public function checkout(){
   
   if($this->tank_auth->is_logged_in()){
      $user_id = $this->session->userdata('user_id');
      }else{
    $message = "Debes estar logueado para acceder a tu carrito."; //manejar carrito deslogueado
    $this->session->set_flashdata('message', $message);
    redirect(base_url());
   }   

   $this->form_validation->set_rules('address', 'Dirección', 'trim|required|xss_clean|min_length[5]|max_length[80]');
   $this->form_validation->set_rules('city', 'Ciudad', 'trim|required|xss_clean|min_length[2]|max_length[30]');
   $this->form_validation->set_rules('state', 'Estado / Provincia', 'trim|required|xss_clean|min_length[2]|max_length[20]');
   $this->form_validation->set_rules('zip', 'Zip / Código Postal', 'trim|required|xss_clean|min_length[2]|max_length[10]');
   $this->form_validation->set_rules('country', 'País', 'trim|required|xss_clean|min_length[2]|max_length[20]');

   if ($this->form_validation->run() == FALSE)
      {  $this->load->view('templates/header');
         $this->load->view('templates/menubar');
         $this->load->view('books/checkout');
      }
      else
      {  
         $dir =$_POST['address'];
         $city =$_POST['city'];
         $state =$_POST['state'];
         $zip =$_POST['zip'];
         $country = $_POST['country'];
         
         $this->load->view('templates/header');
         $this->load->view('templates/menubar');
         redirect(site_url().'purchase/'.$dir.'/'.$city.'/'.$state.'/'.$zip.'/'.$country);
      }
    
   }


   public function purchase($dir, $city, $state, $zip, $country){
  
      if($this->tank_auth->is_logged_in()){
         $user_id = $this->session->userdata('user_id');
         }else{
       $message = "Debes estar logueado para acceder a tu carrito.";
       $this->session->set_flashdata('message', $message);
       redirect(base_url());
      }   

      $data = array("city" => $city, "dir" => $dir, "state" => $state, "zip" => $zip, "country" => $country);
      $this->form_validation->set_rules('name', 'Nombre', 'trim|required|xss_clean|min_length[5]|max_length[80]|alpha_dash');
   
      if ($this->form_validation->run() == FALSE)
         {  $this->load->view('templates/header');
            $this->load->view('templates/menubar');
            $this->load->view('books/purchase');
         }
         else
         {  
            if($this->books_model->buy($data))
	    {
	       $message = "Se ha concretado tu compra con éxito !!!.";
	       $this->session->set_flashdata('message', $message);
	       redirect(base_url());
	    }
	    else
	    {
	       $message = "El libro seleccionado no está en stock. Disculpe las molestias";
	       $this->session->set_flashdata('message', $message);
	       redirect(base_url());
	    }
         }

   }
 


   public function validate_stock($isbn)
   {
      return $this->books_model->validateStockUnity($isbn);
   }
   
   /*	
   public function index()
   {
     
      $data['books'] = $this->books_model->get_books();
      $data['title'] = 'Stock de Libros';
      $data1 = array();
   
      foreach ($data['books'] as $books_item):
      $isbn=$books_item['isbn'];
      $image= $this->books_model->get_image($isbn);
      $books_item['image']= $image['image'];
      
      array_push($data1, $books_item);   
      endforeach;
      $data['books']=$data1;     
     
      $this->load->view('templates/header', $data);
      $this->load->view('templates/menubar');
      $this->load->view('books/index', $data);
      $this->load->view('templates/footer');

   }
   public function view($isbn)
   {
      $data['books_item'] = $this->books_model->get_books($isbn);
      $data['book_review'] = $this->books_model->get_review($isbn);
      $data['book_image'] = $this->books_model->get_image($isbn);
      if (empty($data['books_item']))
	{print("entra aca");
		show_404();
	}

	$data['title'] = $data['books_item']['title'];

	$this->load->view('templates/header', $data);
	$this->load->view('books/view', $data);
	$this->load->view('templates/footer');
      
      
   }*/
}

/* Location: ./application/controllers/books.php */
