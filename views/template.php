<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Contatos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/all.css"/>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css?3" type="text/css" />
	</head>
	<body>
		<header>
			<h2>Gerenciamento de Contatos</h2>
		</header>
		<main>
			<div class="container">
				<?php
	        		$this->loadViewInTemplate($viewName, $viewData);
	       		?>
    		</div>
		</main>
		<footer>
			<p>F@C Sistemas &reg; 2022</p>
		</footer>
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/all.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js?v2"></script>
	</body>
</html>