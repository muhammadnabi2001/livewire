<div>
    {{-- Be like water. --}}
    <div class="containter">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tr</th>
                      </tr>
                    </thead>
                    <tbody wire:sortable='updateGroup'>
                        @foreach($groups as $group)
                      <tr draggable="true" wire:sortable.item="{{$group->id}}">
                        <th scope="row">{{$group->id}} </th>
                        <th scope="row">{{$group->name}} </th>
                        <th scope="row">{{$group->sort}} </th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
