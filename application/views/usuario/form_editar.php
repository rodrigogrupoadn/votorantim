
    <form action="Usuario/update_action" method="post">
	    <div class="form-group">
            <label for="varchar">Nome <?php echo form_error('nome') ?></label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php  echo $usuario->nome  ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $usuario->email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Senha <?php echo form_error('senha') ?></label>
            <input type="text" class="form-control" name="senha" id="senha" placeholder="Senha" value="<?php echo $usuario->senha; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Cargo <?php echo form_error('cargo') ?></label>
            <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo" value="<?php echo $usuario->cargo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Departamento <?php echo form_error('departamento') ?></label>
            <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Departamento" value="<?php echo $usuario->departamento; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd1 <?php echo form_error('ddd1') ?></label>
            <input type="text" class="form-control" name="ddd1" id="ddd1" placeholder="Ddd1" value="<?php echo $usuario->ddd1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone1 <?php echo form_error('telefone1') ?></label>
            <input type="text" class="form-control" name="telefone1" id="telefone1" placeholder="Telefone1" value="<?php echo $usuario->telefone1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ddd2 <?php echo form_error('ddd2') ?></label>
            <input type="text" class="form-control" name="ddd2" id="ddd2" placeholder="Ddd2" value="<?php echo $usuario->ddd2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telefone2 <?php echo form_error('telefone2') ?></label>
            <input type="text" class="form-control" name="telefone2" id="telefone2" placeholder="Telefone2" value="<?php echo $usuario->telefone2; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Chat Ativo <?php echo form_error('chat_ativo') ?></label>
            <input type="text" class="form-control" name="chat_ativo" id="chat_ativo" placeholder="Chat Ativo" value="<?php echo $usuario->chat_ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Ativo <?php echo form_error('ativo') ?></label>
            <input type="text" class="form-control" name="ativo" id="ativo" placeholder="Ativo" value="<?php echo $usuario->ativo; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Empresa Id <?php echo form_error('empresa_id') ?></label>
            <input type="text" class="form-control" name="empresa_id" id="empresa_id" placeholder="Empresa Id" value="<?php echo $usuario->empresa_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Perfil Id <?php echo form_error('perfil_id') ?></label>
            <input type="text" class="form-control" name="perfil_id" id="perfil_id" placeholder="Perfil Id" value="<?php echo $usuario->perfil_id; ?>" />
        </div>
	         <div class="modal-footer">
	    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" /> 
	    <button type="submit" class="btn btn-success">Salvar</button> 
	    <a href="<?php echo site_url('usuario') ?>" class="btn btn-default">Cancel</a>
        </div>
	</form>

