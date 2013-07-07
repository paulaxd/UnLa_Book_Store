<?php

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

<h2>Crear Descuento</h2>
<div class="container">
   <div class="hero-unit">
        <?php echo form_open_multipart('descuentos/create') ?>
            <table>
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
        <input class="btn btn-success" type="submit" name="submit" value="Crear">
        <?php echo form_close(); ?>
    </div>
</div>