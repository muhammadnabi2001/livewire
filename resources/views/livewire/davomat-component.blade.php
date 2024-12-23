<div>
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <input type="date" class="form-control" wire:change='day' wire:model="select">
            </div>
            <div class="row mt-4">
                <h1>{{$now}}</h1>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fio</th>
                                @foreach($days as $day)
                                <th scope="col">{{$day}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        @php
                            $int=1;
                        @endphp
                        <tbody>
                            @foreach($users as $user)

                            <tr>
                                <th scope="row">{{$int++}}</th>
                                <td>{{$user->name}}</td>

                                @foreach($days as $day)
                                
                                <td style="padding: 0;" wire:click='result({{$day}},{{$user->id}})'>
                                    @php
                                    $formattedDate = \Carbon\Carbon::parse($this->now)->format('Y-m') . '-' .
                                    str_pad($day, 2, '0', STR_PAD_LEFT);

                                    $davomat = $user->davomats->where('user_id', $user->id)->where('date',
                                    $formattedDate)->first();
                                    @endphp
                      
                                    @if($kun == $day && $user->id == $person)

                                    <input type="text"
                                        style="width: 38px; height: 60px; border: none; outline: none; text-align: center; font-size: 18px; box-sizing: border-box; padding: 0;"
                                        wire:change="store({{$day}},{{$user->id}}),$event.target.value" class="form-control"
                                        wire:model='status' autofocus value="{{$davomt->status ?? ''}}">

                                    @endif
                                    
                                     @if($davomat)
                                    {{$davomat->status}}
                                    @endif
                                </td>
                                @endforeach

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-5">
                        <input type="text" class="form-control">
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>