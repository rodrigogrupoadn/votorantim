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
        <h2 style="margin-top:0px">Post Read</h2>
        <table class="table">
	    <tr><td>Texto</td><td><?php echo $texto; ?></td></tr>
	    <tr><td>Data Criacao</td><td><?php echo $data_criacao; ?></td></tr>
	    <tr><td>Largura Foto</td><td><?php echo $largura_foto; ?></td></tr>
	    <tr><td>Altura Foto</td><td><?php echo $altura_foto; ?></td></tr>
	    <tr><td>Usuario Id</td><td><?php echo $usuario_id; ?></td></tr>
	    <tr><td>Fase Obra Id</td><td><?php echo $fase_obra_id; ?></td></tr>
	    <tr><td>Empresa Id</td><td><?php echo $empresa_id; ?></td></tr>
	    <tr><td>Obra Id</td><td><?php echo $obra_id; ?></td></tr>
	    <tr><td>Grupo Material Obra Id</td><td><?php echo $grupo_material_obra_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('post') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>