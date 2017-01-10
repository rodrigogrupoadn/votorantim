
    <form action="Post_publicitario/update_action" method="post">

	   <div class="form-group">
            <label for="varchar">Nome <?php echo form_error('nome') ?></label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $post_publicitario->nome; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Data Criacao <?php echo form_error('data_criacao') ?></label>
            <input type="text" class="form-control" name="data_criacao" id="data_criacao" placeholder="Data Criacao" value="<?php echo $post_publicitario->data_criacao; ?>" />
        </div>
	    <div class="form-group">
            <label for="blob">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $post_publicitario->foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="texto">Texto <?php echo form_error('texto') ?></label>
            <textarea class="form-control" rows="3" name="texto" id="texto" placeholder="Texto"><?php echo $post_publicitario->texto; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $post_publicitario->ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Largura Foto <?php echo form_error('largura_foto') ?></label>
            <input type="text" class="form-control" name="largura_foto" id="largura_foto" placeholder="Largura Foto" value="<?php echo $post_publicitario->largura_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Altura Foto <?php echo form_error('altura_foto') ?></label>
            <input type="text" class="form-control" name="altura_foto" id="altura_foto" placeholder="Altura Foto" value="<?php echo $post_publicitario->altura_foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Usuario Criadro <?php echo form_error('id_usuario_criadro') ?></label>
            <input type="text" class="form-control" name="id_usuario_criadro" id="id_usuario_criadro" placeholder="Id Usuario Criadro" value="<?php echo $post_publicitario->id_usuario_criadro; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $post_publicitario->id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Salvar</button> 
	    <a href="<?php echo site_url('post_publicitario') ?>" class="btn btn-default">Cancel</a>
	</form>