<div class="container">
   <div class="hero-unit">
      <h2> Administrar libros</h2>
      
    </div>
</div>
<div class="container">
<div class="hero-unit">

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
               <p><a href="<?= site_url().'admin/view/'.$books_item['isbn'] ?>">Mirar éste libro</a></p>
               <p><a href="<?= site_url().'admin/delete/'.$books_item['isbn'] ?>">Eliminar libro</a></p>
    </div>
               
   
    
<?php endforeach ?>
<br style="clear:both"; />
</div>
</div>

