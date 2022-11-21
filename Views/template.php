<html>
<head>
	<title>Sistema de Estoque</title>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>\assets\css\style.css">
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
</body>
</html>