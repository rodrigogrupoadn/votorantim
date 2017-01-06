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
        <h2 style="margin-top:0px">Usuario Read</h2>
        <table class="table">
	    <tr><td>Nome</td><td><?php echo $nome; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Senha</td><td><?php echo $senha; ?></td></tr>
	    <tr><td>Cargo</td><td><?php echo $cargo; ?></td></tr>
	    <tr><td>Departamento</td><td><?php echo $departamento; ?></td></tr>
	    <tr><td>Ddd1</td><td><?php echo $ddd1; ?></td></tr>
	    <tr><td>Telefone1</td><td><?php echo $telefone1; ?></td></tr>
	    <tr><td>Ddd2</td><td><?php echo $ddd2; ?></td></tr>
	    <tr><td>Telefone2</td><td><?php echo $telefone2; ?></td></tr>
	    <tr><td>Chat Ativo</td><td><?php echo $chat_ativo; ?></td></tr>
	    <tr><td>Ativo</td><td><?php echo $ativo; ?></td></tr>
	    <tr><td>Empresa Id</td><td><?php echo $empresa_id; ?></td></tr>
	    <tr><td>Perfil Id</td><td><?php echo $perfil_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('usuario') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>