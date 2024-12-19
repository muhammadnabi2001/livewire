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
    <div class="container-fluid">
        <div class="row">
            <h1>Hello</h1>
            <div class="col-12">
                <ul>
                    <li><a href="/" wire:navigate>Home</a></li>
                    <li><a href="/calc" wire:navigate>Calc</a></li>
                    <li><a href="/talabalar" wire:navigate>Talabalar</a></li>
                    <li><a href="category" wire:navigate>Categoryalar</a></li>
                    <li><a href="/posts" wire:navigate>Posts</a></li>
                    <li><a href="/newpost" wire:navigate>New Posts</a></li>
                    <li><a href="/group" wire:navigate>Groups</a></li>
                    <li><a href="/task" wire:navigate>Tasks</a></li>
                    <li><a href="/davomat" wire:navigate>Davomat</a></li>
                    <li><a href="/ovqatlar" wire:navigate>Ovqatlar</a></li>
                    <li><a href="/users" wire:navigate>Users</a></li>
                    <li><a href="/check">Check</a></li>
                    <li><a href="/hodim">Hodim</a></li>
                    <li><a href="/news">News</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            {{$slot}}
        </div>
    </div>
    @livewireScripts
  </body>
  <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
</html>