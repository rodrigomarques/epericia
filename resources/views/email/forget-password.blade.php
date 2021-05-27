<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Redefinição de senha</h1>
    <p>Foi realizado um pedido de redefinição de senha no sistema e-pericia para você.</p>
    <p>Para concluir a redefinição de senha, <a href="{{ route('new-password', [ 'b' => $hash) }}">clique no link</a></p>
    <p>Se não foi você quem solicitou esse pedido, favor desconsiderar o e-mail.</p>
</body>
</html>