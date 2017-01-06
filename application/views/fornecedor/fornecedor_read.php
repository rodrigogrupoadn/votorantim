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
        <h2 style="margin-top:0px">Fornecedor Read</h2>
        <table class="table">
	    <tr><td>Razao Social</td><td><?php echo $razao_social; ?></td></tr>
	    <tr><td>Cnpj</td><td><?php echo $cnpj; ?></td></tr>
	    <tr><td>Ddd1</td><td><?php echo $ddd1; ?></td></tr>
	    <tr><td>Telefone1</td><td><?php echo $telefone1; ?></td></tr>
	    <tr><td>Ddd2</td><td><?php echo $ddd2; ?></td></tr>
	    <tr><td>Telefone2</td><td><?php echo $telefone2; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Ativo</td><td><?php echo $ativo; ?></td></tr>
	    <tr><td>Empresa Id</td><td><?php echo $empresa_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fornecedor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>