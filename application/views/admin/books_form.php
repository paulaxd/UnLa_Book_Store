<?php

$isbn = array(
		'name'	=> 'isbn',
		'id'	=> 'isbn',
		'value' => set_value('isbn'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);


$autor = array(
		'name'	=> 'autor',
		'id'	=> 'autor',
		'value' => set_value('autor'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$titulo = array(
		'name'	=> 'titulo',
		'id'	=> 'titulo',
		'value' => set_value('titulo'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);

$precio = array(
		'name'	=> 'precio',
		'id'	=> 'precio',
		'value' => set_value('precio'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$categoria = array(
		'name'	=> 'categoria',
		'id'	=> 'categoria',
		'value' => set_value('categoria'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$text = array(
		'name'	=> 'text',
		'id'	=> 'text',
		'value' => set_value('text'),
		);
$isPublic = array(
    'name'        => 'isPublic',
    'id'          => 'isPublic',
    'value'       => set_value('isPublic'),
    'checked'     => TRUE,
    'style'       => 'margin:10px',
    );
$stock = array(
		'name'	=> 'stock',
		'id'	=> 'stock',
		'value' => set_value('stock'),
		'maxlength'	=> 80,
		'size'	=> 40,
		);
    
?>

<h2>Crear nuevo libro</h2>


<div class="container">
   <div class="hero-unit">

<?php echo form_open_multipart('books/create') ?>
	<table>
		<tr>
			<td><?php echo form_label('Isbn', $isbn['id']); ?></td>
			<td><?php echo form_input($isbn); ?></td>
			<td style="color: red;"><?php echo form_error($isbn['name']); ?><?php echo isset($errors[$isbn['name']])?$errors[$isbn['name']]:''; ?></td>
		</tr>

		<tr>
			<td><?php echo form_label('Autor', $autor['id']); ?></td>
			<td><?php echo form_input($autor); ?></td>
			<td style="color: red;"><?php echo form_error($autor['name']); ?><?php echo isset($errors[$autor['name']])?$errors[$autor['name']]:''; ?></td>
		</tr>

		<tr>
			<td><?php echo form_label('Título', $titulo['id']); ?></td>
			<td><?php echo form_input($titulo); ?></td>
			<td style="color: red;"><?php echo form_error($titulo['name']); ?><?php echo isset($errors[$titulo['name']])?$errors[$titulo['name']]:''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_label('Precio', $precio['id']); ?></td>
			<td><?php echo form_input($precio); ?></td>
			<td style="color: red;"><?php echo form_error($precio['name']); ?><?php echo isset($errors[$precio['name']])?$errors[$precio['name']]:''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_label('Categoria', $categoria['id']); ?></td>
			<td><?php echo form_input($categoria); ?></td>
			<td style="color: red;"><?php echo form_error($categoria['name']); ?><?php echo isset($errors[$categoria['name']])?$errors[$categoria['name']]:''; ?></td>
		</tr>

		<tr>
			<td><?php echo form_label('Reseña', $text['id']); ?></td>
			<td><?php echo form_textarea($text); ?></td>
			<td style="color: red;"><?php echo form_error($text['name']); ?><?php echo isset($errors[$text['name']])?$errors[$text['name']]:''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_label('Stock', $stock['id']); ?></td>
			<td><?php echo form_input($stock); ?></td>
			<td style="color: red;"><?php echo form_error($stock['name']); ?><?php echo isset($errors[$stock['name']])?$errors[$stock['name']]:''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_label('Mostrar', $isPublic['id']); ?></td>
			<td><?php echo form_checkbox('isPublic', $isPublic); ?> </td>
		</tr>
	</table>
	<input type="file" name="userfile" size="20" />
	<td style="color: red;"><?php echo form_error('userfile'); ?>
	<br /><br />
	<input class="btn btn-success" type="submit" name="submit" value="Crear">
	<?php echo form_close(); ?>
</div>
</div>
