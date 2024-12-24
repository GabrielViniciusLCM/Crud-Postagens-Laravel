<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Postagem</h1>
    <form action="/edit-post/{{$post -> id}}" method = "post">
        {{csrf_field()}}
        @method ('PUT')
        <input type="text" name = "title" value ="{{$post -> title}}">
        <textarea name="body">{{$post -> body}}</textarea>
        <button>Salvar</button>
    </form>
</body>
</html>