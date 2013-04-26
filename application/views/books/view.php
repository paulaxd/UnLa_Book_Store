<div class="container">
   <div class="hero-unit">
      <h3>Especificaciones del Libro:</h3>
      <?echo '<h2>Título: '.$books_item['title'].'</h2>';
        echo "Precio: ".$books_item['price']."<br />";
        echo 'Autor: '.$books_item['author']."<br /><br />";
        echo '<p>Reseña:'."<br />".$book_review['review'].'</p>';
        
        $image_properties = array(
          'src' => '../assets/img/libros/'.$book_image['image'].'',
          'alt' => '',
          'class' => '',
          'width' => '200',
          'height' => '200',
          'title' => 'book store',
          'rel' => 'lightbox',);
        echo img($image_properties, TRUE)."<br /><br />";?>


       <p><button id="cart" onclick="insertItem(value, cntmsj, global,'books')" value="<?php echo $books_item['isbn']?>"></button></p>
       <p id='<?php echo 'global';?>' >             
       <p id='<?php echo 'cntmsj'; ?>' >
       </p>
       </p>
      <br /><br />
      <a class="btn btn-primary btn-large" href="<?php echo site_url()?>">Volver</a>
   </div>
</div>
