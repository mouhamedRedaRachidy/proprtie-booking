<div class="max-w-md mx-auto p-6 bg-white rounded shadow space-y-4">
    <h2 class="text-xl font-bold">{{ $property->name }}</h2>
    <p>{{ $property->description }}</p>
    <p>Prix par nuit : {{ $property->price_per_night }} €</p>

    
    @if(session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded">
            {{ session('message') }}
        </div>
    @endif


    <form wire:submit="book" class="space-y-4">
        <div>
            <input type="date" wire:model="start_date" class="border rounded p-2 w-full">
            @error('start_date')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="date" wire:model="end_date" class="border rounded p-2 w-full">
            @error('end_date')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Réserver
        </button>
    </form>
</div>
