<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  @livewireStyles
</head>
  <body>
    <div class="container">
        <div class="row">
            <h1>Hello</h1>
            <div class="col-12">
                <ul>
                    <li><a href="/" wire:navigate>Home</a></li>
                    <li><a href="/calc" wire:navigate>Calc</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            {{$slot}}
        </div>
    </div>
    @livewireScripts
  </body>
</html>