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
        <h2 style="margin-top:0px">Grupo_material Read</h2>
        <table class="table">
	    <tr><td>Descricao</td><td><?php echo $descricao; ?></td></tr>
	    <tr><td>Ativo</td><td><?php echo $ativo; ?></td></tr>
	    <tr><td>Empresa Id</td><td><?php echo $empresa_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('grupo_material') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>