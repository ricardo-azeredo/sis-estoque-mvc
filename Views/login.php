<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estoque</title>
    <link rel="stylesheet" href="<?php echo BASE_URL?>/assets/css/login.css">
</head>
<body>
    <div class="loginarea">
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

    </div>
    
</body>
</html>