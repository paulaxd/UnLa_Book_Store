<?php

$number = array(
		'name'	=> 'number',
		'id'	=> 'number',
		'value' => set_value('number'),
		'maxlength'	=> 80,
		'size'	=> 40,
	);


$code = array(
		'name'	=> 'code',
		'id'	=> 'code',
		'value' => set_value('code'),
		'maxlength'	=> 4,
		'size'	=> 30,
	);

$expire = array(
		'name'	=> 'expire',
		'id'	=> 'expire',
		'value' => set_value('expire'),
		'maxlength'	=> 10,
		'size'	=> 30,
	);

$name = array(
		'name'	=> 'name',
		'id'	=> 'name',
		'value' => set_value('name'),
		'maxlength'	=> 30,
		'size'	=> 30,
	);
?>


<div class="container">
   <div class="hero-unit">
      <h3>Ingresá los siguientes datos:</h3>
    
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Nombre', $name['id']); ?></td>
		<td><?php echo form_input($name); ?></td>
		<td style="color: red;"><?php echo form_error($name['name']); ?><?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Tarjeta'); ?></td>
		<td><select name="myselect">
			<option value="one" <?php echo set_select('myselect', 'one', TRUE); ?> >Visa</option>
			<option value="two" <?php echo set_select('myselect', 'two'); ?> >opcion</option>
			<option value="three" <?php echo set_select('myselect', 'three'); ?> >opcion</option>
		</select>
	    </td>
	</tr>
	<tr>
		<td><?php echo form_label('Numero', $number['id']); ?></td>
		<td><?php echo form_input($number); ?></td>
		<td style="color: red;"><?php echo form_error($number['name']); ?><?php echo isset($errors[$number['name']])?$errors[$number['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Codigo AMEX ', $code['id']); ?></td>
		<td><?php echo form_input($code); ?></td>
		<td style="color: red;"><?php echo form_error($code['name']); ?><?php echo isset($errors[$code['name']])?$errors[$code['name']]:''; ?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Vencimiento', $expire['id']); ?></td>
		<td><?php echo form_input($expire); ?></td>
		<td style="color: red;"><?php echo form_error($expire['name']); ?><?php echo isset($errors[$expire['name']])?$errors[$expire['name']]:''; ?></td>
	</tr>
	<tr>
		<td>
		<input class="btn btn-success" type="submit" name="submit" value="Comprar!!">
		</td>
	</tr>
	</table>
	<?php echo form_close(); ?>
</div>
</div>
