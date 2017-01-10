
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
            <input readonly type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="<?php echo $usuario->senha; ?>" />
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
                         <select class="form-control" name="empresa_id" id="empresa_id">
                         <option selected value="<?php echo $usuario->empresa_id; ?>">
                             
                             <?php
				$query = $this->db->query("SELECT * FROM empresa WHERE id = $usuario->empresa_id");
				foreach ($query->result() as $user)
				{ $titulo_empresa = $user->razao_social;
                echo $titulo_empresa;
                }
				?>
     
                </option> 
				<?php
				$query = $this->db->query("SELECT * FROM empresa");
				foreach ($query->result() as $user)
				{ 
                    if($user->razao_social != $titulo_empresa){ ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->razao_social; ?> </option>         
                    <?php } else{} } ?>
                </select>


        </div>
	    <div class="form-group">
            <label for="int">Perfil Id <?php echo form_error('perfil_id') ?></label>
           

            
                     <select class="form-control" name="perfil_id" id="perfil_id">
                         <option selected value="<?php echo $usuario->perfil_id; ?>">
                             
                             <?php
				$query = $this->db->query("SELECT * FROM perfil WHERE id = $usuario->perfil_id");
				foreach ($query->result() as $user)
				{ $titulo_perfil = $user->descricao;
                echo $titulo_perfil;
                }
				?>
     
                </option> 
				<?php
				$query = $this->db->query("SELECT * FROM perfil");
				foreach ($query->result() as $user)
				{ 
                    if($user->descricao != $titulo_perfil){ ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->descricao; ?> </option>         
                    <?php } else{} } ?>
                </select>

        </div>
	         <div class="modal-footer">
	    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" /> 
	    <button type="submit" class="btn btn-success">Salvar</button> 
	    <a href="<?php echo site_url('usuario') ?>" class="btn btn-default">Cancelar</a>
        </div>
	</form>

