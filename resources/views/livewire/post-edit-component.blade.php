<div>
    <h1>Post Edit Page</h1>

    <!-- Title input field -->
    <input type="text" wire:model="title" placeholder="Title" class="form-control mt-3" value="{{ $title }}">

    <!-- Description input field -->
    <input type="text" wire:model="description" placeholder="Description" class="form-control mt-3" value="{{ $description }}">

    <!-- Update button to save changes -->
    <input type="submit" wire:click="update" class="btn btn-primary mt-3" value="Update">
    
    <!-- Success message -->
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
