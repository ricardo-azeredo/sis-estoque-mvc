<h1>Editar Produto</h1>


<form action="" method="POST" class="form">
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