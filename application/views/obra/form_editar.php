
    <form action="Obra/update_action" method="post">
	    <div class="form-group">
            <label for="varchar">Nome <?php echo form_error('nome') ?></label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $obra->nome; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Endereco <?php echo form_error('endereco') ?></label>
            <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereco" value="<?php echo $obra->endereco; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Data Inicio <?php echo form_error('data_inicio') ?></label>
            <input type="text" class="form-control" name="data_inicio" id="data_inicio" placeholder="Data Inicio" value="<?php echo $obra->data_inicio; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Data Previsao <?php echo form_error('data_previsao') ?></label>
            <input type="text" class="form-control" name="data_previsao" id="data_previsao" placeholder="Data Previsao" value="<?php echo $obra->data_previsao; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $obra->ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Eng Resp <?php echo form_error('id_eng_resp') ?></label>
            <input type="text" class="form-control" name="id_eng_resp" id="id_eng_resp" placeholder="Id Eng Resp" value="<?php echo $obra->id_eng_resp; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" value="<?php echo $obra->empresa_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $obra->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('obra') ?>" class="btn btn-default">Cancelar</a>
	</form>
