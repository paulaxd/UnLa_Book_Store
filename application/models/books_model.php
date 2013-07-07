<?php
class Books_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('cart');
		$this->load->library('session');
	}
        
	public function get_price($isbn){
		$query = $this->db->get_where('books', array('isbn' => $isbn));
		$book = $query->row_array();
		return $book['price'];	
	}
        
	public function get_stock($isbn){
		$query = $this->db->get_where('books', array('isbn' => $isbn));
		$book = $query->row_array();
		return $book['stock'];	
	}
	
        public function get_books($isbn = FALSE)
        {
	if ($isbn === FALSE)
	{
		if($this->session->userdata('admin') == 1)
		{
			$query = $this->db->get('books');
			return $query->result_array();	
		}
		else
		{
			$query = $this->db->query('SELECT * FROM books WHERE isPublic = 1 OR isPublic IS NULL');
			return $query->result_array();		
		}
	}
	$query = $this->db->query('SELECT   isbn
            ,author
            ,title
            ,price
            ,category
            ,date
            ,CASE WHEN isPublic IS NULL THEN
                CAST(1 AS CHAR CHARACTER SET utf8)
            ELSE 
                CASE WHEN isPublic = 1 THEN
		CAST(1 AS CHAR CHARACTER SET utf8)
                ELSE
                    CAST(0 AS CHAR CHARACTER SET utf8)
                END
            END AS isPublic
		FROM books 
		WHERE isbn = '.$isbn.';');
	
	return $query->row_array();
        }
	
    public function get_lasts_books(){
		$this->db->order_by('date','desc');
		$this->db->limit(4);
		$query = $this->db->get('books');
		return $query->result_array();

    }    

	public function get_review($isbn)
	{
	$query = $this->db->get_where('book_reviews', array('isbn' =>$isbn));	
	
	return $query->row_array();	
	}
        
	public function get_image($isbn)
	{
	$query = $this->db->get_where('images_books', array('isbn' =>$isbn));	
	
	return $query->row_array();	
	}
	
	private function validateStock($items_array)
	{
		$flag = true;
		foreach ($items_array as $items):
			
			$isbn = $items['id'];
			
			$this->db->select('stock'); 
			$this->db->from('books');   
			$this->db->where('isbn', $isbn);
			$query = $this->db->get();
			$stock = $query->row_array();
			
			if($stock['stock'] == '0' || $stock['stock'] == NULL)
			{
				$flag = false;
				break;
			}
		endforeach;
		
		return $flag;
	}
	
	public function validateStockUnity($item_isbn)
	{
		$flag = true;
		$this->db->select('stock'); 
		$this->db->from('books');   
		$this->db->where('isbn', $item_isbn);
		$query = $this->db->get();
		$stock = $query->row_array();
		
		if($stock['stock'] == '0' || $stock['stock'] == NULL)
		{
			$flag = false;
			break;
		}
	
		return $flag;
	
	}
	
	public function buy($data){
		
		if($this->validateStock($this->cart->contents()))
		{
		
			$city = $data['city'];
			$dir = $data['dir'];
			$state  = $data['state'];
			$zip = $data['zip'];
			$country = $data['country'];
			$total = $this->cart->format_number($this->cart->total());
			$uid =  $this->session->userdata('user_id');
			$name = $this->input->post('name');
			$fecha = getdate();
			$date = $fecha['year']."-".$fecha['mon']."-".$fecha['mday'];
			$user = $this->users->get_user_by_id($uid, 1);
			if($this->session->userdata('descuento')){
				$desc = $this->session->userdata('descuento');
				if($desc == 5){
					$total = $total * 0.05;
				}else{
		
					$total = $total *0.1;
				}  	
			}
			
			$orders = array(
				'customerid' => $uid,
				'amount' => $total,
				'date' =>$date,
				'ship_name' => $name,
				'ship_address' => $dir,
				'ship_city' => $city,
				'ship_state' => $state,
				'shiP_zip' => $zip,
				'ship_country' => $country,
			);
		
			$this->db->insert('orders', $orders);
			$order_id = $this->db->insert_id();
			
		
			$customers = array(
				'name'=> $user->username,
				'adress' => $dir,
				'city' => $city,
				'state' => $state,
				'zip' => $zip,
				'country' => $country,
				'uid' => $uid,
			);
			$this->db->insert('customers', $customers);
			$cid = $this->db->insert_id();
		
			foreach ($this->cart->contents() as $items):
		
				$isbn = $items['id'];
				$qty = $items['qty'];
				$order_items = array(
					'orderid' =>$order_id,
					'isbn' => $isbn,
					'quantity' => $qty,
				);
				$this->db->insert('order_items', $order_items);
			
			endforeach;
			return true;
		}
		else
		{
			return false;
		}
	}


	function create_book(){

		$title = $this->input->post('titulo');
		$price = $this->input->post('precio');
		$author = $this->input->post('autor');
		$category = $this->input->post('categoria');
		$isbn = $this->input->post('isbn');
		$review =$this->input->post('text');
 		$isPublic = $this->input->post('isPublic');
		$stock = $this->input->post('stock');
		$fecha = getdate();
		
		$date = $fecha['year']."-".$fecha['mon']."-".$fecha['mday'];
	
		$data = array(
		'isbn' => $isbn,	
		'title' => $title,
		'author' => $author,
		'price' => $price,
		'date' => $date,
		'isPublic' => $isPublic,
		'stock' => $stock,
		);

		$reviews = array(
			'isbn' => $isbn,
			'review' => $review,
			);
		
		$up = array('upload_data' => $this->upload->data());
		$file_name = $up['upload_data']['file_name'];
		
		$image = array(
			'isbn' =>$isbn,
			'image' => $file_name,
			);

		$this->db->insert('images_books', $image);
		$this->db->insert('books', $data);
		$this->db->insert('book_reviews', $reviews);
	}


	function update_book(){
		$title = $this->input->post('titulo');
		$price = $this->input->post('precio');
		$author = $this->input->post('autor');
		$category = $this->input->post('categoria');
		$isbn = $this->input->post('isbn');
		$review =$this->input->post('text');
		$isPublic = $this->input->post('isPublic');
		$stock = $this->input->post('stock');
 
		$data = array(
		'title' => $title,
		'author' => $author,
		'price' => $price,
		'isPublic' => $isPublic,
		'category' => $category,
		'stock' => $stock,
		);


 		$reviews = array(
			'review' => $review,
			);
		
		$up = array('upload_data' => $this->upload->data());
		$file_name = $up['upload_data']['file_name'];
		
		if($file_name){		
			$image = array(
				'image' => $file_name,
				);
			$this->db->where('isbn', $isbn);
			$this->db->update('images_books', $file_name); 
		}

		$this->db->where('isbn', $isbn);
		$this->db->update('books', $data); 
		$this->db->update('book_reviews', $reviews);

	} 

	function delete_book($isbn){
		$this->db->delete('books', array('isbn' => $isbn)); 
		$this->db->delete('book_reviews', array('isbn' => $isbn)); 
		$this->db->delete('images_books', array('isbn' => $isbn)); 
	}

	function quantity_buy($uid){
		$query = $this->db->get_where('customers', array('uid' => $uid));
		$book = $query->row_array();
		$amount = 0;

		foreach ($query->result() as $row)
			{
			 $amount++;   
			}

		return $amount;
	}
	
	public function get_descuento_bycantidad($cantidad){
		$this->db->select('descuento');
		$this->db->where('cantidad <=', $cantidad);
		$this->db->order_by('cantidad', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('descuentos');
		if($query->num_rows() > 0){
			$row = $query->row_array();
			return $row['descuento'];	
		}
		else{
			return 0;
		}
	}

}