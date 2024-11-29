<x-layout>

    <form action="{{ route('search') }}" method="GET" class="flex items-center max-w-md mx-auto mb-5 mt-10">
        <input 
            type="text" 
            name="query" 
            placeholder="Cerca prodotti..." 
            class="flex-grow p-2 border rounded-l-md" 
            required>
        <button 
            type="submit" 
            class="px-4 py-2 bg-orange-500 text-white rounded-r-md hover:bg-orange-700 border-black border">
            Cerca
        </button>
    </form>

    <div class="max-w-7xl mx-auto mt-10 mb-44">
        <h1 class="text-2xl font-bold mb-6">Risultati per: "{{ $query }}"</h1>

        @if($products->isEmpty())
            <p class="text-gray-600">Nessun risultato trovato.</p>
        @else
            <h2 class="text-xl font-semibold mb-4">Prodotti</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach($products as $product)
                    <div class="border p-4 rounded-lg shadow">
                        <h3 class="font-bold text-lg">{{ $product->name }}</h3>
                        <p class="text-gray-600">{{ Str::limit($product->description, 100) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="text-orange-500 hover:underline">
                            Visualizza Prodotto
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
