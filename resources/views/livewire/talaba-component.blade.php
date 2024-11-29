<div>
    <h1>Talaba Page</h1>
        
    <button class="btn btn-primary m-2" wire:click="{{$activeForm ? 'cancel' : 'create'}}"> {{$activeForm ? 'cancel' : 'create'}} </button>
    
    @if ($activeForm)

    <form wire:submit.preven="save">
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" wire:model='fio' placeholder="FIO">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" wire:model='manzil' placeholder="Manzil">
            </div>
            <div class="col-4">
                <input type="number" class="form-control" wire:model='yosh' placeholder="YOSH">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" wire:model='yunalish' placeholder="YUNALISH">
            </div>
            <div class="col-4">
                <input type="number" class="form-control" wire:model='kurs' placeholder="KURS">
            </div>
            <div class="col-4">
                <input type="submit" class="btn btn-primary m-2" value="save">
            </div>
        </div>
    </form>
    @endif
    
    @if (!$activeForm)
        
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>FIO</th>
            <th>MANZIL</th>
            <th>YOSH</th>
            <th>YUNALISH</th>
            <th>KURS</th>
            <th>Status</th>
        </tr>
        <tr>
                <th>
                    No
                </th>
                    <th>
                        <input type="text" class="form-control mt-2" wire:model='searchfio' wire:keydown='searchColumps'>
                    </th>
                    <th>
                        <input type="text" class="form-control mt-2" wire:model='searchmanzil' wire:keydown='searchColumps'>
                    </th>
                    <th>
                        <input type="text" class="form-control mt-2" wire:model='searchyosh' wire:keydown='searchColumps'>
                    </th>
                    <th>
                        <input type="text" class="form-control mt-2" wire:model='searchyunalish' wire:keydown='searchColumps'>
                    </th>
                    <th>
                        <input type="text" class="form-control mt-2" wire:model='searchkurs' wire:keydown='searchColumps'>

                    </th>
        
        </tr>
        @foreach($models as $model)
        <tr>
            <th>{{$model->id}}</th>
            <th>
                <span class="{{$model->is_active ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                    {{$model->fio}}
                </span>
            </th>
            <th>
                <span class="{{$model->is_active ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                    {{$model->manzil}}
                </span>
            </th>
            <th>
                <span class="{{$model->is_active ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                    {{$model->yosh}}
                </span>
            </th>
            <th>
                <span class="{{$model->is_active ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                    {{$model->yunalish}}
                </span>
            </th>
            <th>
                <span class="{{$model->is_active ? 'text-success' : 'text-danger text-decoration-line-through'}}">
                    {{$model->kurs}}
                </span>
            </th>
            <th><div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{$model->is_active ? 'checked' : ''}} wire:click='changeactive({{$model->id}})'>
              </div></th>
        </tr>
        @endforeach
    </table>
    @endif

</div>
