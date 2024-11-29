<div>
    <h1>Categoryalar</h1>
    <button class="btn btn-primary m-2" wire:click="{{ $check ? 'back' : 'add'}}"> {{ $check ? 'back' : 'add'}} </button>

    @if ($check)

    <form wire:submit.preven="save">
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" wire:model='name' placeholder="CategoryName">
            </div>
            
            <div class="col-4">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
        </div>
    </form>
    @endif

    @if(!$check)
        
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Option</th>
        </tr>
        <tr>
            <th>
                No
            </th>
            <th>
                <input type="text" class="form-control mt-2" wire:model='searchname' wire:keydown='searchcategory' placeholder="Search Category">
            </th>
        </tr>
        @foreach($models as $model)
        @if ($editformCategory != $model->id)
            
        <tr>
            <th>{{$model->id}}</th>
            <th>
                <span class="{{$model->is_active ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                    {{$model->name}}
                </span>
            </th>
            </th>
            <th>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{$model->is_active ? 'checked' : ''}} wire:click='alter({{$model->id}})'>
                </div>
            </th>
            <th>
                <a wire:click='editform({{$model->id}})' class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                  </svg></a>
                  <a wire:click='deleteform({{$model->id}})' class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                  </svg></a>
            </th>
        </tr>
        @endif
        <tr>
            @if ($editformCategory == $model->id)
                
            <td>
                {{$model->id}}
            </td>
            <td>
                <input type="text" class="form-control" wire:model='editname' placeholder="edit Category">
            </td>
            <td>
                <input type="submit" class="btn btn-primary" wire:click='update'>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
    @endif

</div>