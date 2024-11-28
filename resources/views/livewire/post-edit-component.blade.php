<div>
    <h1>Post Edit Page</h1>

    <input type="text" wire:model="title" placeholder="Title" class="form-control mt-3" value="{{ $title }}">

    <input type="text" wire:model="description" placeholder="Description" class="form-control mt-3" value="{{ $description }}">

    <input type="submit" wire:click="update" class="btn btn-primary mt-3" value="Update">
    
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
