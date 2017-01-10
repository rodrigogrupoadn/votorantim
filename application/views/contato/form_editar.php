
    <form action="Contato/update_action" method="post">
	    <div class="form-group">
            <label for="varchar">Nome <?php echo form_error('nome') ?></label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $contato->nome; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ramal <?php echo form_error('ramal') ?></label>
            <input type="text" class="form-control" name="ramal" id="ramal" placeholder="Ramal" value="<?php echo $contato->ramal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Setor <?php echo form_error('setor') ?></label>
            <input type="text" class="form-control" name="setor" id="setor" placeholder="Setor" value="<?php echo $contato->setor; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $contato->ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Fornecedor Id <?php echo form_error('fornecedor_id') ?></label>
            <input type="text" class="form-control" name="fornecedor_id" id="fornecedor_id" placeholder="Fornecedor Id" value="<?php echo $contato->fornecedor_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $contato->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('contato') ?>" class="btn btn-default">Cancelar</a>
	</form>


