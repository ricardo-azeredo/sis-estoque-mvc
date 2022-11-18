<h1>Login</h1>

<form action="" method="post">
    <label>
        Email:
    </label> <br/>
    <input type="email" name="email" placeholder="Digite seu email">
    <br/><br/>
    <label>Senha:</label><br/>
    <input type="password" name="senha" placeholder="Digite sua senha"><br/><br/>

    <input type="submit" value="Entrar" name="enviar">
</form>

<?php if(!empty($msg)): ?>
    <h2><?=$data['msg']; ?></h2>


<?php endif; ?>    