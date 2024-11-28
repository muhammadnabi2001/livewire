<div>
    <h1>Homa</h1>
    <button class="btn btn-primary" wire:click='add'>+</button>
    <h2>
        {{$a}}
    </h2>
    <button class="btn btn-outline-danger" wire:click='sub'>-</button>
    <br><br><br>

    <input type="text" wire:model="num1" class="form-control mt-2" placeholder="input num1">
    <select wire:model="perform" id="" class="form-controle mt-2">
        <option value="+" class="form-control mt-2">+</option>
        <option value="-">-</option>
        <option value=":">:</option>
        <option value="*">*</option>
    </select>
    <input type="text" wire:model="num2" class="form-control mt-2" placeholder="input num2">
    <input type="submit" class="btn btn-primary mt-2" wire:click='hisob'>
    <h2>{{$result}}</h2>
    
</div>