<?php $address = array(
	'name'	=> 'address',
	'id'	=> 'address',
	'value'	=> set_value('address'),
	'maxlength'	=> 100,
	'size'	=> 40,
);

$city = array(
	'name'	=> 'city',
	'id'	=> 'city',
	'value'	=> set_value('city'),
	'maxlength'	=> 80,
	'size'	=> 40,
);

$state = array(
	'name'	=> 'state',
	'id'	=> 'state',
	'value'	=> set_value('state'),
	'maxlength'	=> 50,
	'size'	=> 40,
);

$zip = array(
	'name'	=> 'zip',
	'id'	=> 'zip',
	'value'	=> set_value('zip'),
	'maxlength'	=> 10,
	'size'	=> 20,
);

$country = array(
	'name'	=> 'country',
	'id'	=> 'country',
	'value'	=> set_value('country'),
	'maxlength'	=> 50,
	'size'	=> 40,
);
?>
<div class="container">
   <div class="hero-unit">
      <h3>Ingresá los detalles faltantes:</h3>
    
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Dirección', $address['id']); ?></td>
		<td><?php echo form_input($address); ?></td>
		<td style="color: red;"><?php echo form_error($address['name']); ?><?php echo isset($errors[$address['name']])?$errors[$address['name']]:''; ?></td>
	</tr>

	<tr>
		<td><?php echo form_label('Ciudad - barrio', $city['id']); ?></td>
		<td><?php echo form_input($city); ?></td>
		<td style="color: red;"><?php echo form_error($city['name']); ?><?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?></td>
	</tr>
	
	<tr>
		<td><?php echo form_label('Estado / Provinica', $state['id']); ?></td>
		<td><?php echo form_input($state); ?></td>
		<td style="color: red;"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></td>
	</tr>
	
	<tr>
		<td><?php echo form_label('Zip / Código Postal', $zip['id']); ?></td>
		<td><?php echo form_input($zip); ?></td>
		<td style="color: red;"><?php echo form_error($zip['name']); ?><?php echo isset($errors[$zip['name']])?$errors[$zip['name']]:''; ?></td>
	</tr>
	
	<tr>
		<td><?php echo form_label('País', $country['id']); ?></td>
		<td><?php echo form_input($country); ?></td>
		<td style="color: red;"><?php echo form_error($country['name']); ?><?php echo isset($errors[$country['name']])?$errors[$country['name']]:''; ?></td>
	</tr>
	
	</table>
	<input class="btn btn-success" type="submit" name="submit" value="Continuar!!">
	<?php echo form_close(); ?>

	</div>
</div>
