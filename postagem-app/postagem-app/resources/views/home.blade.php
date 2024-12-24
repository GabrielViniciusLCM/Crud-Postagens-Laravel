<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    @auth
    <p>Você está logado</p>
    <form action= "/logout" method="post">
        {{csrf_field()}}
        <button>Sair</button>
    </form>

    <div style="border: 3px solid black; ">
        <h2>Faça uma nova postagem</h2>
        <form action="/criar-post" method="post">
            {{csrf_field()}}
            <input type="text" name="title" placeholder="titulo">
            <textarea name="body" placeholder="conteudo do post"></textarea>
            <button>Salvar</button>
        </form>
    </div>

    <div style="border: 3px solid black; ">
        <h2>Todas suas postagens </h2>
        @foreach($posts as $post)
        <div style ="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{$post['title']}} por {{$post->user->name}} </h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post -> id}}">Editar</a></p>
            <form action= "/delete-post/{{$post -> id}}" method ="post">
                {{csrf_field()}}
                @method ('DELETE')
                <button>Excluir</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <div style="border: 3px solid black; ">    
        <h2>Login</h2>
        <form action = "/login" method = "post">
            {{csrf_field()}}
            <input type = "text" placeholder= "nome" name = "loginname">
            <input type = "password" placeholder= "senha" name = "loginpassword">
            <button>Entrar</button>
        </form>
    </div>
    <div style="border: 3px solid black; ">    
        <h2>Cadastro</h2>
        <form action = "/register" method = "post">
            {{csrf_field()}}
            <input type = "text" placeholder= "nome" name = "name">
            <input type = "text" placeholder= "email" name = "email">
            <input type = "password" placeholder= "senha" name = "password">
            <button>Cadastrar</button>
        </form>
    </div>
    @endauth

    
</body>
</html>