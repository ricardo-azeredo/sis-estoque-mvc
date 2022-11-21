
<h1>Home</h1>

<a href="<?php echo BASE_URL;?>home/add">Adicionar Produto</a>

<form method="get">
	<fieldset>
		<input 
			type="text" 
			placeholder="Digite o código ou nome do produto" 
			name="busca"
			id="busca"
			value=<?=(!empty($_GET['busca'])) ? $_GET['busca'] : '' ;?>
		>
		
	</fieldset>
</form>
<br><br>

<table border="1" width="100%">
	<tr>
		<th>Cód.</th>
		<th>Produto</th>
		<th>Preço Unit.</th>
		<th>Qtd.</th>
		<th>Ações</th>
	</tr>
	<?php foreach($viewData as $item) : ?>
		<tr>
			<td><?php echo $item['codigo']; ?></td>
			<td><?php echo $item['produto']; ?></td>
			<td>R$ <?php echo number_format($item['preco'],2,',','.'); ?></td>
			<td><?php echo $item['quantidade']; ?></td>
			<td>
				<a href="<?php echo BASE_URL;?>home/editar/<?php echo $item['id'];?>">Editar</a>
			</td>
			
		</tr>
	<?php endforeach; ?>	
</table>

<script type="text/javascript">
	document.querySelector('#busca').focus();
</script>