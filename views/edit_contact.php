<h3 class="mt-5">Contato - Editar</h3>
<hr/>

<form method="POST" id="form-add" action="<?php echo BASE_URL;?>home/edit_contact"class="needs-validation" novalidate>
	<div class="form-group mb-3">

		<label for="tName" class="form-label"><strong>Nome:</strong></label>
		<?php if(!empty($_SESSION['error_name'])):?>
			<input type="text" 
			<?php
				if(!empty($_SESSION['value_name'])){
					echo 'value="'.$_SESSION['value_name'].'"';
					unset($_SESSION['value_name']);
				}
			?>
			name="name" class="form-control input-error" id="tName" placeholder="Insira o nome ..." required/>
			<div class="error-input">
				<?php if(!empty($_SESSION['error_name'])){
					echo $_SESSION['error_name'];
					unset($_SESSION['error_name']);
				}
				?>
			</div>
		<?php else: ?>
			<input type="text"
			<?php
				if(!empty($_SESSION['value_name'])){
					echo 'value="'.$_SESSION['value_name'].'"';
					unset($_SESSION['value_name']);
				}else{
					echo 'value="'.$contact_info['name'].'"';
				}
			?>
			name="name" class="form-control" id="tName" placeholder="Insira o nome ..." required />
		<?php endif; ?>
		
		<div class="invalid-feedback">
			Preencha o nome
		</div>
	</div>

	<div class="form-group mb-3">
		<label for="tEmail" class="form-label"><strong>Email:</strong></label>
		<?php if(!empty($_SESSION['error_email'])):?>
			<input type="email"
			<?php
				if(!empty($_SESSION['value_email'])){
					echo 'value="'.$_SESSION['value_email'].'"';
					unset($_SESSION['value_email']);
				}
			?>
			name="email" class="form-control input-error" id="tEmail" placeholder="Insira o email ..." required/>
			<div class="error-input">
				<?php
					if(!empty($_SESSION['error_email'])){
						echo $_SESSION['error_email'];
						unset($_SESSION['error_email']);
					}
				?>
			</div>
		<?php else: ?>
			<input type="email"
			<?php
				if(!empty($_SESSION['value_email'])){
					echo 'value="'.$_SESSION['value_email'].'"';
					unset($_SESSION['value_email']);
				}else{
					echo 'value="'.$contact_info['email'].'"';
				}
			?>
			name="email" class="form-control" id="tEmail" placeholder="Insira o email ..." required/>
		<?php endif;?>
		
		<div class="invalid-feedback">
			Insira um email correto
		</div>
	</div>
	<input type="hidden" name="id" value="<?php echo $contact_info['id'];?>"/>
	<div class="form-group mb-3">
		<input type="submit" class="btn btn-primary" value="Atualizar"/>
	</div>
</form>