<h1>Home</h1>

<h3>Lista dos Produtos</h3>


<a href="<?php echo BASE_URL;?>home/add">Adicionar Produto</a>

<table border="1" width="100%">
	<tr>
		<th>Cód.</th>
		<th>Produto</th>
		<th>Preço Unit.</th>
		<th>Qtd.</th>
		<th>Ações</th>
	</tr>
	<?php foreach($lista as $item) : ?>
		<tr>
			<td><?php echo $item['codigo']; ?></td>
			<td><?php echo $item['produto']; ?></td>
			<td>R$ <?php echo number_format($item['preco'],2,',','.'); ?></td>
			<td><?php echo $item['quantidade']; ?></td>
			<td>
				<a href="<?php echo BASE_URL;?>home/edit/<?php echo $item['id'];?>">Editar</a>
			</td>
			
		</tr>
	<?php endforeach; ?>	
</table>