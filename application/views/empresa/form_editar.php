
    <form action="Empresa/update_action" method="post">
	   	    <div class="form-group">
            <label for="varchar">Razao Social <?php echo form_error('razao_social') ?></label>
            <input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="Razao Social" value="<?php echo $empresa->razao_social; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Cnpj <?php echo form_error('cnpj') ?></label>
            <input type="text" class="form-control" name="cnpj" id="cnpj" placeholder="Cnpj" value="<?php echo $empresa->cnpj; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $empresa->email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd1 <?php echo form_error('ddd1') ?></label>
            <input type="text" class="form-control" name="ddd1" id="ddd1" placeholder="Ddd1" value="<?php echo $empresa->ddd1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone1 <?php echo form_error('telefone1') ?></label>
            <input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone1" value="<?php echo $empresa->telefone1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd2 <?php echo form_error('ddd2') ?></label>
            <input type="text" class="form-control" name="ddd2" id="ddd2" placeholder="Ddd2" value="<?php echo $empresa->ddd2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Endereco <?php echo form_error('endereco') ?></label>
            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereco" value="<?php echo $empresa->endereco; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Representante <?php echo form_error('representante') ?></label>
            <input type="text" class="form-control" name="representante" id="representante" placeholder="Representante" value="<?php echo $empresa->representante; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contato <?php echo form_error('contato') ?></label>
            <input type="text" class="form-control" name="contato" id="contato" placeholder="Contato" value="<?php echo $empresa->contato; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $empresa->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('empresa') ?>" class="btn btn-default">Cancelar</a>
	</form>