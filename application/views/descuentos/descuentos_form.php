<?php

$id_descuento = array(
		'name'	=> 'id_descuento',
		'id'	=> 'id_descuento',
		'value' => set_value('id_descuento'),
		'maxlength'	=> 80,
		'size'	=> 40,
		'type' => 'hidden'
		);

$cantidad = array(
		'name'	=> 'cantidad',
		'id'	=> 'cantidad',
		'value' => set_value('cantidad'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$descuento = array(
		'name'	=> 'descuento',
		'id'	=> 'descuento',
		'value' => set_value('descuento'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);

?>

<div class="container">
   
   <h2>Administrar Descuentos</h2>
   <div class="hero-unit">
      <div>
	 <?php if ($mensaje != null): ?>
	    <div class="alert alert-success" style="text-align: center">
	       <? echo $mensaje ?>
	    </div>
	 <?php endif; ?>
      </div>
      <div style="float:right; padding: 10px;">
	    <a class="btn btn-inverse" href="<?= site_url().'descuentos/create_form'?>"><i class="icon-plus"></i> Agregar</a>
      </div>
      
	<table class="table table-striped">
	        <tr>
			<th>ID</th>
			<th>Cantidad de libros</th>
			<th>Descuento</th>
			<th>Modificar</th>
			<th>Eliminar</th>
	        </tr>
		<?php
		  $i =0;
		  foreach ($descuentos as $descuentos_item):?>
		    <tr>
			<td><?php echo $descuentos_item['id_descuento']; ?></td>
			<td><?php echo $descuentos_item['cantidad']; ?></td>
			<td>% <?php echo $descuentos_item['descuento']; ?></td>
			<td>
			<?php $id_descuento['value'] = $descuentos_item['id_descuento']?>
			   
			   <?php echo form_open_multipart('descuentos/update_form'); ?>
			      <?php echo form_input($id_descuento); ?>
			      <button class="btn" type="submit" name="submit" value=""><i class="icon-pencil"></i></button>
			   <?php echo form_close(); ?>
			</td>
			   
			<td>
			   <?php echo form_open_multipart('descuentos/delete_form');?>
			      <?php echo form_input($id_descuento); ?>
			      <button class="btn" type="submit" name="submit" value=""><i class="icon-remove"></i></button>
			   <?php echo form_close(); ?>
			</td>
		    </tr>
		  <?php endforeach ?>
	</table>
   </div>
</div>
