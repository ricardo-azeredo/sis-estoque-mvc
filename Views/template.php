<html>
<head>
	<title>Sistema de Estoque</title>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style.css">
</head>
<body>
	<?php if (isset($viewData['menu'])) : ?>
		<div class="header">
			<nav>
				<ul>
					<?php foreach($viewData['menu'] as $url => $menutitle): ?>
						<li>
							<a href="<?php echo $url; ?>">
								<?php echo $menutitle; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
	<?php endif; ?>
	<div class="container">
		<h1>Sistema de Estoque</h1>
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</div>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>						 -->
	<script src="<?php echo BASE_URL;?>assets/js/script.js"></script>	
</body>
</html>