<?php
if (isset($status) && $status != ''){
?>  
  <div class="container" style="width:500px; height:200px; background-color: #FCFCFC">

        <div class="alert alert-success" style="margin:50px auto; padding-left: 25%; ">
        <br/>
	<? echo $status ?>
        <br/><br/>
        </div>
    </div>
<?
}
?>
<?php echo form_open('cart/update'); ?>


<table cellpadding="6" cellspacing="1" style="width:100%" border="1">

<tr>
  <th>Cantidad</th>
  <th>Descripción</th>
  <th style="text-align:right">Precio</th>
  <th style="text-align:right">Sub-Total</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>
  
	<?php echo form_hidden($i.'rowid', $items['rowid']);?>
	
	<tr>
	      <td>
	      <?php if($items['qty'] == -1): ?>
		
		  <p>Sin stock</p>
		
	      <?php else :?>
		
		  <?php echo form_input(array('name' => $i.'qty', 'value' => $items['qty'], 'maxlength' => '5', 'size' => '5'));?>
	      <?php endif; ?>
	      
	      </td>
	      <td>
		    <?php echo $items['name']; ?>
    
		    <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
    
		      <p>
			<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
    
			  <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
    
			<?php endforeach; ?>
		      </p>
		    <?php endif; ?>
	      </td>
	      <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
	      <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>
<tr>
  <td colspan="1"> </td>
  
</tr>
<tr>
  <td colspan="1"> </td>
  <td class="right"><strong>Total</strong></td>
  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
  <?php if($this->session->userdata('descuento')){
  		$total = $this->cart->total();
		$desc = $this->session->userdata('descuento');
		if($desc == 5){
			$pr = $total * 0.05;
			$total = $total - $pr; 
		}else{

			$pr = $total *0.1;
			$total = $total -$pr;
		} ?>  	

	<td class="right"><strong>Total - Con descuento:</strong></td>
  	<td class="right">$<?php echo $total; ?></td>
  
	<?php }?>
</tr>

</table>

<br />
<br />
<p><input class="btn btn-warning" type="submit" name="submit" value="Actualizar Mis Libros"></p>
<br />
<p><a class="btn btn-success" href="<?= site_url().'checkout' ?>" name="">Comprar Mis Libros</a></p>
<?php echo form_close(); ?>


