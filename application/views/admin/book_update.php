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
<?php
$isbn = array(
		'name'	=> 'isbn',
		'id'	=> 'isbn',
		'value' => $books_item['isbn'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);


$autor = array(
		'name'	=> 'autor',
		'id'	=> 'autor',
		'value' => $books_item['author'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$titulo = array(
		'name'	=> 'titulo',
		'id'	=> 'titulo',
		'value' => $books_item['title'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);

$precio = array(
		'name'	=> 'precio',
		'id'	=> 'precio',
		'value' => $books_item['price'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$categoria = array(
		'name'	=> 'categoria',
		'id'	=> 'categoria',
		'value' => $books_item['category'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$text = array(
		'name'	=> 'text',
		'id'	=> 'text',
		'value' => $book_review['review'],
		);

if($books_item['isPublic'] == '1')
{
      $checkedChk = true;
}
else
{
      $checkedChk = false;
}

$isPublic = array(
    'name'        => 'isPublic',
    'id'          => 'isPublic',
    'value'       => $books_item['isPublic'],
    'checked'     => $checkedChk,
    'style'       => 'margin:10px',
    );

$stock = array(
	    'name'	=> 'stock',
	    'id'	=> 'stock',
	    'value'     => $books_item['stock'],
	    'maxlength'	=> 80,
	    'size'	=> 40,
    );
    
?>


<div class="container">
   <div class="hero-unit">

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('admin/view/'.$books_item['isbn']);?>
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
			<td><?php echo form_checkbox($isPublic); ?> </td>
		</tr>
	</table>
	<input type="file" name="userfile" size="20" />
	<td style="color: red;"><?php echo form_error('userfile'); ?>
	<br /><br />
	<input class="btn btn-success" type="submit" name="submit" value="Actualizar">
	<?php echo form_close(); ?>
</div>
</div>
