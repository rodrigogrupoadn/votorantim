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
        <h2 style="margin-top:0px">Classificacao Read</h2>
        <table class="table">
	    <tr><td>Classificacao</td><td><?php echo $classificacao; ?></td></tr>
	    <tr><td>Usuario Id</td><td><?php echo $usuario_id; ?></td></tr>
	    <tr><td>Fornecedor Id</td><td><?php echo $fornecedor_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('classificacao') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>