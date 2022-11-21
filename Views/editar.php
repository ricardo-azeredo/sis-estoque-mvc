<h1>Editar Produto</h1>
<a href="<?php echo BASE_URL; ?>">Voltar</a><br>

<form action="" method="POST">
    <label for="">Código</label>
    <input type="text" name="codigo" value="<?=$info['codigo'];?>" required />
    <br>
    
    <label>Produto</label>
    <input type="text" name="produto" value="<?=$info['produto'];?>" required>
    <br>

    <label>Preço</label>
    <input type="text" name="preco" value="<?=$info['preco'];?>" required>
    <br>

    <label>Quantidade</label>
    <input type="text" name="quantidade" value="<?=$info['quantidade'];?>" required>
    <br>

    <label>Qtd. Minima</label>
    <input type="text" name="minima" value="<?=$info['min_quantidade'];?>" required>
    <br>

    <input type="submit" value="Salvar">

</form>