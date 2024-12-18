<div>
    {{-- Success is as dangerous as failure. --}}
    
    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent="store">
                <div>
                    @foreach ($masalliqs as $ingredient)
                        <div>
                            <input 
                                type="checkbox" 
                                wire:model.defer="masalliq_id" 
                                value="{{ $ingredient->id }}" 
                                id="ingredient-{{ $ingredient->id }}" 
                            />
                            <label for="ingredient-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit">Enter</button>
            </form>
        </div>
    </div>
    
    
    
</div>
