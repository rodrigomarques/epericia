<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/9d640f5e27.js" crossorigin="anonymous"></script>
    <title>Redefinir Senha</title>
</head>
<body>
    <div>
        <h1>e-perícia</h1>
    </div>
    <main class="containerSenha">
        <h2>Redefinir Senha</h2>
        <form action="" method="POST">
            <div class="campoPreenchimento">
                <label for="email"><i class="far fa-envelope"></i> e-mail</label>
                <input type="email" name="email" id="email" placeholder="Informe o seu email de cadastro">
            </div>
            
            <input type="submit" id= "submit" value="Alterar senha">

            <div id="voltarLogin">
                <a href= "{{ route('home') }}">Retornar à página de Login</a>
            </div>
            
        </form>
    </main>
</body>
</html>
