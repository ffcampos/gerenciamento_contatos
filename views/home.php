<h3 class="mt-3 mb-3">Contatos</h3>
<a class="btn btn-primary" href="<?php echo BASE_URL; ?>home/add">Adicionar</a>

<?php if(isset($_SESSION['add_success'])):?>
	<div class="alert alert-success alert-dismissible fade show mt-3" role="alert"><?php echo $_SESSION['add_success'];unset($_SESSION['add_success']);?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif;?>

<?php if(isset($_SESSION['edit_success'])):?>
	<div class="alert alert-success alert-dismissible fade show mt-3" role="alert"><?php echo $_SESSION['edit_success'];unset($_SESSION['edit_success']);?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif;?>

<?php if(isset($_SESSION['del_success'])):?>
	<div class="alert alert-success alert-dismissible fade show mt-3" role="alert"><?php echo $_SESSION['del_success'];unset($_SESSION['del_success']);?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif;?>

<table class="table table-striped mt-4 mb-4">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($contatos as $contato): ?>
			<tr>
				<td><?php echo $contato['name'];?></td>
				<td><?php echo $contato['email']; ?></td>
				<td><a id="edit-btn" class="btn btn-primary btn-sm" href="<?php echo BASE_URL;?>home/editContact/<?php echo $contato['id'];?>"><i class="fa fa-pen"></i> Editar</a> <a class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')" href="<?php echo BASE_URL;?>home/delContact/<?php echo $contato['id'];?>"><i class="fa fa-trash"></i> Excluir</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>
<p><strong>Total de Contatos: <?php echo count($contatos); ?></strong></p>