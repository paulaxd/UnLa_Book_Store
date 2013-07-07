<?php
$id_descuento = array(
		'name'	=> 'id_descuento',
		'id'	=> 'id_descuento',
		'value' => $descuentos['id_descuento'],
		'maxlength'	=> 80,
		'size'	=> 40,
		'type' => 'hidden',
		);

$cantidad = array(
		'name'	=> 'cantidad',
		'id'	=> 'cantidad',
		'value' => $descuentos['cantidad'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);
$descuento = array(
		'name'	=> 'descuento',
		'id'	=> 'descuento',
		'value' => $descuentos['descuento'],
		'maxlength'	=> 80,
		'size'	=> 40,
		);
?>

<h2>Modificar Descuento</h2>
<div class="container">
   <div class="hero-unit">
        <?php echo form_open_multipart('descuentos/update') ?>
            <table>
                    <tr>
                            <td><?php echo form_label('ID', $id_descuento['id']); ?></td>
                            <td></td>
			    <td>
			    <?php echo form_input($id_descuento) ?>
			    <?php echo $id_descuento['value'] ?>
			    </td>
                    </tr>
                    <tr>
                            <td><?php echo form_label('Cantidad de Libros', $cantidad['id']); ?></td>
                            <td></td>
			    <td><?php echo form_input($cantidad); ?></td>
                            <td style="color: red;"><?php echo form_error($cantidad['name']); ?><?php echo isset($errors[$cantidad['name']])?$errors[$cantidad['name']]:''; ?></td>
                    </tr>
                    <tr>
                            <td><?php echo form_label('Descuento', $descuento['id']); ?></td>
			    <td>%</td>
                            <td><?php echo form_input($descuento); ?></td>
                            <td style="color: red;"><?php echo form_error($descuento['name']); ?><?php echo isset($errors[$descuento['name']])?$errors[$descuento['name']]:''; ?></td>
                    </tr>
            </table>
        <input class="btn btn-success" type="submit" name="submit" value="Modificar">
        <?php echo form_close(); ?>
    </div>
</div>