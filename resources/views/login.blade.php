<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/9d640f5e27.js" crossorigin="anonymous"></script>
    <title>Login e-perícia</title>
</head>
<body>
    <div>
        <h1>Sistema e-perícia</h1>
    </div>
    <main class="container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="campoPreenchimento">
                <label for="username"><i class="far fa-user"></i> Usuário</label>
                <input type="text" name="username" id="username" placeholder="Informe o seu username ou email">
            </div>
            <div class="campoPreenchimento">
                <label for="password"><i class="fas fa-unlock-alt"></i>  Senha</label>
                <input type="password" name="password" id="password" placeholder="Digite a sua senha">
            </div>
            <div id="recuperarSenha">
                <span>Esqueceu sua senha? <a href= "{{ route('esqueceu-senha') }}">Clique aqui</a></span>
            </div>
            
            <input type="submit" id= "submit" value="Entrar">
        </form>

        <section>
            <div id="lembrar">
                <input type="checkbox" id="checkboxLembrar" name="lembrar" value="lembrar">
                <label for="checkboxLembrar"> Lembre-se de mim</label>
            </div>
        </section>   
    </main>
</body>
</html>
