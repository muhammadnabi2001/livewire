<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>message</h1>
        </div>
        <div class="row">
            <div class="col-4">
                @foreach($users as $user)
                <div class="row">
                    <a href="{{ route('message', $user->id) }}">{{$user->name}}</a>
                </div>
                @endforeach
            </div>
            <div class="col-4">
                <form action="{{route('xabar',$chatId->id)}}" method="POST">
                    @csrf
                    <label for="">{{$ga->name}} :</label>
                    <input type="text" class="form-control" name="text"> <br>
                    <input type="submit" name="ok" class="btn btn-primary" value="Sent">
                </form><br>
                <br>
                <br>
                <ul class="list-group" id="chatList">
                    @foreach($models as $model)
                        <li class="list-group-item">{{$model->text}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </div>
    <script>
        const chatId = @json($chatId->id);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>