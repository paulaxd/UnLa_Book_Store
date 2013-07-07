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

<h2>Eliminar Descuento</h2>
<div class="container">
   <div class="hero-unit">
        <?php echo form_open_multipart('descuentos/delete') ?>
            <table class="table">
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
                            <td><?php echo $cantidad['value'] ?></td>
                    </tr>
                    <tr>
                            <td><?php echo form_label('Descuento', $descuento['id']); ?></td>
			    <td>%</td>
                            <td><?php echo $descuento['value'] ?></td>
                    </tr>
            </table>
        <input class="btn btn-success" type="submit" name="submit" value="Confirmar">
        <?php echo form_close(); ?>
    </div>
</div>