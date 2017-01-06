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
        <h2 style="margin-top:0px">Contato Read</h2>
        <table class="table">
	    <tr><td>Nome</td><td><?php echo $nome; ?></td></tr>
	    <tr><td>Ramal</td><td><?php echo $ramal; ?></td></tr>
	    <tr><td>Setor</td><td><?php echo $setor; ?></td></tr>
	    <tr><td>Ativo</td><td><?php echo $ativo; ?></td></tr>
	    <tr><td>Fornecedor Id</td><td><?php echo $fornecedor_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('contato') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>