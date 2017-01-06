<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Fornecedor_material Read</h2>
        <table class="table">
	    <tr><td>Fornecedor Id</td><td><?php echo $fornecedor_id; ?></td></tr>
	    <tr><td>Grupo Material Obra Id</td><td><?php echo $grupo_material_obra_id; ?></td></tr>
	    <tr><td>Obra Id</td><td><?php echo $obra_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fornecedor_material') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>