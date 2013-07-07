<div class="container">
   <div class="hero-unit">
      <h2><? echo img('../assets/img/logo.png', TRUE);?></h2>
      <p>Bookstore es una página donde vas a poder encontrar y comprar todos tus libros favoritos. 

Presentamos una gran variedad de libros y autores en una interfaz agradable y sencilla.
Regístrate y te facilitamos los libros que mas se adapten a tus preferencias, e increíbles descuentos para vos!</p>
      <a class="btn btn-primary btn-large" href="<?php echo base_url('index.php/auth/register'); ?>" > Regístrate Ahora!</a>
   </div>
</div>
<div class="container">
<div class="hero-unit" >
  <?php if($this->session->userdata('descuento')){?>  

    <h3>Tenés un descuento del <?= $this->session->userdata('descuento')?>% !!!</h2>
      <p>Gracias por volver a comprar en BookStore.</>
  <?php }?> 
  <br /><br />
  <h3 style="margin-top:50px;">Libros lanzados recientemente:</h3>
  <div>
<?php
  $i =0;
   foreach ($featured as $books_item):?>
   <div class="book_main">
          <h4><?php $i +=1;
          echo $books_item['title'];?></h4>
          <?php echo "Autor: ".$books_item['author']. "<br />";
              echo "Precio: ".$books_item['price']. "<br /><br />";
              $image_properties = array(
               'src' => '../assets/img/libros/'.$books_item['image'].'',
               'alt' => '',
               'class' => '',
               'width' => '100',
               'height' => '100',
               'title' => 'book store',
               'rel' => 'lightbox',);
                echo img($image_properties, TRUE)."<br />";?>
               <p><a href="<?= site_url().'books/'.$books_item['isbn'] ?>">Mirar éste libro</a></p>
               <p><button id="cart" onclick='insertItem(value, <?php echo 'cntmsj'.$i; ?>,<?php echo 'global'.$i; ?>)' value="<?php echo $books_item['isbn']?>"></button></p>
               
               <p id='<?php echo 'global'.$i;?>' >             
               <p id='<?php echo 'cntmsj'.$i; ?>' >
               
               </p>
               </p>   
            </div>
    
<?php endforeach ?>
<br style="clear:both"; />
</div>
<br />
<h3 style="background-color:#BBD8E9">Mirá nuestros libros:</h3>

<?php
   $i =0;
   foreach ($books as $books_item):?>
   <div class="book_main">
          <h4><?php $i +=1;
          echo $books_item['title'];?></h4>
          <?php echo "Autor: ".$books_item['author']. "<br />";
              echo "Precio: ".$books_item['price']. "<br /><br />";
              $image_properties = array(
               'src' => '../assets/img/libros/'.$books_item['image'].'',
               'alt' => '',
               'class' => '',
               'width' => '100',
               'height' => '100',
               'title' => 'book store',
               'rel' => 'lightbox',);
                echo img($image_properties, TRUE)."<br />";?>
               <p><a href="<?= site_url().'books/'.$books_item['isbn'] ?>">Mirar éste libro</a></p>
               <p><button id="cart" onclick='insertItem(value, <?php echo 'cntmsj'.$i; ?>,<?php echo 'global'.$i; ?>)' value="<?php echo $books_item['isbn']?>"></button></p>
               
               <p id='<?php echo 'global'.$i;?>' >             
               <p id='<?php echo 'cntmsj'.$i; ?>' >
               
               </p>
               </p>   
            </div>
               
   
    
<?php endforeach ?>
<br style="clear:both"; />
</div>
</div>

