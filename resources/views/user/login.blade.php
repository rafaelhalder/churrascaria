<!DOCTYPE html>
<html>
    <head>
        <meta chasrset="utf-8">
        <title> Login | Churrascaria</title>
        <link rel="stylesheet" href="{{ URL::to('/css/stylesheet.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One"  rel="stylesheet">
    
    </head>
    <body>

        <div class="background"></div>

        <section id="conteudo-view" class="login">
            <h1>Churrascaria</h1>
            <h3>Gerenciamento Vegas</h3>

        {!! Form::open(['route' => 'user.login','method' => 'post']) !!}

    <label>
    {!! Form::text('username', null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}

    </label>
<label>
    {!!Form::password('password',['placeholder' => 'Senha']) !!}
</label>

{!! Form::submit('Entrar') !!}
        {!! Form::close() !!}

        </section>
    </body>




</html>
