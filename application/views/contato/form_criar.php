
    <form action="Contato/create_action" method="post">
	    <div class="form-group">
            <label for="varchar">Nome <?php echo form_error('nome') ?></label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ramal <?php echo form_error('ramal') ?></label>
            <input type="text" class="form-control" name="ramal" id="ramal" placeholder="Ramal"  />
        </div>
	    <div class="form-group">
            <label for="varchar">Setor <?php echo form_error('setor') ?></label>
            <input type="text" class="form-control" name="setor" id="setor" placeholder="Setor" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo"  />
        </div>
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id"  />
        </div>
	    <input type="hidden" name="id"  /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('contato') ?>" class="btn btn-default">Cancelar</a>
	</form>