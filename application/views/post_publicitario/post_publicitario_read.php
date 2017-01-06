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
        <h2 style="margin-top:0px">Post_publicitario Read</h2>
        <table class="table">
	    <tr><td>Nome</td><td><?php echo $nome; ?></td></tr>
	    <tr><td>Data Criacao</td><td><?php echo $data_criacao; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Texto</td><td><?php echo $texto; ?></td></tr>
	    <tr><td>Ativo</td><td><?php echo $ativo; ?></td></tr>
	    <tr><td>Largura Foto</td><td><?php echo $largura_foto; ?></td></tr>
	    <tr><td>Altura Foto</td><td><?php echo $altura_foto; ?></td></tr>
	    <tr><td>Id Usuario Criadro</td><td><?php echo $id_usuario_criadro; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('post_publicitario') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>