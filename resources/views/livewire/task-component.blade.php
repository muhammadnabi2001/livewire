<div>
    {{-- Be like water. --}}
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <h1>Task1</h1>
                    <ul class="list-group" wire:sortable='updateTask'>
                        @foreach($task1 as $task)
                        <li class="list-group-item" draggable="true" wire:sortable.item="{{$task->id}}">{{$task->name}} </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-3">
                    <h1>Task2</h1>
                    <ul class="list-group" wire:sortable='updateTask'>
                        @foreach($task2 as $item)
                        <li class="list-group-item" draggable="true" wire:sortable.item="{{$item->id}}">{{$item->name}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-3">
                    <h1>Task3</h1>
                    <ul class="list-group" wire:sortable='updateTask'>
                        @foreach($task3 as $key)
                        <li class="list-group-item" draggable="true" wire:sortable.item="{{$key->id}}">{{$key->name}} </li>

                        @endforeach
                    </ul>
                </div>
                <div class="col-3">
                    <h1>Task4</h1>
                    <ul class="list-group" wire:sortable='updateTask'>
                        @foreach($task4 as $t)
                        <li class="list-group-item" draggable="true" wire:sortable.item="{{$t->id}}" >{{$t->name}} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>