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
        <h2 style="margin-top:0px">Fornecedor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Razao Social <?php echo form_error('razao_social') ?></label>
            <input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Razao Social" value="<?php echo $razao_social; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Cnpj <?php echo form_error('cnpj') ?></label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="Cnpj" value="<?php echo $cnpj; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd1 <?php echo form_error('ddd1') ?></label>
            <input type="text" class="form-control" name="ddd1" id="ddd1" placeholder="Ddd1" value="<?php echo $ddd1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone1 <?php echo form_error('telefone1') ?></label>
            <input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone1" value="<?php echo $telefone1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd2 <?php echo form_error('ddd2') ?></label>
            <input type="text" class="form-control" name="ddd2" id="ddd2" placeholder="Ddd2" value="<?php echo $ddd2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone2 <?php echo form_error('telefone2') ?></label>
            <input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone2" value="<?php echo $telefone2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" value="<?php echo $empresa_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('fornecedor') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>